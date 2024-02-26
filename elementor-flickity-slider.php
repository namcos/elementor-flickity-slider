<?php
	/**
	* Elementor Flickity Slider WordPress Plugin
	*
	* @package ElementorFlickitySlider
	*
	* Plugin Name: Flickity Slider for Elementor
	* Plugin URI: https://jamesdunnfreelance.co.uk/elementor-flickity-slider-widget/
	* Description: Slider widget for Elementor that uses Flickity
	* Version: 1.2.1
	* Author: James Dunn
	* Author URI: https://jamesdunnfreelance.co.uk
	* Text Domain: flickity-slider-elementor
	*/

	define('ELEMENTOR_FLICKITYSLIDER', __FILE__);

	/**
	* Include the Elementor class
	*/
	require plugin_dir_path(ELEMENTOR_FLICKITYSLIDER).'class-elementor-flickity-slider.php';
?>