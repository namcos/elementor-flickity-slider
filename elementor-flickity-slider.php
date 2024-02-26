<?php
	/**
	* Flickity Slider for Elementor
	*
	* @package ElementorFlickitySlider
	* @author James Dunn
	*
	* @wordpress-plugin
	* Plugin Name: Flickity Slider for Elementor
	* Plugin URI: https://jamesdunnfreelance.co.uk/elementor-flickity-slider-widget/
	* Description: Slider widget for Elementor that uses Flickity.
	* Version: 1.2.1
	* Requires at least: 5.2
	* Requires PHP: 7.3.9
	* Author: James Dunn
	* Author URI: https://jamesdunnfreelance.co.uk
	* Licence: GPL v3
	* Licence URI: https://opensource.org/licenses/GPL-3.0
	* Text Domain: flickity-slider-elementor
	*/

	define('ELEMENTOR_FLICKITYSLIDER', __FILE__);

	/**
	* Include the Elementor class
	*/
	require plugin_dir_path(ELEMENTOR_FLICKITYSLIDER).'class-elementor-flickity-slider.php';
?>