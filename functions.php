<?php
    
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',array( 'parent-style' ),wp_get_theme()->get('Version')
        );
     }
     add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

     /* functions.php */
  
add_action( 'customize_register', 'gridbox_child_add_stuff_to_customizer' );

function gridbox_child_add_stuff_to_customizer( $wp_customize ) { 
     /* ici j'ajoute la section du texte*/
    $wp_customize->add_section(
        'grid_child_custom_section', /* section id */
        array(
        'title'       => 'Réglages Brioche et Cannelle',
        'description' => 'Les options ajoutés via mon thème enfant',
        )
    );

    /* ici j'ajoute un setting, une entrée dans la base de donnée pour mon option */

    $wp_customize->add_setting(
        'grid_child_custom_footer_setting_text',
        array(
        'default'           => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses', /* ceci dépend du type de données */
        )
    );

    /* ici  j'ajoute un control (autrement dit un champ input, textarea, select etc.) qui permettra à enregistrer notre setting */

    $wp_customize->add_control(
        'grid_child_custom_footer_setting_text',
        array(
        'type'        => 'textarea', /* différents types sont disponible */
        'section'     => 'grid_child_custom_section', // Required, core or custom.
        'label'       => 'Modifier votre footer (text)',
        'description' => 'Ici vous pouvez modifier le texte à afficher au pied de la page.',
        )
    );


    /* ici j'ajoute un setting, une entrée dans la base de donnée pour mon option */

    $wp_customize->add_setting(
        'grid_child_custom_footer_setting_link',
        array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw', /* ceci dépend du type de données */
        )
    );

    /* ici  j'ajoute un control (autrement dit un champ input, textarea, select etc.) qui permettra à enregistrer notre setting */

    $wp_customize->add_control(
        'grid_child_custom_footer_setting_link',
        array(
        'type'        => 'text', /* différents types sont disponible */
        'section'     => 'grid_child_custom_section', // Required, core or custom.
        'label'       => 'Modifier votre footer',
        'description' => 'Ici vous pouvez modifier le lien du pied de la page.',
        )
    );

 }
    
?>