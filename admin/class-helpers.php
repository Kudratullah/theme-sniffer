<?php
/**
 * File that holds helper class with static helper methods
 *
 * @since 0.2.0
 *
 * @package Theme_Sniffer\Admin
 */

namespace Theme_Sniffer\Admin;

/**
 * Class that holds the helper methods.
 *
 * @package Theme_Sniffer\Admin
 */
class Helpers {

	/**
	 * Returns standards
	 *
	 * Includes a 'theme_sniffer_add_standards' filter, so that user can add their own standard. The standard has to be added
	 * in the composer before bundling the plugin.
	 *
	 * @since 0.2.0 Added filter so that user can add their own standards.
	 * @since 0.1.3
	 *
	 * @return array Standards details.
	 */
	public static function get_wpcs_standards() {
		$standards = array(
			'wordpress-theme' => array(
				'label'       => 'WPThemeReview',
				'description' => esc_html__( 'Ruleset for WordPress theme review requirements (Required)', 'theme-sniffer' ),
				'default'     => 1,
			),
			'wordpress-core'  => array(
				'label'       => 'WordPress-Core',
				'description' => esc_html__( 'Main ruleset for WordPress core coding standards (Optional)', 'theme-sniffer' ),
				'default'     => 0,
			),
			'wordpress-extra' => array(
				'label'       => 'WordPress-Extra',
				'description' => esc_html__( 'Extended ruleset for recommended best practices (Optional)', 'theme-sniffer' ),
				'default'     => 0,
			),
			'wordpress-docs'  => array(
				'label'       => 'WordPress-Docs',
				'description' => esc_html__( 'Additional ruleset for WordPress inline documentation standards (Optional)', 'theme-sniffer' ),
				'default'     => 0,
			),
			'wordpress-vip'   => array(
				'label'       => 'WordPress-VIP',
				'description' => esc_html__( 'Extended ruleset for WordPress VIP coding requirements (Optional)', 'theme-sniffer' ),
				'default'     => 0,
			),
		);

		if ( has_filter( 'theme_sniffer_add_standards' ) ) {
			$standards = apply_filters( 'theme_sniffer_add_standards', $standards );
		}

		return $standards;
	}

	/**
	 * Return all the active themes
	 *
	 * @since  0.2.0
	 * @return array Array of active themes.
	 */
	public static function get_active_themes() {
		$all_themes = wp_get_themes();
		$themes     = array();

		if ( ! empty( $all_themes ) ) {
			foreach ( $all_themes as $key => $theme ) {
				$themes[ $key ] = $theme->get( 'Name' );
			}
		}

		return $themes;
	}

	/**
	 * Returns PHP versions.
	 *
	 * @since 0.2.0 Added PHP 7.x versions
	 * @since 0.1.3
	 *
	 * @return array PHP versions.
	 */
	public static function get_php_versions() {

		$output = array(
			'5.2',
			'5.3',
			'5.4',
			'5.5',
			'5.6',
			'7.0',
			'7.1',
			'7.2',
			'7.3',
		);

		return $output;
	}

	/**
	 * Returns theme tags.
	 *
	 * @since 0.1.3
	 *
	 * @return array PHP versions.
	 */
	public static function get_theme_tags() {

		$tags['allowed_tags'] = array(
			'two-columns',
			'three-columns',
			'four-columns',
			'left-sidebar',
			'right-sidebar',
			'grid-layout',
			'flexible-header',
			'accessibility-ready',
			'buddypress',
			'custom-background',
			'custom-colors',
			'custom-header',
			'custom-menu',
			'custom-logo',
			'editor-style',
			'featured-image-header',
			'featured-images',
			'footer-widgets',
			'front-page-post-form',
			'full-width-template',
			'microformats',
			'post-formats',
			'rtl-language-support',
			'sticky-post',
			'theme-options',
			'threaded-comments',
			'translation-ready',
		);

		$tags['subject_tags'] = array(
			'blog',
			'e-commerce',
			'education',
			'entertainment',
			'food-and-drink',
			'holiday',
			'news',
			'photography',
			'portfolio',
		);

		return $tags;
	}
}
