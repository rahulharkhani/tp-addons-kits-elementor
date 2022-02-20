<?php

namespace Elementor;

if (!defined('ABSPATH'))
	exit;      // Exit if accessed directly

class Profile_Card_Elementor_Widget extends Widget_Base {

	//Function for get the slug of the element name.
	public function get_name() {
		return 'profile-card-widget';
	}

	//Function for get the name of the element.
	public function get_title() {
		return __('Profile Card', ELEMENTOR_ADDONS_KITS_DOMAIN);
	}

	//Function for get the icon of the element.
	public function get_icon() {
		return 'eicon-icon-box';
	}

	//Function for include element into the category.
	public function get_categories() {
		return ['tp-tp-elementor-addons-kits'];
	}

	/*
	 * Adding the controls fields for the Card Elements
	 */

	protected function _register_controls() {

		/*
		 * Start profile card controls fields
		 */
		$this->start_controls_section(
			'section_items_data', array(
				'label' => esc_html__('Profile Card Items', ELEMENTOR_ADDONS_KITS_DOMAIN),
			)
		);

		$this->add_control(
			'profile_design_style', [
				'label' => __('Profile Design Style', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'card-design-style-1' => esc_html__('Design Style 1', ELEMENTOR_ADDONS_KITS_DOMAIN),
					'card-design-style-2' => esc_html__('Design Style 2', ELEMENTOR_ADDONS_KITS_DOMAIN),
					'card-design-style-3' => esc_html__('Design Style 3', ELEMENTOR_ADDONS_KITS_DOMAIN),
					'card-design-style-4' => esc_html__('Design Style 4', ELEMENTOR_ADDONS_KITS_DOMAIN),
				],
				'default' => 'card-design-style-1',
			]
		);

		$this->add_control(
			'user_image', [
				'label' => __('Profile Image', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'name', [
				'label' => __('Name', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('John Doe', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'placeholder' => __('Enter Name', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'position', [
				'label' => __('Position', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('Developer', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'placeholder' => __('Developer', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'email', [
				'label' => __('Email', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('johndoe@example.com', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'placeholder' => __('johndoe@example.com', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'phone', [
				'label' => __('Phone', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('+91 9876543210', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'placeholder' => __('Phone', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'location', [
				'label' => __('Location', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('709 West St. Texarkana, TX USA', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'placeholder' => __('Location', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'description', array(
				'label' => esc_html__('Description', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', ELEMENTOR_ADDONS_KITS_DOMAIN),
			)
		);

		$this->end_controls_section();
		/*
		 * End User card controls fields
		*/


		/*
		 * Start Social Media control for profile card
		*/
		$this->start_controls_section(
			'section_social_media', array(
				'label' => esc_html__('Social Media', ELEMENTOR_ADDONS_KITS_DOMAIN),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social', [
				'label' => __('Icons', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-gitlab',
				'include' => [
					'fa fa-android',
					'fa fa-apple',
					'fa fa-behance',
					'fa fa-bitbucket',
					'fa fa-codepen',
					'fa fa-delicious',
					'fa fa-deviantart',
					'fa fa-digg',
					'fa fa-dribbble',
					'fa fa-envelope',
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-foursquare',
					'fa fa-free-code-camp',
					'fa fa-github',
					'fa fa-gitlab',
					'fa fa-globe',
					'fa fa-google-plus',
					'fa fa-houzz',
					'fa fa-instagram',
					'fa fa-jsfiddle',
					'fa fa-link',
					'fa fa-linkedin',
					'fa fa-medium',
					'fa fa-meetup',
					'fa fa-mixcloud',
					'fa fa-odnoklassniki',
					'fa fa-pinterest',
					'fa fa-product-hunt',
					'fa fa-reddit',
					'fa fa-rss',
					'fa fa-shopping-cart',
					'fa fa-skype',
					'fa fa-slideshare',
					'fa fa-snapchat',
					'fa fa-soundcloud',
					'fa fa-spotify',
					'fa fa-stack-overflow',
					'fa fa-steam',
					'fa fa-stumbleupon',
					'fa fa-telegram',
					'fa fa-thumb-tack',
					'fa fa-tripadvisor',
					'fa fa-tumblr',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-vk',
					'fa fa-weibo',
					'fa fa-weixin',
					'fa fa-whatsapp',
					'fa fa-wordpress',
					'fa fa-xing',
					'fa fa-yelp',
					'fa fa-youtube',
					'fa fa-500px',
				],
			]
		);

		$repeater->add_control(
			'link', [
				'label' => __('Link', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
					'is_external' => 'true',
				],
				'placeholder' => __('https://your-link.com', ELEMENTOR_ADDONS_KITS_DOMAIN),
			]
		);

		$this->add_control(
			'social_icons', [
				'label' => __('Social Icons', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'social' => 'fa fa-facebook' ],
					[ 'social' => 'fa fa-twitter' ],
					[ 'social' => 'fa fa-google-plus' ],
					[ 'social' => 'fa fa-wordpress' ],
				],
				'title_field' => '<i class="{{ social }}"></i> {{{ social.replace( \'fa fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);

		$this->end_controls_section();
		/*
		 * End Social Media control for profile card
		 */

		/*
		 * Start sub title control style
		 */
		$this->start_controls_section(
			'section_profile_subtitle', [
				'label' => __('Sub Title Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label' => __('Text Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .sub-title-show' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		/*
		 * End sub title control style
		 */

		/*
		 * Start content background control style
		 */
		$this->start_controls_section(
			'section_content_background_style', [
				'label' => __('Content Box Style', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'profile_design_style' => [
						'card-design-style-1',
						'card-design-style-2',
						'card-design-style-3'
					]
				]
			]
		);

		$this->add_control(
			'content_background_color', [
				'label' => __('Background Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .card-style-1 .profile-bg,
					{{WRAPPER}} .card-style-2 .profile-bg,
					{{WRAPPER}} .card-style-3 .front-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_icon_color', [
				'label' => __('Content Icon Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .card-style-1 .front__text-para i,
					{{WRAPPER}} .card-style-2 .front__text-para i' => 'background: {{VALUE}};',
					'{{WRAPPER}} .card-style-3 .front__text-para i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		/*
		 * End content background control style
		 */

		/*
		 * Start social media control style
		 */
		$this->start_controls_section(
			'section_social_style', [
				'label' => __('Social Icon', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'profile_design_style' => ['card-design-style-1', 'card-design-style-2'],
				],
			]
		);

		$this->add_control(
			'content_social_background_color', [
			'label' => __('Social Area Background Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'condition' => [
				'profile_design_style' => ['card-design-style-1', 'card-design-style-2'],
			],
			'selectors' => [
				'{{WRAPPER}} .team-member__socialmedia' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
			'icon_color', [
				'label' => __('Social Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __('Official Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
					'custom' => __('Custom', ELEMENTOR_ADDONS_KITS_DOMAIN),
				],
			]
		);

		$this->add_control(
			'icon_primary_color', [
				'label' => __('Primary Icon Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .card-style-1 .elementor-icon.elementor-social-icon,
					{{WRAPPER}} .card-style-2 .elementor-icon.elementor-social-icon' => 'background: {{VALUE}}; border: 2px solid {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_secondary_color', [
				'label' => __('Icon Hover Color', ELEMENTOR_ADDONS_KITS_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .card-style-1 .elementor-icon.elementor-social-icon:hover:before,
					{{WRAPPER}} .card-style-2 .elementor-icon.elementor-social-icon:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .card-style-1 .elementor-icon.elementor-social-icon:hover,
					{{WRAPPER}} .card-style-2 .elementor-icon.elementor-social-icon:hover' => 'color: {{VALUE}}; border: 2px solid {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		/*
		 * End social media control style
		 */
	}

	/**
	 * Render Card Elements widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$class_animation = '';

		if (!empty($settings['hover_animation'])) {
			$class_animation = ' elementor-animation-' . $settings['hover_animation'];
		}

		switch ($settings['profile_design_style']) {
			case 'card-design-style-1':
				include ELEMENTOR_ADDONS_KITS_PATH . 'includes/profile-card/elementor-profile-card-1.php';  // Card Style 1
				break;
			case 'card-design-style-2':
				include ELEMENTOR_ADDONS_KITS_PATH . 'includes/profile-card/elementor-profile-card-2.php';  // Card Style 2
				break;
			case 'card-design-style-3':
				include ELEMENTOR_ADDONS_KITS_PATH . 'includes/profile-card/elementor-profile-card-3.php';  // Card Style 3
				break;
			case 'card-design-style-4':
				include ELEMENTOR_ADDONS_KITS_PATH . 'includes/profile-card/elementor-profile-card-4.php';  // Card Style 4
				break;		
			default:
				include ELEMENTOR_ADDONS_KITS_PATH . 'includes/profile-card/elementor-profile-card-1.php';  // Default Card Style 1
				break;
		}
	}

}

Plugin::instance()->widgets_manager->register_widget_type(new Profile_Card_Elementor_Widget());
