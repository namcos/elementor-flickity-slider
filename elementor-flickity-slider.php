<?php
	/**
	* Elementor Flickity Slider WordPress Plugin
	*
	* @package ElementorFlickitySlider
	*
	* Plugin Name: Flickity Slider for Elementor
	* Description: 
	* Plugin URI:
	* Version: 1.0.0
	* Author: James Dunn
	* Text Domain: flickity-slider-elementor
	*/

	define('ELEMENTOR_FLICKITYSLIDER', __FILE__);

	/**
	* Include the Elementor class
	*/
	require plugin_dir_path(ELEMENTOR_FLICKITYSLIDER).'class-elementor-flickity-slider.php';
?>