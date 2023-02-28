<?php
/**
 * 
 * Blogradient Title Widget with Subtitle
 * 
 */

 if(!defined('ABSPATH')){
    exit; //exit if accessed directly for security
}

class Blogradient_Testimonial_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_testimonial';
    }

	public function get_title() {
        return __('Blogradient Testimonial', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-testimonial';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'testimonial', 'feedback', 'rating'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'blogradient_testimonial',
			[
				'label' => esc_html__( 'Blogradient Testimonial', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testmonial_text',
			[
				'label'         => esc_html__( 'Testimonial Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => __('Testify!', 'plugin-blogradient'),
                'default'       => __('Your amazing testimonial quote appears here', 'plugin-blogradient'),
			]
		);

		$this->add_control(
			'testimonial_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Testimonial Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .testimonial p'    => 'color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'name_text',
			[
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label'         => esc_html__( 'Name', 'plugin-blogradient' ),
                'label_block'   => true,
				'placeholder'   => esc_html__( 'James Bond', 'plugin-blogradient' ),
                'default'       => __('James Bond', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'name_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Name Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} cite'    => 'color: {{VALUE}}',
                ]
			]
		);

        $this->add_control(
			'title_text',
			[
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label'         => esc_html__( 'Title', 'plugin-blogradient' ),
                'label_block'   => true,
				'placeholder'   => esc_html__( 'Double Agent', 'plugin-blogradient' ),
                'default'       => __('Double Agent', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'title_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Cite Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} span'    => 'color: {{VALUE}}',
                ]
			]
		);

        $this->add_control(
			'testimonial_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Testimonial Alignment', 'plugin-blogradient' ),
                'default'   => 'text-center',
                'toggle'    => true,
				'options' => [
					'text-start'    => [
						'title'     => esc_html__( 'Left', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-left',
					],
					'text-center'   => [
						'title'     => esc_html__( 'Center', 'plugin-blogradient' ),
						'icon'      => 'eicon-text-align-center',
					],
					'text-end'  => [
						'title' => esc_html__( 'Right', 'plugin-blogradient' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
			],
		);

		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="testimonial-wrapper ' . $settings['testimonial_alignment'] . ' ">';
            echo '<blockquote class="testimonial">';
                echo '<p>' . $settings['testimonial_text'] . '</p>';
                echo '<cite>' . $settings['name_text'] . '<span>' . ' / ' . 
                    $settings['title_text'] . '</span></cite>';
            echo '</blockquote>';
        echo '</div>';

    }

}
