<?php
/**
 * Widget: Home - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_3';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 3', 'fibergrid' );
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
                'default' => esc_html__( '{ Capacity And Availability }', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'A Platform You Can Rely On.',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Engineered for mission-critical IT infrastructure today, with the operational flexibility to expand into next-generation high-compute clusters.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '{ Capacity And Availability }';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'A Platform You Can Rely On.';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Engineered for mission-critical IT infrastructure today, with the operational flexibility to expand into next-generation high-compute clusters.';
        ?>

        <section class="w-full py-space-3xl bg-background">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1320px] mx-auto">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-2xl">
<div>
<span class="font-label-mono text-label-mono uppercase text-primary font-bold"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold mt-1"><?php echo wp_kses_post( $title ); ?></h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- 4 Telemetry Graphic Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
<!-- Metric Card 01: Availability -->
<div class="relative p-space-lg rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between overflow-hidden hover:shadow-xl transition-shadow">
<div class="flex justify-between items-start">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy font-bold">99.999%</div>
<div class="font-label-ui text-label-ui text-on-surface-variant mt-1">Verified Core SLA</div>
</div>
<span class="font-tech-metric-lg text-display-hero text-surface-container-highest font-bold select-none">01</span>
</div>
<div class="mt-space-xl">
<div class="flex items-end gap-1 h-12">
<span class="w-1.5 h-6 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-8 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-7 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-9 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-10 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-8 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-12 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-10 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-11 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-9 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-12 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-10 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-12 rounded-full bg-optical-blue"></span>
<span class="w-1.5 h-12 rounded-full bg-status-healthy"></span>
<span class="w-1.5 h-12 rounded-full bg-status-healthy"></span>
</div>
<div class="flex justify-between font-label-mono text-label-mono text-outline-variant mt-2">
<span class="">99.90%</span>
<span class="">100.0% Real-Time</span>
</div>
</div>
</div>
<!-- Metric Card 02: 24/7 Operations -->
<div class="relative p-space-lg rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between overflow-hidden hover:shadow-xl transition-shadow">
<div class="flex justify-between items-start">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy font-bold">24/7/365</div>
<div class="font-label-ui text-label-ui text-on-surface-variant mt-1">NOC Operations &amp; Monitoring</div>
</div>
<span class="font-tech-metric-lg text-display-hero text-surface-container-highest font-bold select-none">02</span>
</div>
<div class="mt-space-xl">
<div class="flex items-end justify-between h-12 pt-2">
<span class="w-2 h-3 rounded bg-surface-variant"></span>
<span class="w-2 h-4 rounded bg-surface-variant"></span>
<span class="w-2 h-6 rounded bg-optical-blue/40"></span>
<span class="w-2 h-9 rounded bg-optical-blue/70"></span>
<span class="w-2 h-11 rounded bg-optical-blue"></span>
<span class="w-2 h-10 rounded bg-optical-blue"></span>
<span class="w-2 h-8 rounded bg-optical-blue/80"></span>
<span class="w-2 h-6 rounded bg-optical-blue/50"></span>
<span class="w-2 h-4 rounded bg-surface-variant"></span>
</div>
<div class="flex justify-between font-label-mono text-label-mono text-outline-variant mt-2">
<span class="">00:00</span>
<span class="">12:00</span>
<span class="">24:00</span>
</div>
</div>
</div>
<!-- Metric Card 03: Carrier Neutral -->
<div class="relative p-space-lg rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between overflow-hidden hover:shadow-xl transition-shadow">
<div class="flex justify-between items-start">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy font-bold">Neutral</div>
<div class="font-label-ui text-label-ui text-on-surface-variant mt-1">Direct Carrier Connectivity</div>
</div>
<span class="font-tech-metric-lg text-display-hero text-surface-container-highest font-bold select-none">03</span>
</div>
<div class="mt-space-xl">
<svg class="w-full h-12 text-primary" fill="none" viewBox="0 0 200 48">
<path d="M0 36 C50 10, 80 44, 130 18 C160 2, 180 32, 200 12" stroke="currentColor" stroke-linecap="round" stroke-width="2.5"></path>
<path d="M0 24 C40 38, 90 8, 140 32 C170 42, 185 18, 200 28" stroke="#06B6D4" stroke-dasharray="3 3" stroke-width="1.8"></path>
<circle cx="130" cy="18" fill="#10B981" r="3.5"></circle>
<circle cx="80" cy="28" fill="#FF5E14" r="2.5"></circle>
</svg>
<div class="flex justify-between font-label-mono text-label-mono text-outline-variant mt-2">
<span class="">BGP Anycast</span>
<span class="">Zero Vendor Lock</span>
</div>
</div>
</div>
<!-- Metric Card 04: Scalable Bandwidth -->
<div class="relative p-space-lg rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between overflow-hidden hover:shadow-xl transition-shadow">
<div class="flex justify-between items-start">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy font-bold">100G+</div>
<div class="font-label-ui text-label-ui text-on-surface-variant mt-1">Core Port Capacity</div>
</div>
<span class="font-tech-metric-lg text-display-hero text-surface-container-highest font-bold select-none">04</span>
</div>
<div class="mt-space-xl">
<div class="flex items-end gap-2 h-12">
<span class="flex-1 h-3 rounded-t bg-surface-variant"></span>
<span class="flex-1 h-5 rounded-t bg-sky-bright"></span>
<span class="flex-1 h-7 rounded-t bg-cyan-pulse"></span>
<span class="flex-1 h-9 rounded-t bg-optical-blue"></span>
<span class="flex-1 h-12 rounded-t bg-primary"></span>
</div>
<div class="flex justify-between font-label-mono text-label-mono text-outline-variant mt-2">
<span class="">1G</span>
<span class="">10G</span>
<span class="">40G</span>
<span class="">100G Port</span>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
