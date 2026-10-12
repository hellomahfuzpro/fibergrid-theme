<?php
/**
 * Widget: IP Transit - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_2';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 2', 'fibergrid' );
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
                'default' => esc_html__( '{ Capacity and Availability }', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'A Platform Built for Absolute Reliability',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Designed for mission-critical infrastructure today, backed by automated optical failover and operational readiness for high-frequency traffic.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '{ Capacity and Availability }';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'A Platform Built for Absolute Reliability';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Designed for mission-critical infrastructure today, backed by automated optical failover and operational readiness for high-frequency traffic.';
        ?>

        <section class="w-full bg-surface-ice py-16 px-margin-mobile lg:px-margin-desktop">
<div class="max-w-[1360px] mx-auto">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
<div>
<span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-1"><?php echo wp_kses_post( $title ); ?></h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-md"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Grid of 4 Cards inspired by Reference Diagram -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1: 99.982% Availability -->
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-on-surface">99.982%</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">Availability SLA</div>
</div>
<span class="font-display-hero text-surface-container-high select-none font-bold">01</span>
</div>
<!-- Bar Graph Visualization -->
<div class="mt-8 pt-4">
<div class="flex items-end gap-1 h-12">
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[98%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[96%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[99%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[95%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-optical-blue rounded-t h-full"></span>
<span class="flex-1 bg-primary-fixed-dim rounded-t h-[80%]"></span>
<span class="flex-1 bg-primary-fixed-dim rounded-t h-[85%]"></span>
</div>
<div class="flex justify-between text-[11px] font-label-mono text-on-surface-variant mt-2">
<span class="">99%</span>
<span class="">100%</span>
</div>
</div>
</div>
<!-- Card 2: 24/7 Operations -->
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-on-surface">24/7</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">Operations &amp; Monitoring</div>
</div>
<span class="font-display-hero text-surface-container-high select-none font-bold">02</span>
</div>
<!-- Sparkline / Diurnal Flow Visualization -->
<div class="mt-8 pt-4">
<div class="flex items-end gap-1 h-12">
<span class="flex-1 bg-surface-container-high rounded-t h-[30%]"></span>
<span class="flex-1 bg-surface-container-high rounded-t h-[40%]"></span>
<span class="flex-1 bg-primary-fixed-dim rounded-t h-[55%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[75%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[90%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[100%]"></span>
<span class="flex-1 bg-optical-blue rounded-t h-[85%]"></span>
<span class="flex-1 bg-primary-fixed-dim rounded-t h-[60%]"></span>
<span class="flex-1 bg-surface-container-high rounded-t h-[45%]"></span>
<span class="flex-1 bg-surface-container-high rounded-t h-[35%]"></span>
</div>
<div class="flex justify-between text-[11px] font-label-mono text-on-surface-variant mt-2">
<span class="">00:00</span>
<span class="">12:00</span>
<span class="">24:00</span>
</div>
</div>
</div>
<!-- Card 3: Carrier-Neutral -->
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<div>
<div class="font-headline-sm text-headline-sm text-on-surface">Carrier-Neutral</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">Global Interconnects</div>
</div>
<span class="font-display-hero text-surface-container-high select-none font-bold">03</span>
</div>
<!-- Curved Fiber Topology SVG -->
<div class="mt-8 pt-4">
<div class="h-12 w-full flex items-center justify-center">
<svg class="w-full h-10 text-optical-blue" fill="none" viewBox="0 0 160 40">
<path d="M0 35C40 35 40 5 80 5C120 5 120 25 160 25" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
<path d="M0 15C50 15 50 35 90 35C130 35 120 10 160 10" stroke="#06B6D4" stroke-dasharray="3 3" stroke-width="1.5"></path>
<circle cx="80" cy="5" fill="#0066FF" r="3"></circle>
<circle cx="90" cy="35" fill="#06B6D4" r="3"></circle>
<circle cx="120" cy="25" fill="#0066FF" r="2.5"></circle>
</svg>
</div>
<div class="flex justify-between text-[11px] font-label-mono text-on-surface-variant mt-2">
<span class="">Tier 1 Fabric</span>
<span class="">Direct Peering</span>
</div>
</div>
</div>
<!-- Card 4: Scalable Infrastructure -->
<div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-all">
<div class="flex items-start justify-between">
<div>
<div class="font-headline-sm text-headline-sm text-on-surface">Scalable</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">1G to 100G Waves</div>
</div>
<span class="font-display-hero text-surface-container-high select-none font-bold">04</span>
</div>
<!-- Stepped Capacity Graphic -->
<div class="mt-8 pt-4">
<div class="flex items-end justify-between gap-2 h-12 px-2">
<div class="w-1/5 bg-surface-container-high rounded-t h-[20%]"></div>
<div class="w-1/5 bg-surface-variant rounded-t h-[40%]"></div>
<div class="w-1/5 bg-primary-fixed rounded-t h-[60%]"></div>
<div class="w-1/5 bg-primary-fixed-dim rounded-t h-[80%]"></div>
<div class="w-1/5 bg-optical-blue rounded-t h-[100%]"></div>
</div>
<div class="flex justify-between text-[11px] font-label-mono text-on-surface-variant mt-2">
<span class="">1 Gbps</span>
<span class="">100 Gbps</span>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
