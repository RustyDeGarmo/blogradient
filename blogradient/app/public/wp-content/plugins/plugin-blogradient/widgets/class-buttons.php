<?php
/**
 * 
 * Blogradient Button Widget
 * 
 */

if(!defined('ABSPATH')){
    exit; //exit if accessed directly for security
}

class Blogradient_Buttons_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_buttons';
    }

	public function get_title() {
        return esc_html__('Blogradient Button', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-button';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'button', 'link', 'cta'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'blogradient_buttons',
			[
				'label' => esc_html__( 'Button', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label'         => esc_html__( 'Button Text', 'plugin-blogradient' ),
                'label_block'   => true,
				'placeholder'   => esc_html__( 'Enter your title', 'plugin-blogradient' ),
                'default'       => __('Click Here', 'plugin-blogradient'),
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

		$this->add_responsive_control(
			'button_alignment',
			[
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'label'     => esc_html__( 'Alignment', 'plugin-blogradient' ),
                'default'   => 'left',
                'toggle'    => true,
                'devices'   => ['desktop', 'tablet', 'mobile'],
				'options'   => [
					'left'    => [
						'title'     => esc_html__( 'Left', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-left',
					],
					'center'   => [
						'title'     => esc_html__( 'Center', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-center',
					],
					'right'      => [
						'title'     => esc_html__( 'Right', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-right',
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .link-box' => 'text-align: {{VALUE}};',
                ]
			],
		);

		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $target = $settings['button_link']['is_external'] ? ' target= "_blank"' : '';
        $nofollow = $settings['button_link']['nofollow'] ? ' rel= "nofollow"' : '';

        echo '<div class="link-box">';
        echo '<a href="' . $settings['button_link']['url']  . '" '. $target . $nofollow . 
            ' class="btn ' . $settings['button_style'] . '">'. $settings['button_text'] .'</a>';
        echo '</div>';

    }

}

