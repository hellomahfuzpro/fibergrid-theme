<?php
/**
 * Base Widget Class
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

abstract class FiberGrid_Base_Widget extends \Elementor\Widget_Base {

    public function get_categories() {
        return array( 'fibergrid' );
    }

    /**
     * Render an image from media control or fallback to a default URL
     */
    protected function render_media( $image_setting, $default_url = '', $alt = '', $class = '' ) {
        $url = '';
        if ( ! empty( $image_setting['id'] ) ) {
            $url = wp_get_attachment_image_url( (int) $image_setting['id'], 'full' );
        } elseif ( ! empty( $image_setting['url'] ) ) {
            $url = $image_setting['url'];
        }
        if ( empty( $url ) ) {
            $url = $default_url;
        }
        if ( ! empty( $url ) ) {
            printf(
                '<img src="%1$s" alt="%2$s" loading="lazy" class="%3$s">',
                esc_url( $url ),
                esc_attr( $alt ),
                esc_attr( $class )
            );
        }
    }

    /**
     * Render a button or link with target and nofollow support
     */
    protected function render_button( $text, $link_setting = array(), $class = '', $icon_html = '' ) {
        if ( empty( $text ) ) {
            return;
        }
        $url      = ! empty( $link_setting['url'] ) ? $link_setting['url'] : '#';
        $target   = ! empty( $link_setting['is_external'] ) ? ' target="_blank"' : '';
        $nofollow = ! empty( $link_setting['nofollow'] ) ? ' rel="nofollow"' : '';
        printf(
            '<a href="%1$s"%2$s%3$s class="%4$s">%5$s%6$s</a>',
            esc_url( $url ),
            $target,
            $nofollow,
            esc_attr( $class ),
            esc_html( $text ),
            $icon_html
        );
    }

    protected function add_style_controls() {
        $this->start_controls_section(
            'section_style_overrides',
            array(
                'label' => esc_html__( 'Section Design Options', 'fibergrid' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            array(
                'name'     => 'section_bg',
                'label'    => esc_html__( 'Background', 'fibergrid' ),
                'types'    => array( 'classic', 'gradient' ),
                'selector' => '{{WRAPPER}} section',
            )
        );

        $this->add_responsive_control(
            'section_padding',
            array(
                'label'      => esc_html__( 'Padding', 'fibergrid' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em', 'rem' ),
                'selectors'  => array(
                    '{{WRAPPER}} section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'section_margin',
            array(
                'label'      => esc_html__( 'Margin', 'fibergrid' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em', 'rem' ),
                'selectors'  => array(
                    '{{WRAPPER}} section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();
    }
}
