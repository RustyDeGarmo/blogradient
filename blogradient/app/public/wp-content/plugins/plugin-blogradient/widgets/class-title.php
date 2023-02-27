<?php
/**
 * 
 * Blogradient Title Widget with Subtitle
 * 
 */

class Blogradient_Title_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_title';
    }

	public function get_title() {
        return __('Title with Subtitle', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-site-title';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'title', 'eyebrow', 'heading', 'subtitle'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'blogradient_title',
			[
				'label' => esc_html__( 'Title with Subtitle', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle_text',
			[
				'label'         => esc_html__( 'Subtitle Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => __('Type your subtitle text here', 'plugin-blogradient'),
                'default'       => __('Fancy Dwayne Johnson Eyebrow Raise', 'plugin-blogradient'),
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Subtitle Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .sub-title'    => 'color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'title_text',
			[
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label'         => esc_html__( 'Title Text', 'plugin-blogradient' ),
                'label_block'   => true,
				'placeholder'   => esc_html__( 'Enter your title', 'plugin-blogradient' ),
                'default'       => __('Awesome Clickable Title', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'title_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Title Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} h2'    => 'color: {{VALUE}}',
                ]
			]
		);

        $this->add_control(
			'title_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Title Alignment', 'plugin-blogradient' ),
                'default'   => 'text-start',
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

        echo '<div class="title-wrapper ' . $settings['title_alignment'] . ' ">';
        echo '<p class=".sub-title>' . $settings['subtitle_text'] . '</p>';
        echo '<h2>' . $settings['title_text'] . '</h2>';
        echo '</div>';

    }

}
