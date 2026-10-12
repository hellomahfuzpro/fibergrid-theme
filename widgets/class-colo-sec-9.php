<?php
/**
 * Widget: Colocation - Section 9 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec9 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_9';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 9 (FAQ)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-help-o';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Content Settings', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Have a question ? Look here ...',
            )
        );

        $this->add_control(
            'custom_css_classes',
            array(
                'label'       => esc_html__( 'Extra CSS Classes', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'placeholder' => 'custom-class',
            )
        );

        $this->end_controls_section();

        $this->add_style_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $theme_uri = get_template_directory_uri();
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Have a question ? Look here ...';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 lg:py-24 border-t border-grid-line/60 fg-faq-section" id="faq">
            <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="flex flex-col items-center text-center gap-2 mb-16">
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold tracking-tight"><?php echo wp_kses_post( $title ); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Have another question ? <a href="
        <?php
    }
}
