<?php
/**
 * 
 * Blogradient Custom Card Widget
 * 
 */

 if(!defined('ABSPATH')){
    exit; //exit if accessed directly for security
}

class Blogradient_Card_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'blogradient_card';
    }

	public function get_title() {
        return __('Card', 'plugin-blogradient');
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	// TODO public function get_custom_help_url() {}

	public function get_categories() {
        return ['blogradient_category'];
    }

	public function get_keywords() {
        return ['blogradient', 'card', 'text'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'blogradient_card',
			[
				'label' => esc_html__( 'Card', 'plugin-blogradient' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_title_text',
			[
				'label'         => esc_html__( 'Title Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => esc_html__('Type your Title here', 'plugin-blogradient'),
                'default'       => __('Attention Grabbing Title', 'plugin-blogradient'),
			]
		);
        
        $this->add_control(
			'card_text',
			[
				'label'         => esc_html__( 'Card Text', 'plugin-blogradient' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
                'placeholder'   => esc_html__('Type your card text here', 'plugin-blogradient'),
                'default'       => __('Super engaging content', 'plugin-blogradient'),
			]
		);

		$this->add_control(
			'card_image',
			[
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'label'     => esc_html__( 'Image', 'plugin-blogradient' ),
				'default'   => [
                    'url'   => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
                'name'      => 'background',
				'types'     => ['classic', 'gradient'],
				'label'     => esc_html__( 'Background', 'plugin-blogradient' ),
                'selector'  => '{{WRAPPER}} .text-card',
			]
		);

		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="text-card style-1">';
            echo '<div class="overlay"></div>';
                echo '<h4>' . $settings['card_title_text'] . '</h4>';
                echo '<p>' . $settings['card_text'] . '</p>';
                echo '<div class="overlay-image">';
                    echo '<img src="' . esc_url($settings['card_image']['url']) . '" />';
                echo '</div>';
            echo '</div>';
        echo '</div>';

    }

}
