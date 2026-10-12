<?php
/**
 * Widget: Blog Single - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 4', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-section';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Content Settings', 'fibergrid' ),
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Knowledge Hub', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Related Engineering Insights',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Knowledge Hub';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Related Engineering Insights';
        ?>

        <section class="w-full bg-surface-ice py-16 border-t border-grid-line">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
<div>
<span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider block mb-1"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-lg text-headline-lg text-deep-navy font-bold"><?php echo wp_kses_post( $title ); ?></h2>
</div>
<a class="inline-flex items-center gap-1.5 font-label-ui text-label-ui text-primary font-semibold hover:underline" href="
        <?php
    }
}
