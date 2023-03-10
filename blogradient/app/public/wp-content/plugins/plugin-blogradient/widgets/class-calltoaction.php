<?php
/**
 * 
 * Blogradient Custom Call to Action Widget
 * 
 */

 if(!defined('ABSPATH')){
    exit; //exit if accessed directly for security
}

class Blogradient_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_cta';
    }

	public function get_title() {
        return __('Call to Action', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-call-to-action';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'card', 'call to action', 'cta', 'action'];
    }

	protected function _register_controls() {
        global $plugin_images;

        $this->start_controls_section(
			'blogradient_cta',
			[
				'label' => esc_html__( 'Call to Action', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle_text',
			[
				'label'         => esc_html__( 'Subtitle Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => __('Type your subtitle here', 'plugin-blogradient'),
                'default'       => __('Attention Grabbing Subtitle', 'plugin-blogradient'),
			]
		);
        
        $this->add_control(
			'subtitle_color',
			[
				'label'         => esc_html__( 'Subtitle Color', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
                ],
			]
		);

		$this->add_control(
			'title_text',
			[
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label'         => esc_html__( 'Title Text', 'plugin-blogradient' ),
				'default'       => __('Your Exciting Call to Action Title'),
                'placeholder'   => __('CTA Title', 'plugin-blogradient'),
			]
		);

		$this->add_control(
			'title_color',
            [
                'type'          => \Elementor\Controls_Manager::COLOR,
                'label'     => __('Title Color', 'plugin-blogradient'),
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h2'    => 'color: {{VALUE}}',
                ],
            ]
		);

        $this->add_control(
			'cta_description',
			[
				'type'          => \Elementor\Controls_Manager::TEXTAREA,
				'label'         => esc_html__( 'Description', 'plugin-blogradient' ),
                'label-block'   => true,
				'default'       => __('Super exciting explanation of what you have to offer'),
                'placeholder'   => __('Your call to action description is here, make it juicy!', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'description_color',
            [
                'type'          => \Elementor\Controls_Manager::COLOR,
                'label'     => __('Description Color', 'plugin-blogradient'),
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cta-description'    => 'color: {{VALUE}}',
                ],
            ]
		);

        $this->add_control(
			'overlay_image',
            [
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'label'     => __('Call to Action Image', 'plugin-blogradient'),
                'default'   => [
                    'url'   => $plugin_images . '/card-date.png',
                ],
            ]
		);

        $this->add_control(
			'button_text',
			[
				'label'         => esc_html__( 'Button Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => __('Type your clickbait here', 'plugin-blogradient'),
                'default'       => __('Clickbait ->', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'button_link',
			[
				'label'         => esc_html__( 'Button Link', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true, 
                'default'       => [
                    'url'           => '#', 
                    'is_external'   => true,
                    'nofollow'      => false,
                ],
			]
		);

        $this->add_control(
			'button_style',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => esc_html__( 'Button Style', 'plugin-blogradient' ),
                'default'   => 'btn-primary',
				'options'   => [
					'btn-primary'   => esc_html__( 'Primary', 'plugin-blogradient' ),
					'btn-secondary' => esc_html__( 'Secondary', 'plugin-blogradient' ),
					'btn-invert'    => esc_html__( 'Invert', 'plugin-blogradient' ),
				],
			]
		);

        $this->add_control(
			'button_alignment',
			[
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'label'     => esc_html__( 'Alignment', 'plugin-blogradient' ),
                'default'   => 'text-center',
                'toggle'    => true,
				'options'   => [
					'text-start'    => [
						'title'     => esc_html__( 'Left', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-left',
					],
					'text-center'   => [
						'title'     => esc_html__( 'Center', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-center',
					],
					'text-end'      => [
						'title'     => esc_html__( 'Right', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-right',
					],
				],
			],
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
                'name'      => 'background',
				'types'     => ['classic', 'gradient'],
				'label'     => __( 'Background', 'plugin-blogradient' ),
                'selector'  => '{{WRAPPER}} .overlay',
			]
		);

		$this->end_controls_section();

    }

	protected function render() {

        global $plugin_images;
        $settings = $this->get_settings_for_display();
        $target = $settings['button_link']['is_external'] ? ' target= "_blank" ' : '';
        $nofollow = $settings['button_link']['nofollow'] ? ' rel= "nofollow" ' : '';

        echo '<div class="section-call-to-action">';
        
            echo '<div class="overlay">';
                echo '<div class="overlay-image">';
                    echo '<img src="' . esc_url($settings['overlay_image']['url']) . '" />';
                echo '</div>';
            echo '</div>';

            echo '<div class="underlay-bg"></div>';

            echo '<p class="sub-title">' . $settings['subtitle_text'] . '</p>';
            echo '<h2>' . $settings['title_text'] . '</h2>';
            echo '<p class="cta-description">' . $settings['cta_description'] . '</p>';

            echo '<div class="link-box ' . $settings['button_alignment'] . '">';
                echo '<a href="' . $settings['button_link']['url'] . '" ' . $target . $nofollow . ' class="btn ' . $settings['button_style'] . '">' . $settings['button_text'] . '</a>';
            echo '</div>';
        echo '</div>';

    }

}

