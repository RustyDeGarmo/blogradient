<?php
/**
 * 
 * Blogradient Custom Link Widget
 * 
 */

class Blogradient_Link_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_link';
    }

	public function get_title() {
        return __('Link', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-editor-link';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'link', 'button'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'blogradient_link',
			[
				'label' => esc_html__( 'Link', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'         => esc_html__( 'Link Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => __('Type your link text here', 'plugin-blogradient'),
                'default'       => __('Clickbait ->', 'plugin-blogradient'),
			]
		);

        $this->add_control(
			'link_url',
			[
				'label'         => esc_html__( 'Link URL', 'plugin-blogradient' ),
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
			'link_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Link Color', 'plugin-blogradient' ),
				'default'   => '#0000FF',
                'selectors' => [
                    '{{WRAPPER}} .colored-link'    => 'color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'hover_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => esc_html__( 'Hover Color', 'plugin-blogradient' ),
				'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .colored-link:hover'    => 'color: {{VALUE}}',
                ]
			]
		);

        $this->add_control(
			'link_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Link Alignment', 'plugin-blogradient' ),
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
        $target = $settings['link_url']['is_external'] ? ' target= "_blank"' : '';
        $nofollow = $settings['link_url']['nofollow'] ? ' rel= "nofollow"' : '';

        echo '<div class="link-box ' . $settings['link_alignment'] . ' ">';
        echo '<a href="' . $settings['link_url']['url'] . $target . $nofollow .
            '"class="colored-link">' . $settings['link_text'] . '</a>';
        echo '</div>';

    }

}

