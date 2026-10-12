<?php
/**
 * Widget: Blog - Section 4 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 4 (FAQ)', 'fibergrid' );
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

        <section class="w-full bg-white py-16 lg:py-24 my-10 border-t border-b border-grid-line/60 fg-faq-section" id="faq">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto">
                <!-- Centered Header -->
                <div class="text-center mb-16">
                    <h2 class="font-headline-xl text-3xl sm:text-4xl text-deep-navy font-bold tracking-tight mb-2">
                        <?php echo wp_kses_post( $title ); ?>
                    </h2>
                    <p class="font-body-md text-sm sm:text-base text-secondary font-medium">
                        Have another question ? <a href="
        <?php
    }
}
