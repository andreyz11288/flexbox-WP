<?php
/*
* SiteSEO
* https://siteseo.io/
* (c) SiteSEO Team <support@siteseo.io>
*/

/*
Copyright 2016 - 2024 - Benjamin Denis  (email : contact@seopress.org)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace SiteSEO\Actions\Api;

if (! defined('ABSPATH')) {
	exit;
}

use SiteSEO\Core\Hooks\ExecuteHooks;
use SiteSEO\ManualHooks\ApiHeader;

class ContentAnalysis implements ExecuteHooks
{
	public function hooks()
	{
		add_action('rest_api_init', [$this, 'register']);
	}

	/**
	 * @since 5.0.0
	 *
	 * @return void
	 */
	public function register()
	{
		register_rest_route('siteseo/v1', '/posts/(?P<id>\d+)/content-analysis', [
			'methods'			 => 'GET',
			'callback'			=> [$this, 'get'],
			'args'				=> [
				'id' => [
					'validate_callback' => function ($param, $request, $key) {
						return is_numeric($param);
					},
				],
			],
			'permission_callback' => '__return_true',
		]);

		register_rest_route('siteseo/v1', '/posts/(?P<id>\d+)/content-analysis', [
			'methods'			 => 'POST',
			'callback'			=> [$this, 'save'],
			'args'				=> [
				'id' => [
					'validate_callback' => function ($param, $request, $key) {
						return is_numeric($param);
					},
				],
			],
			'permission_callback' => function ($request) {
				$nonce = $request->get_header('x-wp-nonce');
				if ( ! wp_verify_nonce($nonce, 'wp_rest')) {
					return false;
				}

				if(!current_user_can('edit_posts')){
					return false;
				}

				return true;
			},
		]);
	}

	/**
	 * @since 5.0.0
	 */
	public function get(\WP_REST_Request $request)
	{
		$apiHeader = new ApiHeader();
		$apiHeader->hooks();

		$id   = (int) $request->get_param('id');

		$linkPreview   = siteseo_get_service('RequestPreview')->getLinkRequest($id);
		$str  = siteseo_get_service('RequestPreview')->getDomById($id);
		$data = siteseo_get_service('DomFilterContent')->getData($str, $id);
		$data = siteseo_get_service('DomAnalysis')->getDataAnalyze($data, [
			"id" => $id,
		]);

		$saveData = [
			'words_counter' => null,
			'score' => null,
		];

		if (isset($data['words_counter'])) {
			$saveData['words_counter'] = $data['words_counter'];
		}

		update_post_meta($id, '_siteseo_content_analysis_api', $saveData);
		$data['link_preview'] = $linkPreview;

		return new \WP_REST_Response($data);
	}



	/**
	 * @since 5.0.0
	 */
	public function save(\WP_REST_Request $request)
	{
		$id   = (int) $request->get_param('id');
		$score   =  $request->get_param('score');
		$wordsCounter   =  $request->get_param('words_counter');

		$data = [
			'words_counter' => $wordsCounter,
			'score' => $score
		];


		update_post_meta($id, '_siteseo_content_analysis_api', $data);

		return new \WP_REST_Response(["success" => true]);
	}
}
