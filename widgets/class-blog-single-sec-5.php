<?php
/**
 * Widget: Blog Single - Section 5
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_5';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 5', 'fibergrid' );
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
                'default' => esc_html__( 'FiberGrid Optical Connectivity', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Ready to deploy low-latency infrastructure on our Tier-1 optical backbone?',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Connect directly with our network engineering team to test route pings, request custom 100G/400G cross-connect specs, or inspect regional peering communities.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'FiberGrid Optical Connectivity';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Ready to deploy low-latency infrastructure on our Tier-1 optical backbone?';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Connect directly with our network engineering team to test route pings, request custom 100G/400G cross-connect specs, or inspect regional peering communities.';
        ?>

        <section class="w-full bg-midnight-bg text-white py-16 relative overflow-hidden">
<!-- Ambient subtle background grid -->
<div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#0066FF_1px,transparent_1px)] [background-size:24px_24px]"></div>
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
<div class="max-w-2xl flex flex-col gap-3">
<div class="inline-flex items-center gap-2 text-cyan-pulse font-label-mono text-label-mono uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></div>
<h2 class="font-headline-xl text-headline-xl text-white font-extrabold tracking-tight">
          <?php echo wp_kses_post( $title ); ?>
        </h2>
<p class="font-body-md text-body-md text-slate-300"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 shrink-0">
<a class="px-6 py-3.5 rounded-lg bg-optical-blue hover:bg-primary font-label-ui text-label-ui font-semibold text-white text-center shadow-lg transition-all transform hover:-translate-y-0.5" href="
        <?php
    }
}
