<?php

if(!class_exists('Kirki')){
    return;
}

new \Kirki\Panel(
    'theme_option_panel', 
    [
        'priority'    => 10,
		'title'       => esc_html__( 'Theme Options', 'blogradient' ),
		'description' => esc_html__( 'Use this to customize the Theme.', 'blogradient' ),
    ]
    );

// Sections

// Section - Subscribe Bar
new \Kirki\Section(
	'subscribe_bar',
	[
		'title'       => esc_html__( 'Subscribe Bar', 'blogradient' ),
		'description' => esc_html__( 'Controls for the subscribe bar.', 'blogradient' ),
		'panel'       => 'theme_option_panel',
		'priority'    => 160,
	]
);

// Section - Subscribe Bar - Fields
new \Kirki\Field\Textarea(
	[
		'settings'    => 'subscribe_text',
		'label'       => esc_html__( 'Subscribe Bar Text', 'blogradient' ),
		'section'     => 'subscribe_bar',
		'default'     => esc_html__( 'This is a default value', 'blogradient' ),
	]
);

new \Kirki\Field\Code(
	[
		'settings'    => 'subscribe_form',
		'label'       => esc_html__( 'Subscribe Form HTML', 'blogradient' ),
		'description' => esc_html__( 
            'Code your custom HTML subscribe form or enter your email service form here (e.g. AWeber)', 'blogradient' ),
		'section'     => 'subscribe_bar',
		'default'     => '',
		'choices'     => [
			'language' => 'html',
		],
	]
);

// Section - Footer
new \Kirki\Section(
	'footer_section',
	[
		'title'       => esc_html__( 'Footer', 'blogradient' ),
		'description' => esc_html__( 'Controls for the footer.', 'blogradient' ),
		'panel'       => 'theme_option_panel',
		'priority'    => 160,
	]
);

// Section - Footer - Fields
new \Kirki\Field\Textarea(
	[
		'settings'          => 'footer_copyright',
		'label'             => esc_html__( 'Footer Copyright Text', 'blogradient' ),
		'section'           => 'footer_section',
		'default'           => esc_html__( 'Copyright Brightside Studios Inc.', 'blogradient' ),
        'partial_refresh'   => array(
            'footer_copyright'  => array(
                'selector'          => 'footer .copyright p',
                'render_callback'   => function(){
                    return get_theme_mod('footer_copyright');
                }
            ),
        ),
	]
);

//Section - Pre-Footer Call-to-Action
new \Kirki\Section(
	'footer_calltoaction_section',
	[
		'title'       => esc_html__( 'Call to Action', 'blogradient' ),
		'description' => esc_html__( 'Controls for the pre-footer Call to Action.', 'blogradient' ),
		'panel'       => 'theme_option_panel',
		'priority'    => 160,
	]
);

//Section - Pre-Footer CTA - Fields
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'      => 'footer_calltoaction_visibility',
		'label'         => esc_html__( 'Call to Action section', 'blogradient' ),
        'description'   => esc_html__( 'Toggle footer Call to Action visibility', 'blogradient' ),
		'section'       => 'footer_calltoaction_section',
		'default'       => 'on',
        'choices'       => [
            'on'    => esc_html__('Enabled', 'blogradient'), 
            'off'   => esc_html__('Disabled', 'blogradient'),
        ],
	]
);

new \Kirki\Field\Text(
	[
		'settings'          => 'footer_calltoaction_eyebrow',
		'label'             => esc_html__( 'Call to Action Eyebrow', 'blogradient' ),
        'tooltip'           => esc_html__( 'Call to Action Eyebrow Text', 'blogradient' ),
		'section'           => 'footer_calltoaction_section',
		'default'           => esc_html__( 'Sign Up Now', 'blogradient' ),
		'priority'          => 10,
        'partial_refresh'   => array(
            'footer_calltoaction_eyebrow'   => array(
                'selector'                  => '.footer-calltoaction p.sub-title',
                'render_callback'           => function(){
                    return get_theme_mod('footer_calltoaction_eyebrow');
                }
            ),
        ),
	]
);

new \Kirki\Field\Text(
	[
		'settings'          => 'footer_calltoaction_heading',
		'label'             => esc_html__( 'Call to Action Heading', 'blogradient' ),
        'tooltip'           => esc_html__( 'Call to Action Main Heading Text', 'blogradient' ),
		'section'           => 'footer_calltoaction_section',
		'default'           => esc_html__( 'Exciting Call to Action Heading', 'blogradient' ),
		'priority'          => 10,
        'partial_refresh'   => array(
            'footer_calltoaction_heading'  => array(
                'selector'          => '.footer-calltoaction h2',
                'render_callback'   => function(){
                    return get_theme_mod('footer_calltoaction_heading');
                }
            ),
        ),
	]
);

new \Kirki\Field\Textarea(
	[
		'settings'          => 'footer_calltoaction_desc',
		'label'             => esc_html__( 'Call to Action Description', 'blogradient' ),
        'tooltip'           => esc_html__( 'Call to Action Body Text Area', 'blogradient' ),
		'section'           => 'footer_calltoaction_section',
		'default'           => esc_html__( 'Default call to action description text area', 'blogradient' ),
        'partial_refresh'   => array(
            'footer_calltoaction_desc'  => array(
                'selector'          => '.footer-calltoaction p.cta-description',
                'render_callback'   => function(){
                    return get_theme_mod('footer_calltoaction_desc');
                }
            ),
        ),
	]
);

new \Kirki\Field\Text(
	[
		'settings'          => 'footer_calltoaction_button',
		'label'             => esc_html__( 'Button Text', 'blogradient' ),
        'tooltip'           => esc_html__( 'Call to Action Button Text', 'blogradient' ),
		'section'           => 'footer_calltoaction_section',
		'default'           => esc_html__( 'Join Now -&gt;', 'blogradient' ),
		'priority'          => 10,
        'partial_refresh'   => array(
            'footer_calltoaction_button'   => array(
                'selector'                  => '.footer-calltoaction .btn',
                'render_callback'           => function(){
                    return get_theme_mod('footer_calltoaction_button');
                }
            ),
        ),
	]
);

new \Kirki\Field\URL(
	[
		'settings'          => 'footer_calltoaction_link',
		'label'             => esc_html__( 'Call to Action Button Link', 'blogradient' ),
        'tooltip'           => esc_html__( 'Call to Action Button Link Text', 'blogradient' ),
		'section'           => 'footer_calltoaction_section',
		'default'           => '#',
		'priority'          => 10,
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'      => 'footer_calltoaction_link_new_tab',
		'label'         => esc_html__( 'Link Opens in New Tab', 'blogradient' ),
        'description'   => esc_html__( 'Toggle whether link opens in new tab', 'blogradient' ),
		'section'       => 'footer_calltoaction_section',
		'default'       => 'on',
        'choices'       => [
            'on'    => esc_html__('Opens in New Tab', 'blogradient'), 
            'off'   => esc_html__('Opens in This Tab', 'blogradient'),
        ],
	]
);
