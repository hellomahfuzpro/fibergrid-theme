<?php
/**
 * FiberGrid — Base Elementor Widget Class
 *
 * Provides shared Elementor categories, standardized Style controls for every section,
 * and semantic rendering helpers.
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

abstract class FG_Widget_Base extends Widget_Base {

    /**
     * Assign to custom FiberGrid category
     */
    public function get_categories() {
        return array( 'fibergrid' );
    }

    /**
     * Master Controls Registration
     */
    protected function register_controls() {
        // 1. Content Tab (Implemented by child class)
        $this->register_content_controls();

        // 2. Universal Style Tab (Standardized for every section)
        $this->register_universal_style_controls();
    }

    /**
     * Child classes implement their content fields here
     */
    abstract protected function register_content_controls();

    /**
     * Standardized Section Styling Controls across all widgets
     */
    protected function register_universal_style_controls() {

        // --- 1. Background & Surface Container ---
        $this->start_controls_section(
            'section_style_container',
            array(
                'label' => __( 'Section Container & Background', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'     => 'section_custom_bg',
                'label'    => __( 'Section Background', 'fibergrid' ),
                'types'    => array( 'classic', 'gradient' ),
                'selector' => '{{WRAPPER}} .fg-section-wrapper',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'     => 'section_border',
                'label'    => __( 'Container Border', 'fibergrid' ),
                'selector' => '{{WRAPPER}} .fg-section-wrapper',
            )
        );

        $this->add_responsive_control(
            'section_border_radius',
            array(
                'label'      => __( 'Border Radius', 'fibergrid' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .fg-section-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name'     => 'section_box_shadow',
                'label'    => __( 'Box Shadow', 'fibergrid' ),
                'selector' => '{{WRAPPER}} .fg-section-wrapper',
            )
        );

        $this->end_controls_section();

        // --- 2. Typography Overrides ---
        $this->start_controls_section(
            'section_style_typography',
            array(
                'label' => __( 'Section Typography & Colors', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        // Eyebrow
        $this->add_control(
            'heading_style_eyebrow',
            array(
                'label'     => __( 'Eyebrow', 'fibergrid' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'eyebrow_color',
            array(
                'label'     => __( 'Eyebrow Color', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-eyebrow' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'eyebrow_typography',
                'label'    => __( 'Eyebrow Typography', 'fibergrid' ),
                'selector' => '{{WRAPPER}} .fg-eyebrow',
            )
        );

        // Title
        $this->add_control(
            'heading_style_title',
            array(
                'label'     => __( 'Headline', 'fibergrid' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'title_color',
            array(
                'label'     => __( 'Headline Color', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-section-title, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'label'    => __( 'Headline Typography', 'fibergrid' ),
                'selector' => '{{WRAPPER}} .fg-section-title, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3',
            )
        );

        // Lede / Description
        $this->add_control(
            'heading_style_lede',
            array(
                'label'     => __( 'Description / Lede', 'fibergrid' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'lede_color',
            array(
                'label'     => __( 'Description Color', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-section-lede, {{WRAPPER}} p' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'lede_typography',
                'label'    => __( 'Description Typography', 'fibergrid' ),
                'selector' => '{{WRAPPER}} .fg-section-lede, {{WRAPPER}} p',
            )
        );

        $this->end_controls_section();

        // --- 3. Buttons & Interactive Links ---
        $this->start_controls_section(
            'section_style_buttons',
            array(
                'label' => __( 'Buttons & Action Links', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs( 'tabs_btn_style' );

        $this->start_controls_tab(
            'tab_btn_normal',
            array(
                'label' => __( 'Normal', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn_bg_color',
            array(
                'label'     => __( 'Primary Button Background', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-btn-primary' => 'background-color: {{VALUE}};',
                ),
            )
        );

        $this->add_control(
            'btn_text_color',
            array(
                'label'     => __( 'Primary Button Text Color', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-btn-primary' => 'color: {{VALUE}} !important;',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_btn_hover',
            array(
                'label' => __( 'Hover', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn_bg_hover_color',
            array(
                'label'     => __( 'Primary Button Hover Background', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-btn-primary:hover' => 'background-color: {{VALUE}};',
                ),
            )
        );

        $this->add_control(
            'btn_text_hover_color',
            array(
                'label'     => __( 'Primary Button Hover Text', 'fibergrid' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .fg-btn-primary:hover' => 'color: {{VALUE}} !important;',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // --- 4. Spacing & Margins ---
        $this->start_controls_section(
            'section_style_spacing',
            array(
                'label' => __( 'Section Spacing & Dimensions', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_responsive_control(
            'section_padding',
            array(
                'label'      => __( 'Section Inner Padding', 'fibergrid' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', 'em', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .fg-section-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'section_margin',
            array(
                'label'      => __( 'Section Outer Margin', 'fibergrid' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', 'em', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .fg-section-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();
    }

    /**
     * Helper to open the full-bleed section container
     */
    protected function render_section_open( $classes = '', $id = '' ) {
        $id_attr = ! empty( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        echo '<div class="fg-wrap">';
        echo '<section class="fg-section-wrapper ' . esc_attr( $classes ) . '"' . $id_attr . '>';
        echo '<div class="fg-container">';
    }

    /**
     * Helper to close section container
     */
    protected function render_section_close() {
        echo '</div>'; // .fg-container
        echo '</section>';
        echo '</div>'; // .fg-wrap
    }
}
