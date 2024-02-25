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
			return 'eicon-slider-push';
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
				[
					'label' => __('Cards', 'elementor-flickity-slider'),
				]
			);
			
			$this->add_control(
				'carousel_id',
				[
					'label' => __('Carousel Id', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			
			$this->add_control(
				'carousel_css',
				[
					'label' => __('Carousel CSS', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
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

			$this->start_controls_section('section_slidersettings_behavior',
				[
					'label' => __('Slider Settings: Behavior', 'elementor-flickity-slider'),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			$this->add_control('slider_setting_draggable',
				[
					'label' => __('Draggable', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_freescroll',
				[
					'label' => __('Free Scroll', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_wraparound',
				[
					'label' => __('Wrap Around', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_groupcells_on',
				[
					'label' => __('Group Cells...', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
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
				[
					'label' => __('Auto Play...', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
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
			
			$this->add_control('slider_setting_adaptiveheight',
				[
					'label' => __('Adaptive Height', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_watchcss',
				[
					'label' => __('Watch CSS', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_dragthreshold',
				[
					'label' => __('Drag Threshold', 'elementor-flickity-slider'),
					'type' => Controls_Manager::NUMBER,
				]
			);
			
			$this->add_control('slider_setting_selectedattraction',
				[
					'label' => __('Selected Attraction', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				]
			);
			
			$this->add_control('slider_setting_friction',
				[
					'label' => __('Friction', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				]
			);
			
			$this->end_controls_section();
			
			
			$this->start_controls_section('section_slidersettings_setup',
				[
					'label' => __('Slider Settings: Setup', 'elementor-flickity-slider'),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);

			
			$this->add_control('slider_setting_cellselector',
				[
					'label' => __('Cell Selector', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				]
			);
			
			$this->add_control('slider_setting_initialindex',
				[
					'label' => __('Initial Index', 'elementor-flickity-slider'),
					'type' => Controls_Manager::NUMBER,
				]
			);
			
			$this->add_control('slider_setting_accessibility',
				[
					'label' => __('Accessibility', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_setgallerysize',
				[
					'label' => __('Set Gallery Size', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'true',
				]
			);
			
			$this->add_control('slider_setting_resize',
				[
					'label' => __('Resize', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'true',
				]
			);
			
			$this->end_controls_section();
			
			
			$this->start_controls_section('section_slidersettings_cellposition',
				[
					'label' => __('Slider Settings: Cell Position', 'elementor-flickity-slider'),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control('slider_setting_cellalign',
				[
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
				]
			);
			
			$this->add_control('slider_setting_contain',
				[
					'label' => __('Contain', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->add_control('slider_setting_percentposition',
				[
					'label' => __('Percent Position', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'true',
				]
			);
			
			$this->add_control('slider_setting_righttoleft',
				[
					'label' => __('Right To Left', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'false',
				]
			);
			
			$this->end_controls_section();
			
			
			$this->start_controls_section('section_slidersettings_ui',
				[
					'label' => __('Slider Settings: UI', 'elementor-flickity-slider'),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			$this->add_control('slider_setting_prevnextbuttons',
				[
					'label' => __('Prev Next Buttons', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'true',
				]
			);
			
			$this->add_control('slider_setting_pagedots',
				[
					'label' => __('Page Dots', 'elementor-flickity-slider'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __('True', 'elementor-flickity-slider'),
					'label_off' => __('False', 'elementor-flickity-slider'),
					'return_value' => 'true',
					'default' => 'true',
				]
			);
			
			$this->add_control('slider_setting_arrowshape',
				[
					'label' => __('Arrow Shape', 'elementor-flickity-slider'),
					'type' => Controls_Manager::TEXT,
				]
			);

			$this->end_controls_section();
			
			$this->start_controls_section(
				'style_section',
				[
					'label' => __('Style', 'elementor-flickity-slider'),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typeography',
					'label' => __('Heading - Typography', 'elementor-flickity-slider'),
					'selector' => '{{WRAPPER}} .heading',
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typeography',
					'label' => __('Text - Typography', 'elementor-flickity-slider'),
					'selector' => '{{WRAPPER}} .text',
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typeography',
					'label' => __('Button - Typography', 'elementor-flickity-slider'),
					'selector' => '{{WRAPPER}} .button',
				]
			);
			
			$this->add_control('text-wrapper-background-color',
				[
					'name' => 'background_text_wrapper',
					'label' => __('Color', 'elementor-flickity-slider'),
					'type' => Controls_Manager::COLOR,
					'default' => 'rgba(55,55,55,0.5)',
					'selectors' => ['{{WRAPPER}} .text-wrapper' => 'background-color: {{VALUE}}'],
				]
			);
			
			$this->end_controls_section();
		}

		protected function render()
		{
			$settings = $this->get_settings();
			
			// generate a unique id for this block
			$blockID = uniqid();
?>
			<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
			<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
			<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<?php	
			echo "<div class='carousel-".$blockID." ".$settings['carousel_css']."' id='".$settings['carousel_id']."'>";
			foreach($settings['cards'] as $card)
			{
				$imageSize = wp_getimagesize($card['card_image']['url']);
				
?>
				<div class="carousel-card">
					<div class="card-image-wrapper">
						<div class="card-image" style="background: url(<?php echo wp_kses($card['card_image']['url'], array()); ?>) no-repeat; background-size: contain; background-position: center; width: 100%; height: 0; padding-top: calc(<?php echo $imageSize[1]; ?> / <?php echo $imageSize[0]; ?> * 100%);">
							<div class="text-wrapper">
								<p class="heading"><?php echo wp_kses($card['card_title'], array()); ?></p>
								<p class="text"><?php echo wp_kses($card['card_text'], array()); ?></p>
		<?php
								if($card['card_button_on'] === 'yes')
								{
		?>
									<a class="button-1 button-1-border" href="<?php echo wp_kses($card['card_button_1_url']['url'], array()); ?>"><?php echo wp_kses($card['card_button_1_text'], array()); ?></a>
		<?php
								}
	?>
							</div>
						</div>
					</div>
				</div>
<?php
			}
			echo "</div>";
?>
			<script type="text/javascript">
				$(document).ready(function()
				{
					$('.carousel-<?php echo $blockID; ?>').flickity({
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
						adaptiveHeight: <?php echo (wp_kses($settings['slider_setting_adaptiveheight'], array()) === 'true') ? 'true' : 'false'; ?>,
						watchCSS: <?php echo (wp_kses($settings['slider_setting_watchcss'], array()) === 'true') ? 'true' : 'false'; ?>,
						dragThreshold: <?php echo (!empty(wp_kses($settings['slider_setting_dragthreshold'], array()))) ? wp_kses($settings['slider_setting_dragthreshold'], array()) : '3'; ?>,
						selectedAttraction: <?php echo (!empty(wp_kses($settings['slider_setting_selectedattraction'], array()))) ? wp_kses($settings['slider_setting_selectedattraction'], array()) : '0.025'; ?>,
						friction: <?php echo (!empty(wp_kses($settings['slider_setting_friction'], array()))) ? wp_kses($settings['slider_setting_friction'], array()) : '0.28'; ?>,
						cellSelector: <?php echo (!empty(wp_kses($settings['slider_setting_cellselector'], array()))) ? "'".wp_kses($settings['slider_setting_cellselector'], array())."'" : "''"; ?>,
						initialIndex: <?php echo (!empty(wp_kses($settings['slider_setting_initialindex'], array()))) ? wp_kses($settings['slider_setting_initialindex'], array()) : 0; ?>,
						accessibilty: <?php echo (wp_kses($settings['slider_setting_accessibility'], array()) === 'true') ? 'true' : 'false'; ?>,
						setGallerySize: <?php echo (wp_kses($settings['slider_setting_setgallerysize'], array()) === 'true') ? 'true' : 'false'; ?>,
						resize: <?php echo (wp_kses($settings['slider_setting_resize'], array()) === 'true') ? 'true' : 'false'; ?>,
						contain: <?php echo (wp_kses($settings['slider_setting_contain'], array()) === 'true') ? 'true' : 'false'; ?>,
						percentPosition: <?php echo (wp_kses($settings['slider_setting_percentposition'], array()) === 'true') ? 'true' : 'false'; ?>,
						rightToLeft: <?php echo (wp_kses($settings['slider_setting_righttoleft'], array()) === 'true') ? 'true' : 'false'; ?>,
						prevNextButtons: <?php echo (wp_kses($settings['slider_setting_prevnextbuttons'], array()) === 'true') ? 'true' : 'false'; ?>,
						pageDots: <?php echo (wp_kses($settings['slider_setting_pagedots'], array()) === 'true') ? 'true' : 'false'; ?>,
						<?php
							if(!empty(wp_kses($settings['slider_setting_arrowshape'], array())))
							{
								echo "arrowShape: '".wp_kses($settings['slider_setting_arrowshape'], array())."' ,";
							}
						?>
					});
				});
			</script>
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
								<p class="heading">{{{ card.card_title }}}</p>
								<p class="text">{{{ card.card_text }}}</p>
								
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