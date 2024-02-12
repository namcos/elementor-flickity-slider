<?php

	/**
	 * Flickity Slider class
	 * 
	 * @category Class
	 * @package ElementorFlickitySlider
	 * @subpackage WordPress
	 * @author James Dunn
	 */

	namespace ElementorFlickitySlider\Widgets;
	use Elementor\Widget_Base;
	use Elementor\Controls_Manager;

	defined('ABSPATH') || die();

	class FlickitySlider extends Widget_Base
	{
		public function __construct($data = array(), $args = null)
		{
			parent::__construct($data, $args);
			wp_register_style('FlickitySliderStyle', plugins_url('/assets/css/flickitystyle.css', ELEMENTOR_FLICKITYSLIDER), array(), '1.0.0');
			//wp_register_script('FlickitySliderScript', plugins_url('assets/js/flickityscript.js', ELEMENTOR_FLICKITYSLIDER), array(), '1.0.0');
		}

		public function get_name()
		{
			return 'FlickitySlider';
		}

		public function get_title()
		{
			return __('Flickity Slider', 'elementor-flickity-slider');
		}

		public function get_icon()
		{
			return 'fa fa-pencil';
		}

		public function get_categories()
		{
			return array('general');
		}

		public function get_style_depends()
		{
			return array('FlickitySliderStyle');
		}

		public function get_script_depends()
		{
			return array('FlickitySliderScript');
		}

		protected function _register_controls()
		{
			$this->start_controls_section('section_slider_content',
				array(
					'label' => __('Cards', 'elementor-flickity-slider'),
				)
			);

			$this->add_control(
				'cards',
				[
					'label' => __('Cards', 'elementor-flickity-slider'),
					'type' => Controls_Manager::REPEATER,
					'fields' => 
					[
						[
							'name' => 'card_title',
							'label' => __('Title', 'elementor-flickity-slider'),
							'type' => Controls_Manager::TEXT,
							'label_block' => true,
						],
						[
							'name' => 'card_image',
							'label' => __('Image', 'elementor-flickity-slider'),
							'type' => Controls_Manager::MEDIA,
							'default' => [],
						],
						[
							'name' => 'card_text',
							'label' => __('Text', 'elementor-flickity-slider'),
							'type' => Controls_Manager::WYSIWYG,
						],
						[
							'name' => 'card_button_on',
							'label' => __('Buttons?', 'elementor-flickity-slider'),
							'type' => Controls_Manager::SWITCHER,
						],
						[
							'name' => 'card_button_1_text',
							'label' => __('Button 1 Text', 'elementor-flickity-slider'),
							'type' => Controls_Manager::TEXT,
							'condition' =>
							[
								'card_button_on' => 'yes',
							],
						],
						[
							'name' => 'card_button_1_url',
							'label' => __('Button 1 Link', 'elementor-flickity-slider'),
							'type' => Controls_Manager::URL,
							'condition' =>
							[
								'card_button_on' => 'yes',
							],
						],
					]
				]
			);
			
			$this->end_controls_section();

			$this->start_controls_section('section_slidersettings_content',
				array(
					'label' => __('Slider Settings', 'elementor-flickity-slider'),
				)
			);
			
			$this->add_control('slider_setting_draggable',
				array(
					'label' => __('Draggable?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_freescroll',
				array(
					'label' => __('Free Scroll?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_wraparound',
				array(
					'label' => __('Wrap Around?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_groupcells_on',
				array(
					'label' => __('Group Cells', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_groupcells',
				[
					'label' => __('Group Cells (Number)', 'elementor-flickity-slider'),
					'type' => Controls_Manager::NUMBER,
					'condition' =>
					[
						'slider_setting_groupcells_on' => 'true',
					],
				]
			);
			
			$this->add_control('slider_setting_autoplay_on',
				array(
					'label' => __('Auto Play?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_autoplay',
				[
					'label' => __('Auto Play (milliseconds)', 'elementor-flickity-slider'),
					'type' => Controls_Manager::NUMBER,
					'condition' =>
					[
						'slider_setting_autoplay_on' => 'true',
					],
				]
			);
			
			$this->add_control('slider_setting_pauseautoplay',
				[
					'label' => __('Pause Auto Play On Hover', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_fullscreen',
				array(
					'label' => __('Full Screen?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_fade',
				array(
					'label' => __('Fade?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_adaptiveheight',
				array(
					'label' => __('Adaptive Height?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_watchcss',
				array(
					'label' => __('Watch CSS?', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				)
			);
			
			$this->add_control('slider_setting_dragthreshold',
				array(
					'label' => __('Drag Threshold', 'elementor-flickity-slider'),
					'type' => Controls_Manager::NUMBER,
				)
			);
			
			$this->add_control('slider_setting_selectedattraction',
				array(
					'label' => __('Selected Attraction', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				)
			);
			
			$this->add_control('slider_setting_friction',
				array(
					'label' => __('Friction', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				)
			);

			$this->add_control('slider_setting_cellalign',
				array(
					'label' => __('Cell Align', 'elementor-flickity-slider'),
					'type' => Controls_Manager::CHOOSE,
					'options' =>
					[
						'left' =>
						[
							'title' => __('Left', 'elementor-flickity-slider'),
							'icon' => 'eicon-text-align-left',
						],
						'center' =>
						[
							'title' => __('Center', 'elementor-flickity-slider'),
							'icon' => 'eicon-text-align-center',
						],
						'right' =>
						[
							'title' => __('Right', 'elementor-flickity-slider'),
							'icon' => 'eicon-text-align-right',
						],
					],
					'default' => 'left',
					'toggle' => true,
				)
			);

			$this->end_controls_section();
		}

		protected function render()
		{
			$settings = $this->get_settings();
?>
			<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
			<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
			<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<?php	
			echo "<div class='carousel'>";
			foreach($settings['cards'] as $card)
			{
?>
				<div class="carousel-card">
					<div class="card-image-wrapper">
						<div class="card-image" style="background: url(<?php echo wp_kses($card['card_image']['url'], array()); ?>) no-repeat; width: 700px; height: 576px;">
							<p><?php echo wp_kses($card['card_title'], array()); ?></p>
							<p><?php echo wp_kses($card['card_text'], array()); ?></p>
	<?php
							if($card['card_button_on'] === 'yes')
							{
	?>
								<a href="<?php echo wp_kses($card['card_button_1_url']['url'], array()); ?>"><?php echo wp_kses($card['card_button_1_text'], array()); ?></a>
	<?php
							}
	?>
						</div>
					</div>
				</div>
<?php
			}
			echo "</div>";
?>
			<script type="text/javascript">
				$('.carousel').flickity({
					cellAlign: '<?php echo wp_kses($settings['slider_setting_cellalign'], array()); ?>',
					draggable: <?php echo (wp_kses($settings['slider_setting_draggable'], array()) === 'true') ? 'true' : 'false'; ?>,
					freeScroll: <?php echo (wp_kses($settings['slider_setting_freescroll'], array()) === 'true') ? 'true' : 'false'; ?>,
					wrapAround: <?php echo (wp_kses($settings['slider_setting_wraparound'], array()) === 'true') ? 'true' : 'false'; ?>,
					<?php
						if((wp_kses($settings['slider_setting_groupcells_on'], array()) === 'true') && !empty($settings['slider_setting_groupcells']))
						{
							echo "groupCells: ".wp_kses($settings['slider_setting_groupcells'], array()).",";
						}
						elseif((wp_kses($settings['slider_setting_groupcells_on'], array()) === 'true') && empty($settings['slider_setting_groupcells']))
						{
							echo "groupCells: true,";
						}
						else
						{
							echo "groupCells: false,";
						}
					?>
					<?php
						if((wp_kses($settings['slider_setting_autoplay_on'], array()) === 'true') && !empty($settings['slider_setting_autoplay']))
						{
							echo "autoPlay: ".wp_kses($settings['slider_setting_autoplay'], array()).",";
						}
						elseif((wp_kses($settings['slider_setting_autoplay_on'], array()) === 'true') && empty($settings['slider_setting_autoplay']))
						{
							echo "autoPlay: true,";
						}
						else
						{
							echo "autoPlay: false,";
						}
					?>
					pauseAutoPlayOnHover: <?php echo (wp_kses($settings['slider_setting_pauseautoplay'], array()) === 'true') ? 'true' : 'false'; ?>,
					fullScreen: <?php echo (wp_kses($settings['slider_setting_fullscreen'], array()) === 'true') ? 'true' : 'false'; ?>,
					fade: <?php echo (wp_kses($settings['slider_setting_fade'], array()) === 'true') ? 'true' : 'false'; ?>,
					adaptiveHeight: <?php echo (wp_kses($settings['slider_setting_adaptiveheight'], array()) === 'true') ? 'true' : 'false'; ?>,
					watchCSS: <?php echo (wp_kses($settings['slider_setting_watchcss'], array()) === 'true') ? 'true' : 'false'; ?>,
					dragThreshold: <?php echo (!empty(wp_kses($settings['slider_setting_dragthreshold'], array()))) ? wp_kses($settings['slider_setting_dragthreshold'], array()) : '3'; ?>,
					selectedAttraction: <?php echo (!empty(wp_kses($settings['slider_setting_selectedattraction'], array()))) ? wp_kses($settings['slider_setting_selectedattraction'], array()) : '0.025'; ?>,
					friction: <?php echo (!empty(wp_kses($settings['slider_setting_friction'], array()))) ? wp_kses($settings['slider_setting_friction'], array()) : '0.28'; ?>,
					imagesLoaded: true,
				});
			</script>

			
		</div>
<?php
		}

		protected function content_template()
		{
?>
			<div class="carousel">
			<# if(settings.cards.length) { #>
				<# _.each(settings.cards, function(card) { #>
					<div class="carousel-card">
						<div class="card-image-wrapper">
							<div class="card-image" style="background: url({{{ card.card_image.url }}}) no-repeat; width: 700px; height: 576px;">
								<p>{{{ card.card_title }}}</p>
								<p>{{{ card.card_text }}}</p>
								
								<# if(card.card_button_on) { #>
								<a href="{{{ card.card_button_1_url }}}">{{{ card.card_button_1_text }}}</a>
								<# } #>
							</div>
						</div>
					</div>
				<# }); #>
			<# } #>
			</div>
<?php
		}
	}

?>