<?php
	/**
	 * Elementor flickity Slider class
	 * 
	 * @category Class
	 * @package ElementorFlickitySlider
	 * @subpackage WordPress
	 * @author James Dunn
	 */

	if(!defined('ABSPATH'))
	{
		exit;
	}

	final class Elementor_FlickitySlider
	{
		const VERSION = '1.0.0';

		const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

		const MINIMUM_PHP_VERSION = '7.0';

		public function __construct()
		{
			add_action('init', array($this, 'i18n'));
			add_action('plugins_loaded', array($this, 'init'));
		}

		public function i18n()
		{
			load_plugin_textdomain('elementor-flickity-slider');
		}

		public function init()
		{
			if(!did_action('elementor/loaded'))
			{
				add_action('admin_notices', array($this, 'admin_notice_missing_main_plugin'));
				return;
			}

			if(!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>='))
			{
				add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
				return;
			}

			if(version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<'))
			{
				add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
				return;
			}

			require_once 'class-widgets.php';
		}

		public function admin_notice_missing_main_plugin()
		{
			deactivate_plugins(plugin_basename(ELEMENTOR_FLICKITYSLIDER));

			return sprintf(wp_kses('<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> to be installed and activated.</p></div>', array(
					'div' => array(
						'class' => array(),
						'p' => array(),
						'strong' => array(),
					),)), 'Elementor FlickitySlider', 'Elementor');
		}

		public function admin_notice_minimum_elementor_version()
		{
			deactivate_plugins(plugin_basename(ELEMENTOR_FLICKITYSLIDER));
			return sprintf(wp_kses('<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> to be installed and activated.</p></div>', array(
					'div' => array(
						'class' => array(),
						'p' => array(),
						'strong' => array(),
					),)), 'Elementor FlickitySlider', 'Elementor', self::MINIMUM_ELEMENTOR_VERSION);
		}

		public function admin_notice_minimum_php_version()
		{
			deactivate_plugins(plugin_basename(ELEMENTOR_FLICKITYSLIDER));
			return sprintf(wp_kses('<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> to be installed and activated.</p></div>', array(
					'div' => array(
						'class' => array(),
						'p' => array(),
						'strong' => array(),
					),)), 'Elementor FlickitySlider', 'Elementor', self::MINIMUM_ELEMENTOR_VERSION);
		}
	}

	new Elementor_FlickitySlider();
?>