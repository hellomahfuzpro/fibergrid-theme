<?php
/**
 * Widget: IP Transit - Section 6
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec6 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_6';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 6', 'fibergrid' );
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
                'default' => esc_html__( 'Real-Time Routing Benchmarks', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Sub-Millisecond Metro Core Latencies',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Direct fiber interconnects across the southern African backbone, terrestrial undersea cables (Equiano, 2Africa, WACS), and European peering exchanges.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Real-Time Routing Benchmarks';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Sub-Millisecond Metro Core Latencies';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Direct fiber interconnects across the southern African backbone, terrestrial undersea cables (Equiano, 2Africa, WACS), and European peering exchanges.';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 px-margin-mobile lg:px-margin-desktop">
<div class="max-w-[1360px] mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left: Telemetry Data Table -->
<div class="lg:col-span-7 flex flex-col gap-6">
<div>
<span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-1"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Latency Table -->
<div class="overflow-x-auto rounded-xl bg-surface-ice p-2">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="font-label-mono text-xs text-on-surface-variant uppercase">
<th class="py-3 px-4">Metro Hub / Exchange</th>
<th class="py-3 px-4">Facility</th>
<th class="py-3 px-4">Median RTD</th>
<th class="py-3 px-4">Packet Delivery</th>
</tr>
</thead>
<tbody class="text-on-surface">
<tr class="hover:bg-surface-container-lowest/60 transition-colors">
<td class="py-3 px-4 font-semibold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                    Johannesburg (JHB)
                  </td>
<td class="py-3 px-4 text-on-surface-variant font-label-mono text-xs">Teraco Isando JB1</td>
<td class="py-3 px-4 font-tech-metric-md text-optical-blue font-bold">&lt; 1.2 ms</td>
<td class="py-3 px-4 text-status-healthy font-label-mono font-bold">100.00%</td>
</tr>
<tr class="hover:bg-surface-container-lowest/60 transition-colors">
<td class="py-3 px-4 font-semibold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                    Cape Town (CPT)
                  </td>
<td class="py-3 px-4 text-on-surface-variant font-label-mono text-xs">Teraco Rondebosch CT1</td>
<td class="py-3 px-4 font-tech-metric-md text-optical-blue font-bold">18.4 ms</td>
<td class="py-3 px-4 text-status-healthy font-label-mono font-bold">100.00%</td>
</tr>
<tr class="hover:bg-surface-container-lowest/60 transition-colors">
<td class="py-3 px-4 font-semibold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                    Durban (DUR)
                  </td>
<td class="py-3 px-4 text-on-surface-variant font-label-mono text-xs">Teraco Riverhorse DB1</td>
<td class="py-3 px-4 font-tech-metric-md text-optical-blue font-bold">8.9 ms</td>
<td class="py-3 px-4 text-status-healthy font-label-mono font-bold">100.00%</td>
</tr>
<tr class="hover:bg-surface-container-lowest/60 transition-colors">
<td class="py-3 px-4 font-semibold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                    London (LDN)
                  </td>
<td class="py-3 px-4 text-on-surface-variant font-label-mono text-xs">Telehouse North / LINX</td>
<td class="py-3 px-4 font-tech-metric-md text-on-surface font-bold">132.8 ms</td>
<td class="py-3 px-4 text-status-healthy font-label-mono font-bold">99.999%</td>
</tr>
<tr class="hover:bg-surface-container-lowest/60 transition-colors">
<td class="py-3 px-4 font-semibold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                    Frankfurt (FRA)
                  </td>
<td class="py-3 px-4 text-on-surface-variant font-label-mono text-xs">Equinix FR5 / DE-CIX</td>
<td class="py-3 px-4 font-tech-metric-md text-on-surface font-bold">139.1 ms</td>
<td class="py-3 px-4 text-status-healthy font-label-mono font-bold">100.00%</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Right: BGP Communities & Route Control Specs -->
<div class="lg:col-span-5 bg-surface-ice rounded-2xl p-8 flex flex-col gap-6">
<div>
<span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase">Traffic Engineering</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-1">Autonomous BGP Communities</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
              Exercise granular programmatic control over your prefix advertisements across our global Tier-1 upstream sessions.
            </p>
</div>
<div class="space-y-4">
<div class="bg-surface-container-lowest p-4 rounded-xl">
<div class="flex items-center justify-between mb-1">
<span class="font-label-mono font-bold text-xs text-primary">ASN:666</span>
<span class="font-label-mono text-[11px] text-route-orange uppercase font-semibold">Remotely Triggered Blackhole (RTBH)</span>
</div>
<p class="font-body-sm text-xs text-on-surface-variant">Instant DDoS scrubbing; null-routes designated /32 hosts across all border routers instantly.</p>
</div>
<div class="bg-surface-container-lowest p-4 rounded-xl">
<div class="flex items-center justify-between mb-1">
<span class="font-label-mono font-bold text-xs text-primary">ASN:100..400</span>
<span class="font-label-mono text-[11px] text-on-surface font-semibold">Local Preference Modifiers</span>
</div>
<p class="font-body-sm text-xs text-on-surface-variant">Explicitly bias outbound paths via Cogent, NTT, HE, or regional exchanges.</p>
</div>
<div class="bg-surface-container-lowest p-4 rounded-xl">
<div class="flex items-center justify-between mb-1">
<span class="font-label-mono font-bold text-xs text-primary">ASN:1..3</span>
<span class="font-label-mono text-[11px] text-on-surface font-semibold">Automated AS-Path Prepending</span>
</div>
<p class="font-body-sm text-xs text-on-surface-variant">Prepend ASN up to 3 times to specific peers to engineer symmetric ingress paths.</p>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
