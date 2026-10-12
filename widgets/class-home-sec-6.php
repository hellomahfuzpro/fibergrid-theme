<?php
/**
 * Widget: Home - Section 6
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec6 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_6';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 6', 'fibergrid' );
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
                'default' => esc_html__( 'Active Transit Telemetry:', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Connected Across 15 Countries &amp; 4 Continents',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Strategically deployed in major optical peering hubs connecting EMEA, Americas, and APAC with direct subsea cable routes and zero transit bottlenecks.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCI8wbaxColjZBrluot8ZtlPtoeckHY-Ei_rawNH3FHGRaf7TI4ZWs9aMm6qQU2m4m12wiUsjABBIhUAltShD9gmDsGW1iQ53biN57JWy_lYyI5GgUFTNvdqmrq5a0tE5uPrO5cmCBKIJI3eNR__9mMa0SUXQjg6YPRx8r5nMbljfJGmE4AeHVVdI8t2TkI90SV7XYU-X3vt0dT6koVC890Jtws6iSejbiHmG-gA0a0GASaJDhYrurpdZC4VdywC087YKg',
                ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Active Transit Telemetry:';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Connected Across 15 Countries &amp; 4 Continents';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Strategically deployed in major optical peering hubs connecting EMEA, Americas, and APAC with direct subsea cable routes and zero transit bottlenecks.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCI8wbaxColjZBrluot8ZtlPtoeckHY-Ei_rawNH3FHGRaf7TI4ZWs9aMm6qQU2m4m12wiUsjABBIhUAltShD9gmDsGW1iQ53biN57JWy_lYyI5GgUFTNvdqmrq5a0tE5uPrO5cmCBKIJI3eNR__9mMa0SUXQjg6YPRx8r5nMbljfJGmE4AeHVVdI8t2TkI90SV7XYU-X3vt0dT6koVC890Jtws6iSejbiHmG-gA0a0GASaJDhYrurpdZC4VdywC087YKg';
        ?>

        <section class="w-full py-space-3xl bg-surface-ice border-y border-surface-container-high/60 relative overflow-hidden" id="datacenter-reach"><div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto relative z-10"><div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-2xl"><div><div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high border border-optical-blue/20 text-xs font-label-mono text-primary font-bold uppercase tracking-wider mb-2"><span class="w-2 h-2 rounded-full bg-status-healthy animate-pulse"></span><span class="">Tier-1 Global Backbone Presence</span></div><h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold"><?php echo wp_kses_post( $title ); ?></h2></div><p class="font-body-md text-body-md text-on-surface-variant max-w-md"><?php echo esc_html( $desc ); ?></p></div><div class="p-space-lg lg:p-space-xl rounded-2xl bg-surface-container-lowest border border-surface-container-high shadow-xl"><div class="relative w-full rounded-2xl overflow-hidden bg-white flex items-center justify-center p-2 sm:p-4"><img alt="Global Fiber Peering and Transit Network Map" class="w-full h-auto max-h-[500px] object-contain rounded-xl" src="<?php echo esc_url( $image_1 ); ?>"></div><div class="grid grid-cols-2 lg:grid-cols-4 gap-space-md pt-space-lg mt-space-md text-center border-t border-surface-container-high"><div class="p-space-sm rounded-xl bg-surface-container-low border border-surface-container-high"><div class="font-tech-metric-lg text-tech-metric-lg font-bold text-deep-navy">15+</div><div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Countries Connected</div></div><div class="p-space-sm rounded-xl bg-surface-container-low border border-surface-container-high"><div class="font-tech-metric-lg text-tech-metric-lg font-bold text-optical-blue">4</div><div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Continents Spanned</div></div><div class="p-space-sm rounded-xl bg-surface-container-low border border-surface-container-high"><div class="font-tech-metric-lg text-tech-metric-lg font-bold text-primary">50+</div><div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Direct IX Peering Hubs</div></div><div class="p-space-sm rounded-xl bg-surface-container-low border border-surface-container-high"><div class="font-tech-metric-lg text-tech-metric-lg font-bold text-status-healthy">&lt; 15ms</div><div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Regional Metro Latency</div></div></div><div class="mt-space-lg pt-space-md border-t border-surface-container-high flex flex-col md:flex-row items-center justify-between gap-4 text-xs font-mono"><div class="flex items-center gap-2 text-on-surface-variant"><span class="font-bold text-deep-navy uppercase"><?php echo esc_html( $eyebrow ); ?></span><span class="">BGP Multi-homed Routing</span></div><div class="flex flex-wrap items-center gap-2 sm:gap-4"><div class="px-2.5 py-1 rounded bg-surface-container-high text-deep-navy flex items-center gap-1.5"><span class="">JNB ↔ LHR:</span><span class="font-bold text-optical-blue">138ms</span><span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span></div><div class="px-2.5 py-1 rounded bg-surface-container-high text-deep-navy flex items-center gap-1.5"><span class="">CPT ↔ FRA:</span><span class="font-bold text-optical-blue">142ms</span><span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span></div><div class="px-2.5 py-1 rounded bg-surface-container-high text-deep-navy flex items-center gap-1.5"><span class="">LHR ↔ NYC:</span><span class="font-bold text-optical-blue">64ms</span><span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span></div><div class="px-2.5 py-1 rounded bg-status-healthy/10 text-status-healthy font-bold">100% Stability</div></div></div></div></div></section>
        
        <?php
    }
}
