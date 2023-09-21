<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;

function add_block_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'block_style',
      [
        'label' => __( 'Block', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'block_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'block_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'block_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'block_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_block_image_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'block_style',
      [
        'label' => __( 'Block', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      'block_min_height',
      [
        'label' => __( 'Min Height', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 200,
            'max' => 800,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 360,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' .image-over img' => 'min-height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'block_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'block_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .card-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'block_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .image-over img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' .image-over img:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'block_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_pre_title_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'pre_title_style',
      [
        'label' => __( 'Pre-Title', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'pre_title_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      'pre_title_text_color',
      [
        'label' => __( 'Text Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#00a6a6',
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      'pre_title_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'pre_title_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'pre_title_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'pre_title_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'pre_title_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_heading_style_control( $obj, $name = 'heading', $title = 'Heading', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_1,
      ]
    );
    
    $obj->add_control(
      $name . '_text_color',
      [
        'label' => __( 'Text Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#21333E',
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_heading_highlight_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'heading_highlight_style',
      [
        'label' => __( 'Heading Highlight', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'heading_highlight_typography',
        'selector' => '{{WRAPPER}} ' . $class . ' b, {{WRAPPER}} ' . $class . ' u',
        'scheme' => Schemes\Typography::TYPOGRAPHY_1,
      ]
    );
    
    $obj->add_control(
      'heading_highlight_text_color',
      [
        'label' => __( 'Text Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#058283',
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b' => 'color: {{VALUE}};',
          '{{WRAPPER}} ' . $class . ' u' => 'color: {{VALUE}};',
        ],
      ]
    );
  
    $obj->add_control(
      'heading_highlight_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => 'rgb(5 130 131 / 15%)',
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b' => 'background-color: {{VALUE}};',
          '{{WRAPPER}} ' . $class . ' u:before' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'heading_highlight_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' u' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'heading_highlight_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'default' => [ 'top' => 5, 'right' => 15, 'bottom' => 5, 'left' => 15, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' u' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'heading_highlight_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class . ' u:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'heading_highlight_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selectors' => [
          '{{WRAPPER}} ' . $class . ' b',
          '{{WRAPPER}} ' . $class . ' u:before ',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_paragraph_style_control( $obj, $name = 'paragraph', $title = 'Paragraph', $condition = null, $wrapper = null, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      $name . '_text_color',
      [
        'label' => __( 'Text Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_number_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'number_style',
      [
        'label' => __( 'Number', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'number_typography',
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );
    
    $obj->add_control(
      'number_color',
      [
        'label' => __( 'Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      'number_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'number_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'default' => [ 'top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'number_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'number_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'number_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_line_style_control( $obj, $class ) {

  $obj->start_controls_section(
    'line_style',
      [
        'label' => __( 'Line', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'line_color',
      [
        'label' => __( 'Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#058283',
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before, {{WRAPPER}} ' . $class . ':after' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'line_height',
      [
        'label' => __( 'Height', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 5,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class . ':before, {{WRAPPER}} ' . $class . ':after' => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_progress_bar_style_control( $obj ) {

  $obj->start_controls_section(
    'progress_bar_style',
      [
        'label' => __( 'Progress Bar', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'progress_bar_color',
      [
        'label' => __( 'Fill Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#606D75'
      ]
    );
    
    $obj->add_control(
      'progress_bar_empty_color',
      [
        'label' => __( 'Empty Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#cccccc'
      ]
    );

  $obj->end_controls_section();
}

function add_button_style_control( $obj, $name, $title, $condition, $class ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_border',
            'label' => __( 'Border', 'nexgen-core' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_hover_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => $name . '_hover_border',
            'label' => __( 'Border', 'nexgen-core' ),
            'selector' => '{{WRAPPER}} ' . $class . ':hover',
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_style',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->add_control(
      'image_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'image_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'image_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'image_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_banner_image_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_style',
      [
        'label' => __( 'Image', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'image_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#058283',
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $obj->add_control(
      'image_opacity',
      [
        'label' => __( 'Opacity Control', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
          ]
        ],
        'default' => [
          'size' => 0.85,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper . ' ' . $class => 'opacity: {{SIZE}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_image_overlay_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'image_overlay_style',
      [
        'label' => __( 'Image Overlay', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_control(
      'image_overlay_size',
      [
        'label' => __( 'Size', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1000,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $obj->start_controls_tabs(
      'image_overlay_tabs'
      );

      $obj->start_controls_tab(
        'image_overlay_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );      

        $obj->add_control(
          'image_overlay_opacity',
          [
            'label' => __( 'Opacity Control', 'nexgen-core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'default' => [
              'size' => 0.85,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'opacity: {{SIZE}};',
            ],
          ]
        );  
    
        $obj->add_control(
          'image_overlay_background_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#058283',
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => 'image_overlay_border',
            'label' => __( 'Border', 'nexgen-core' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();
      
      $obj->start_controls_tab(
        'image_overlay_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );  

        $obj->add_control(
          'image_overlay_hover_opacity',
          [
            'label' => __( 'Opacity Control', 'nexgen-core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
              ]
            ],
            'default' => [
              'size' => 0.85,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover ' . $class => 'opacity: {{SIZE}};',
            ],
          ]
        );
    
        $obj->add_control(
          'image_overlay_background_hover_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#058283',
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );

        $obj->add_group_control(
          Group_Control_Border::get_type(),
          [
            'name' => 'image_overlay_hover_border',
            'label' => __( 'Border', 'nexgen-core' ),
            'selector' => '{{WRAPPER}} ' . $class,
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      'image_overlay_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'image_overlay_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'default' => [ 'top' => 4, 'right' => 4, 'bottom' => 4, 'left' => 4, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_icon_style_control( $obj, $name, $title, $condition, $wrapper, $class ) {
  
  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition,
      ]
    );

    $obj->add_control(
      $name . '_size',
      [
        'label' => __( 'Size', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 500,
          ],
          'rem' => [
            'min' => 0,
            'max' => 100,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => 45,
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} ' . $wrapper . ' svg' => ' width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};'
        ],
      ]
    );

    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Icon Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}}; fill: {{VALUE}};',
              '{{WRAPPER}} ' . $wrapper . ' svg path' => 'color: {{VALUE}}; fill: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );

        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Icon Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}}; fill: {{VALUE}};',
              '{{WRAPPER}} ' . $wrapper . ':hover svg path' => 'color: {{VALUE}}; fill: {{VALUE}};',
              '{{WRAPPER}} a:hover ' . $class => 'color: {{VALUE}}; fill: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_hover_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover' => 'background-color: {{VALUE}};',
              '{{WRAPPER}} a:hover ' . $wrapper => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} ' . $wrapper . ' svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $wrapper => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $wrapper,
      ]
    );

  $obj->end_controls_section();
}

function add_play_icon_style_control( $obj, $wrapper, $class ) {

  $obj->start_controls_section(
    'play_icon_style',
      [
        'label' => __( 'Play Icon', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $obj->start_controls_tabs(
      'play_icon_tabs'
      );

      $obj->start_controls_tab(
        'play_icon_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );

        $obj->add_control(
          'play_icon_size',
          [
            'label' => __( 'Size', 'nexgen-core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'rem', '%' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 500,
              ],
              'rem' => [
                'min' => 0,
                'max' => 100,
              ],
              '%' => [
                'min' => 0,
                'max' => 100,
              ],
            ],
            'default' => [
              'unit' => 'rem',
              'size' => 6,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'font-size: {{SIZE}}{{UNIT}};',
            ],
          ]
        );

        $obj->add_control(
          'play_icon_color',
          [
            'label' => __( 'Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#FFFFFF',
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();
  
      $obj->start_controls_tab(
        'play_icon_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );

        $obj->add_control(
          'play_icon_hover_size',
          [
            'label' => __( 'Size', 'nexgen-core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'rem', '%' ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 500,
              ],
              'rem' => [
                'min' => 0,
                'max' => 100,
              ],
              '%' => [
                'min' => 0,
                'max' => 100,
              ],
            ],
            'default' => [
              'unit' => 'rem',
              'size' => 6,
            ],
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover ' . $class => 'font-size: {{SIZE}}{{UNIT}};',
            ],
          ]
        );

        $obj->add_control(
          'play_icon_hover_color',
          [
            'label' => __( 'Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#FFFFFF',
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

  $obj->end_controls_section();
}

function add_pulse_icon_style_control( $obj, $condition, $wrapper, $class ) {

  $obj->start_controls_section(
    'pulse_icon_style',
      [
        'label' => __( 'Pulse Icon', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => $condition
      ]
    );

    $obj->start_controls_tabs(
      'pulse_icon_tabs'
      );

      $obj->start_controls_tab(
        'pulse_icon_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          'pulse_icon_color',
          [
            'label' => __( 'Icon Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'style_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          'pulse_icon_hover_color',
          [
            'label' => __( 'Icon Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $wrapper . ':hover ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          'pulse_icon_pulse_color',
          [
            'label' => __( 'Pulse Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

  $obj->end_controls_section();
}

function add_particles_style_control( $obj ) {

  $obj->start_controls_section(
    'particles_style',
      [
        'label' => __( 'Particles', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'particles_type' => [ 'squares', 'hexagons', 'space', 'neural' ]
        ],
      ]
    );
    
    $obj->add_control(
      'particles_color',
      [
        'label' => __( 'Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'default' => '#21333E',
      ]
    );

    $obj->add_control(
      'particles_opacity',
      [
        'label' => __( 'Opacity Control', 'nexgen-core' ),
        'type' => Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
          ]
        ],
        'default' => [
          'size' => 0.5,
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_filter_style_control( $obj, $name, $title, $class, $class_active ) {

  $obj->start_controls_section(
    $name . '_style',
      [
        'label' => __( $title, 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
          'display_filter' => 'yes'
        ],
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => $name . '_typography',
        'selector' => '{{WRAPPER}} ' . $class,
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->start_controls_tabs(
      $name . '_tabs'
      );

      $obj->start_controls_tab(
        $name . '_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_color',
          [
            'label' => __( 'Text Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_hover_color',
          [
            'label' => __( 'Text Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_hover_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        $name . '_active_tab',
          [
            'label' => __( 'Active', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          $name . '_active_color',
          [
            'label' => __( 'Text Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          $name . '_background_active_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'background-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();

    $obj->add_control(
      $name . '_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      $name . '_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      $name . '_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => $name . '_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} ' . $class,
      ]
    );

  $obj->end_controls_section();
}

function add_pagination_style_control( $obj, $class, $class_active ) {

  $obj->start_controls_section(
    'pagination_style',
      [
        'label' => __( 'Pagination', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE
      ]
    );
    
    $obj->start_controls_tabs(
      'pagination_tabs'
      );

      $obj->start_controls_tab(
        'pagination_normal_tab',
          [
            'label' => __( 'Normal', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          'pagination_background_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'background-color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          'pagination_border_color',
          [
            'label' => __( 'Border Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class => 'border-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'pagination_hover_tab',
          [
            'label' => __( 'Hover', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          'pagination_background_hover_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'background-color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          'pagination_border_hover_color',
          [
            'label' => __( 'Border Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class . ':hover' => 'border-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

      $obj->start_controls_tab(
        'pagination_active_tab',
          [
            'label' => __( 'Active', 'nexgen-core' ),
          ]
        );
    
        $obj->add_control(
          'pagination_background_active_color',
          [
            'label' => __( 'Background Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'background-color: {{VALUE}};',
            ],
          ]
        );
    
        $obj->add_control(
          'pagination_border_active_color',
          [
            'label' => __( 'Border Color', 'nexgen-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
              '{{WRAPPER}} ' . $class_active => 'border-color: {{VALUE}};',
            ],
          ]
        );

      $obj->end_controls_tab();

    $obj->end_controls_tabs();
    
    $obj->add_control(
      'pagination_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'default' => [ 'top' => 10, 'right' => 10, 'bottom' => 10, 'left' => 10, 'unit' => 'px', 'isLinked' => true ],
        'selectors' => [
          '{{WRAPPER}} ' . $class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

  $obj->end_controls_section();
}

function add_field_style_control( $obj ) {

  $obj->start_controls_section(
    'field_style',
      [
        'label' => __( 'Field', 'nexgen-core' ),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    
    $obj->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'field_typography',
        'selector' => '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
        'scheme' => Schemes\Typography::TYPOGRAPHY_2,
      ]
    );
    
    $obj->add_control(
      'field_text_color',
      [
        'label' => __( 'Text Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'color: {{VALUE}};',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"])::placeholder, {{WRAPPER}} textarea::placeholder' => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $obj->add_control(
      'field_background_color',
      [
        'label' => __( 'Background Color', 'nexgen-core' ),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'background-color: {{VALUE}}; opacity: 0.8;',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} textarea:hover, {{WRAPPER}} select:hover' => 'background-color: {{VALUE}}; opacity: 0.9;',
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]):focus, {{WRAPPER}} textarea:focus, {{WRAPPER}} select:focus' => 'background-color: {{VALUE}}; opacity: 1;',
        ],
      ]
    );

    $obj->add_control(
      'field_margin',
      [
        'label' => __( 'Margin', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_control(
      'field_padding',
      [
        'label' => __( 'Padding', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', 'rem', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    
    $obj->add_control(
      'field_border_radius',
      [
        'label' => __( 'Border Radius', 'nexgen-core' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $obj->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'field_border',
        'label' => __( 'Border', 'nexgen-core' ),
        'selector' => '{{WRAPPER}} input:not([type="button"]):not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
      ]
    );

  $obj->end_controls_section();
}