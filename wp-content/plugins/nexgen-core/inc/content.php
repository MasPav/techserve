<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

function add_slider_content_control( $obj ) {

  $obj->start_controls_section(
    'slider_content',
      [
        'label' => 'Slider',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater->add_control(
      'layout_width',
      [
        'label' => __( 'Width', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 60,
        ],
      ]
    );

    $repeater->add_control(
      'layout_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'end' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'start',
        'toggle' => true,
      ]
    );
    
    $repeater->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $repeater->add_control(
      'image',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
    
    $repeater->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $repeater->add_control(
      'pre_title',
      [
        'label' => __( 'Pre-Title', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum'
      ]
    );
    
    $repeater->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );
    
    $repeater->add_control(
      'heading_tag',
      [
        'label' => __( 'Tag', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'h1' => __( 'H1', 'nexgen-core' ),
          'h2' => __( 'H2', 'nexgen-core' ),
          'h3' => __( 'H3', 'nexgen-core' ),
          'h4' => __( 'H4', 'nexgen-core' ),
          'h5' => __( 'H5', 'nexgen-core' ),
          'h6' => __( 'H6', 'nexgen-core' ),
        ],
        'default' => 'h1',
      ]
    );
  
    $repeater->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $repeater->add_control(
      'text_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $repeater->add_control(
      'primary_button_options',
      [
        'label' => __( 'Primary Button', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $repeater->add_control(
      'primary_button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $repeater->add_control(
      'primary_button_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $repeater->add_control(
      'secondary_button_options',
      [
        'label' => __( 'Secondary Button', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $repeater->add_control(
      'secondary_button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $repeater->add_control(
      'secondary_button_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'slider_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'heading' => 'Lorem ipsum <b>Dolor</b>',
            'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.',
          ],
        ],
        'title_field' => '{{{ heading }}}',
      ]
    );	

  $obj->end_controls_section();
}

function add_banner_content_control( $obj ) {

  $obj->start_controls_section(
    'banner_content',
      [
        'label' => 'Banner',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'layout_width',
      [
        'label' => __( 'Width', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 60,
        ],
      ]
    );

    $obj->add_control(
      'layout_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'end' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'start',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'image',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'pre_title',
      [
        'label' => __( 'Pre-Title', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum'
      ]
    );
    
    $obj->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );
    
    $obj->add_control(
      'heading_tag',
      [
        'label' => __( 'Tag', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'h1' => __( 'H1', 'nexgen-core' ),
          'h2' => __( 'H2', 'nexgen-core' ),
          'h3' => __( 'H3', 'nexgen-core' ),
          'h4' => __( 'H4', 'nexgen-core' ),
          'h5' => __( 'H5', 'nexgen-core' ),
          'h6' => __( 'H6', 'nexgen-core' ),
        ],
        'default' => 'h1',
      ]
    );
  
    $obj->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $obj->add_control(
      'text_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'primary_button_options',
      [
        'label' => __( 'Primary Button', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'primary_button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'primary_button_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'secondary_button_options',
      [
        'label' => __( 'Secondary Button', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'secondary_button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'secondary_button_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

  $obj->end_controls_section();
}

function add_parallax_content_control( $obj ) {

  $obj->start_controls_section(
    'parallax_content',
      [
        'label' => 'Parallax',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'parallax_image',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $obj->add_control(
      'parallax_h_position',
      [
        'label' => __( 'Horizontal Position', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
          '%' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ]
        ],
        'default' => [
          'unit' => '%',
          'size' => 50,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_particles_content_control( $obj ) {

  $obj->start_controls_section(
    'particles_content',
      [
        'label' => 'Particles',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'particles_type',
      [
        'label' => __( 'Type', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'nexgen-core' ),
          'squares' => __( 'Squares', 'nexgen-core' ),
          'hexagons' => __( 'Hexagons', 'nexgen-core' ),
          'space' => __( 'Space', 'nexgen-core' ),
          'neural' => __( 'Neural', 'nexgen-core' ),
        ],
        'default' => 'none',
      ]
    );

  $obj->end_controls_section();
}

function add_pre_title_content_control( $obj ) {

  $obj->start_controls_section(
    'pre_title_content',
      [
        'label' => 'Pre-Title',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'pre_title',
      [
        'label' => __( 'Pre-Title', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum'
      ]
    );

    $obj->add_control(
      'pre_title_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_heading_content_control( $obj ) {

  $obj->start_controls_section(
    'heading_content',
      [
        'label' => 'Heading',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );

    $obj->add_control(
      'heading_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_paragraph_content_control( $obj ) {

  $obj->start_controls_section(
    'paragraph_content',
      [
        'label' => 'Paragraph',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non tortor ut leo vulputate fringilla. Mauris ornare tristique dictum. Donec eu lorem nibh.'
      ]
    );

    $obj->add_control(
      'paragraph_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_number_content_control( $obj, $text = false ) {

  $obj->start_controls_section(
    'number_content',
      [
        'label' => 'Number',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    if ( $text === true ) {
  
      $obj->add_control(
        'number',
        [
          'label' => __( 'Number', 'nexgen-core' ),
          'type' => Controls_Manager::TEXT,
          'default' => '1º'
        ]
      );

    } else {
  
      $obj->add_control(
        'number',
        [
          'label' => __( 'Number', 'nexgen-core' ),
          'type' => Controls_Manager::NUMBER,
          'default' => 100
        ]
      );
    }

    $obj->add_control(
      'number_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

    $obj->add_control(
      'number_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-h-align-left',
          ],
          'top' => [
            'title' => __( 'Top', 'nexgen-core' ),
            'icon' => 'eicon-v-align-top',
          ],
          'bottom' => [
            'title' => __( 'Bottom', 'nexgen-core' ),
            'icon' => 'eicon-v-align-bottom',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'top',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_price_content_control( $obj ) {

  $obj->start_controls_section(
    'price_content',
      [
        'label' => 'Price',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'price',
      [
        'label' => __( 'Price', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum <b>Dolor</b>'
      ]
    );

    $obj->add_control(
      'price_alingment',
      [
        'label' => __('Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_video_content_control( $obj ) {

  $obj->start_controls_section(
    'video_content',
      [
        'label' => 'Video',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'video_title',
      [
        'label' => __( 'Title', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Lorem ipsum dolor.'
      ]
    );
  
    $obj->add_control(
      'video_url',
      [
        'label' => __( 'URL', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'placeholder' => __( 'Enter your URL (YouTube or Vimeo)', 'nexgen-core' ),
        'default' => 'https://vimeo.com/222990241',
      ]
    );

  $obj->end_controls_section();
}

function add_image_content_control( $obj ) {

  $obj->start_controls_section(
    'image_content',
      [
        'label' => 'Image',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_overlay_content_control( $obj ) {

  $obj->start_controls_section(
    'image_overlay_content',
      [
        'label' => 'Image Overlay',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_overlay',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_gallery_content_control( $obj ) {

  $obj->start_controls_section(
    'gallery_content',
      [
        'label' => 'Gallery',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'gallery',
      [
        'label' => __( 'Add Images', 'nexgen-core' ),
        'type' => Controls_Manager::GALLERY,
        'default' => [],
      ]
    );

    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_button_content_control( $obj ) {

  $obj->start_controls_section(
    'button_content',
      [
        'label' => 'Button',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
  
    $obj->add_control(
      'button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'default' => 'Click here'
      ]
    );

    $obj->add_control(
      'button_link_type',
      [
        'label' => __( 'Link Type', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'url' => __( 'URL', 'nexgen-core' ),
          'modal' => __( 'Modal', 'nexgen-core' ),
        ],
        'default' => 'url',
      ]
    );
  
    $obj->add_control(
      'button_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'condition' => [
            'button_link_type' => 'url'
        ],
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
  
    $obj->add_control(
      'button_modal_iframe',
      [
        'label' => __( 'Modal Iframe', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'condition' => [
            'button_link_type' => 'modal'
        ],
        'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.123073808986!2d12.490042215441486!3d41.89021017922119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61b6532013ad%3A0x28f1c82e908503c4!2sColiseu!5e0!3m2!1spt-BR!2sbr!4v1594148229878!5m2!1spt-BR!2sbr" width="600" height="450" aria-hidden="false" tabindex="0"></iframe>'
      ]
    );
  
    $obj->add_control(
      'button_modal_id',
      [
        'label' => __( 'Modal ID', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'condition' => [
            'button_link_type' => 'modal'
        ],
        'default' => 'my-modal'
      ]
    );

    $obj->add_control(
      'button_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-h-align-center',
          ],
          'end' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_action_content_control( $obj ) {

  $obj->start_controls_section(
    'action_content',
      [
        'label' => 'Action',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'action_type',
      [
        'label' => __( 'Action Type', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'none' => __( 'None', 'nexgen-core' ),
          'icon' => __( 'Pulse Icon', 'nexgen-core' ),
          'button' => __( 'Button', 'nexgen-core' ),
        ],
        'default' => 'icon',
      ]
    );
  
    $obj->add_control(
      'button_text',
      [
        'label' => __( 'Button Text', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'condition' => [
            'action_type' => 'button'
        ],
        'default' => 'Click here'
      ]
    );
  
    $obj->add_control(
      'action_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'condition' => [
          'action_type' => ['icon', 'button'],
        ],
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );

    $obj->add_control(
      'button_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'condition' => [
            'action_type' => 'button'
        ],
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_icon_content_control( $obj, $position = true ) {

  $obj->start_controls_section(
    'icon_content',
      [
        'label' => 'Icon',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'icon_type',
      [
        'label' => __( 'Icon Style', 'nexgen-core' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'fa' => __( 'Font Awesome', 'nexgen-core' ),
          'line' => __( 'Line Icons', 'nexgen-core' ),
        ],
        'default' => 'fa',
      ]
    );

    $obj->add_control(
      'icon',
      [
        'label' => __( 'Icon', 'nexgen-core' ),
        'type' => Controls_Manager::ICONS,
        'condition' => [
          'icon_type' => 'fa'
        ],
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );

    $obj->add_control(
      'icon_line',
      [
        'label' => __( 'Icon', 'nexgen-core' ),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'condition' => [
          'icon_type' => 'line'
        ],
        'options' => nxg_get_line_icons(),
        'default' => 'rocket',
      ]
    );

    if ( $position === true ) {
    
      $obj->add_control(
        'icon_position',
        [
          'label' => __( 'Position', 'nexgen-core' ),
          'type' => Controls_Manager::CHOOSE,
          'options' => [
            'mr-auto' => [
              'title' => __( 'Left', 'nexgen-core' ),
              'icon' => 'eicon-h-align-left',
            ],
            'm-auto' => [
              'title' => __( 'Center', 'nexgen-core' ),
              'icon' => 'eicon-h-align-center',
            ],
            'ml-auto' => [
              'title' => __( 'Right', 'nexgen-core' ),
              'icon' => 'eicon-h-align-right',
            ],
          ],
          'default' => 'mr-auto',
          'toggle' => true,
        ]
      );
    }

  $obj->end_controls_section();
}

function add_person_content_control( $obj ) {

  $obj->start_controls_section(
    'person_content',
      [
        'label' => 'Person',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'image_options',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING
      ]
    );
  
    $obj->add_control(
      'person_photo',
      [
        'label' => __( 'Photo', 'nexgen-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $obj->add_control(
      'person_photo_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-h-align-left',
          ],
          'top' => [
            'title' => __( 'Top', 'nexgen-core' ),
            'icon' => 'eicon-v-align-top',
          ],
          'bottom' => [
            'title' => __( 'Bottom', 'nexgen-core' ),
            'icon' => 'eicon-v-align-bottom',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'person_name',
      [
        'label' => __( 'Name', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'John Doe'
      ]
    );
  
    $obj->add_control(
      'person_title',
      [
        'label' => __( 'Title', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Designer'
      ]
    );
  
    $obj->add_control(
      'person_biography',
      [
        'label' => __( 'Biography', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis diam varius diam ultricies lacinia.'
      ]
    );

    $obj->add_control(
      'person_text_alingment',
      [
        'label' => __( 'Text Alignment', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

  $obj->end_controls_section();
}

function add_social_icons_content_control( $obj ) {

  $obj->start_controls_section(
    'social_icon_content',
      [
        'label' => 'Social Icons',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'social_icon',
      [
        'label' => __( 'Icon', 'nexgen-core' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );

    $repeater->add_control(
      'social_icon_link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'social_icon_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'social_icon' => [ 'value' => 'fab fa-facebook-f', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://facebook.com/', 'is_external' => true, 'nofollow' => true ],
          ],
          [
            'social_icon' => [ 'value' => 'fab fa-twitter', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://twitter.com/', 'is_external' => true, 'nofollow' => true ],
          ],
          [
            'social_icon' => [ 'value' => 'fab fa-linkedin-in', 'library' => 'solid' ],
            'social_icon_link' => [ 'url' => 'https://linkedin.com/', 'is_external' => true, 'nofollow' => true ],
          ],
        ],
        'title_field' => '{{{ social_icon_link.url }}}',
      ]
    );	
  
  $obj->end_controls_section();
}

function add_post_item_content_control( $obj ) {

  $obj->start_controls_section(
    'post_item_content',
      [
        'label' => 'Post Item',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_options',
      [
        'label' => __( 'Display', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $obj->add_control(
      'post_item_display_author',
      [
        'label' => esc_attr__('Author Name', 'nexgen-core'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'nexgen-core'),
        'label_off' => esc_attr__('Hide', 'nexgen-core'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'post_item_display_date',
      [
        'label' => esc_attr__('Publish Date', 'nexgen-core'),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'nexgen-core'),
        'label_off' => esc_attr__('Hide', 'nexgen-core'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );
    
    $obj->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'post_item_text_alingment',
      [
        'label' => __('Text Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
      ]
    );

    $obj->add_control(
      'post_item_metadata_alingment',
      [
        'label' => __('Metadata Alignment', 'nexgen-core'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'start' => [
            'title' => __('Left', 'nexgen-core'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __('Center', 'nexgen-core'),
            'icon' => 'eicon-text-align-center',
          ],
          'end' => [
            'title' => __('Right', 'nexgen-core'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $obj->add_control(
      'post_item_columns',
      [
        'label' => __( 'Columns', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

    $obj->add_control(
      'post_item_per_page',
      [
        'label' => __( 'Posts Per Page', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 64,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 12,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_filter_content_control( $obj, $post_type ) {

  $obj->start_controls_section(
    'filter_content',
      [
        'label' => 'Filter',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_filter',
      [
        'label' => esc_attr__( 'Filter', 'nexgen-core' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'nexgen-core' ),
        'label_off' => esc_attr__( 'Hide', 'nexgen-core' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'display_all_button',
      [
        'label' => esc_attr__( 'All Button', 'nexgen-core' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'nexgen-core' ),
        'label_off' => esc_attr__( 'Hide', 'nexgen-core' ),
        'return_value' => 'yes',
        'default' => 'yes',
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );			
  
    $obj->add_control(
      'all_button_text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'All', 'nexgen-core' ),
        'condition' => [
          'display_filter' => 'yes',
          'display_all_button' => 'yes'
        ],
      ]
    );

    $obj->add_control( 
      'post_categories',
      [
        'label' => esc_attr__( 'Categories', 'nexgen-core' ),
        'label_block' => true,
        'type' => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => nxg_get_categories( $post_type ),
        'default' => 'all',
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );

    $obj->add_control(
      'filter_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-h-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_pagination_content_control( $obj ) {

  $obj->start_controls_section(
    'pagination_content',
      [
        'label' => 'Pagination',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_pagination',
      [
        'label' => esc_attr__( 'Pagination', 'nexgen-core' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__( 'Show', 'nexgen-core' ),
        'label_off' => esc_attr__( 'Hide', 'nexgen-core' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );

    $obj->add_control(
      'pagination_position',
      [
        'label' => __( 'Position', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'mr-auto' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-h-align-left',
          ],
          'm-auto' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-h-align-center',
          ],
          'ml-auto' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'ml-auto',
        'toggle' => true,
        'condition' => [
          'display_pagination' => 'yes'
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_form_content_control( $obj ) {
  
  $obj->start_controls_section(
    'form_content',
      [
        'label' => 'Form',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'contact_form_7_options',
      [
        'label' => __( 'Contact Form 7', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
  
    $obj->add_control(
      'contact_form_7_shortcode',
      [
        'label' => __( 'Shortcode', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'placeholder' => __('[contact-form-7 id="123" title="Your Form"]', 'nexgen-core' ),
      ]
    );

  $obj->end_controls_section();
}

function add_icon_list_content_control( $obj ) {

  $obj->start_controls_section(
    'icon_list_content',
      [
        'label' => 'Icon List',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'icon',
      [
        'label' => __( 'Icon', 'nexgen-core' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
    
    $repeater->add_control(
      'text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
      ]
    );
    
    $repeater->add_control(
      'text_alingment',
      [
        'label' => __( 'Text Alignment', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );

    $repeater->add_control(
      'link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
        ],
      ]
    );
    
    $obj->add_control(
      'icon_list_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'icon' => [ 'value' => 'fas fa-star', 'library' => 'solid' ],
            'text' => 'List Item #1',
            'link' => [ 'url' => '#', 'is_external' => true, 'nofollow' => true ],
          ],
        ],
        'text_field' => '{{{ text }}}',
      ]
    );
    
  $obj->end_controls_section();
}

function add_check_list_content_control( $obj ) {

  $obj->start_controls_section(
    'check_list_content',
      [
        'label' => 'Check List',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'icon',
      [
        'label' => __( 'Icon', 'nexgen-core' ),
        'type' => Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
    
    $repeater->add_control(
      'text',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
      ]
    );
    
    $obj->add_control(
      'check_list_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'icon' => [ 'value' => 'fas fa-check', 'library' => 'solid' ],
            'text' => 'List Item #1',
          ],
          [
            'icon' => [ 'value' => 'fas fa-check', 'library' => 'solid' ],
            'text' => 'List Item #2',
          ],
          [
            'icon' => [ 'value' => 'fas fa-times', 'library' => 'solid' ],
            'text' => 'List Item #3',
          ],
        ],
        'text_field' => '{{{ text }}}',
      ]
    );
    
  $obj->end_controls_section();
}

function add_sale_tag_content_control( $obj ) {

  $obj->start_controls_section(
    'sale_tag_content',
      [
        'label' => 'Sale Tag',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $obj->add_control(
      'display_sale_tag',
      [
        'label' => esc_attr__( 'Display', 'nexgen-core' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => esc_attr__('Show', 'nexgen-core'),
        'label_off' => esc_attr__('Hide', 'nexgen-core'),
        'return_value' => 'yes',
      ]
    );

    $obj->add_control(
      'sale_tag_text',
      [
        'label' => __( 'Sale Tag', 'nexgen-core' ),
        'type' => Controls_Manager::TEXT,
        'default' => esc_attr__( 'Most Popular', 'nexgen-core' ),
        'condition' => [
          'display_sale_tag' => [ 'yes' ]
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_testimonial_carousel_content_control( $obj ) {

  $obj->start_controls_section(
    'carousel_content',
      [
        'label' => 'Carousel',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );
    
    $obj->add_control(
      'items_options',
      [
        'label' => __( 'Items', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater = new Repeater();
    
    $repeater->add_control(
      'text_options',
      [
        'label' => __( 'Text', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
      ]
    );

    $repeater->add_control(
      'heading',
      [
        'label' => __( 'Heading', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'rows' => 2,
        'default' => 'Item #1'
      ]
    );
  
    $repeater->add_control(
      'paragraph',
      [
        'label' => __( 'Paragraph', 'nexgen-core' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit.'
      ]
    );

    $repeater->add_control(
      'text_alingment',
      [
        'label' => __( 'Alignment', 'nexgen-core' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => __( 'Left', 'nexgen-core' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'nexgen-core' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'nexgen-core' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'toggle' => true,
      ]
    );
    
    $obj->add_control(
      'carousel_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'heading' => 'Item #1',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
          [
            'heading' => 'Item #2',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
          [
            'heading' => 'Item #3',
            'paragraph' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
          ],
        ],
        'text_field' => '{{{ heading }}}',
      ]
    );	
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    
    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_logo_carousel_content_control( $obj ) {

  $obj->start_controls_section(
    'carousel_content',
      [
        'label' => 'Carousel',
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'image',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
  
    $repeater->add_control(
      'title',
      [
        'label' => __( 'Title', 'nexgen-core' ),
        'label_block' => true,
        'type' => Controls_Manager::TEXT,
        'default' => 'Client #1'
      ]
    );
  
    $repeater->add_control(
      'link',
      [
        'label' => esc_attr__( 'Link', 'nexgen-core' ),
        'type'  => Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'nexgen-core' ),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
         ],
      ]
    );
    
    $obj->add_control(
      'carousel_items',
      [
        'show_label' => false,
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #1',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #2',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #3',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #4',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #5',
            'link' => '#',
          ],
          [
            'image' => Utils::get_placeholder_image_src(),
            'title' => 'Client #6',
            'link' => '#',
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );
    
    $obj->add_control(
      'layout_options',
      [
        'label' => __( 'Layout', 'nexgen-core' ),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    
    $obj->add_control(
      'columns',
      [
        'label' => __( 'Columns', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 6,
          ],
        ],
        'default' => [
          'size' => 3,
        ],
      ]
    );

  $obj->end_controls_section();
}