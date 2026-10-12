<?php
/**
 * Widget: IP Transit - Section 7
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec7 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_7';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 7', 'fibergrid' );
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
                'default' => esc_html__( 'Autonomous BGP Routing &amp; Peering', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Carrier-Grade BGP Routing Engineered for Maximum Throughput',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'FiberGrid provides full autonomous multi-homed BGP routing across top-tier global Tier-1 upstream providers. Experience sub-millisecond route convergence, proactive DDoS filtering at line rate, and deterministic packet forwarding designed for mission-critical digital workloads.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCOR_fqhSDoylMA6NGO2I-o53kNWGzCIAvIrRCXqtsI7DvPtGAdyVlkdlQEy9X_FUJ_Ok5yUmlzU9Yu6B4nAPFISffvFPCdaCbuu2Kq8-Rd9azr5TwzGoSt1IM7xHxl_14EXVlFsgL3mwGo45nV6AJqiXcnsEmerbYkUiBmkz_W1YEP-buBoTORA1ig_nomOZZqV50zYgaAdAvGa3byPKvUej0GhYTz9xnvkY9hKkRqNwTdoA_4PLWcWA',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Autonomous BGP Routing &amp; Peering';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Carrier-Grade BGP Routing Engineered for Maximum Throughput';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'FiberGrid provides full autonomous multi-homed BGP routing across top-tier global Tier-1 upstream providers. Experience sub-millisecond route convergence, proactive DDoS filtering at line rate, and deterministic packet forwarding designed for mission-critical digital workloads.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCOR_fqhSDoylMA6NGO2I-o53kNWGzCIAvIrRCXqtsI7DvPtGAdyVlkdlQEy9X_FUJ_Ok5yUmlzU9Yu6B4nAPFISffvFPCdaCbuu2Kq8-Rd9azr5TwzGoSt1IM7xHxl_14EXVlFsgL3mwGo45nV6AJqiXcnsEmerbYkUiBmkz_W1YEP-buBoTORA1ig_nomOZZqV50zYgaAdAvGa3byPKvUej0GhYTz9xnvkY9hKkRqNwTdoA_4PLWcWA';
        ?>

        <section id="looking-glass" class="w-full bg-surface-container-low py-20 lg:py-24 px-margin-mobile lg:px-margin-desktop border-t border-[#e2e8f0]"><div class="max-w-[1360px] mx-auto"><div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-stretch"><div class="flex flex-col justify-between h-full bg-surface-container-lowest p-8 lg:p-12 rounded-2xl border border-[#e2e8f0] shadow-sm"><div><div class="flex items-center gap-2 mb-4"><span class="w-2.5 h-2.5 rounded-full bg-status-healthy animate-pulse"></span><span class="font-label-mono text-xs text-optical-blue font-bold uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></span></div><h2 class="font-headline-xl text-headline-xl text-on-surface tracking-tight font-bold mb-4"><?php echo wp_kses_post( $title ); ?></h2><p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-8"><?php echo esc_html( $desc ); ?></p><div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8"><div class="flex items-start gap-3 p-3.5 rounded-xl bg-surface-ice border border-[#e2e8f0]"><span class="material-symbols-outlined text-optical-blue text-xl mt-0.5">route</span><div><h4 class="font-headline-sm text-sm font-bold text-on-surface">Full &amp; Partial BGP Sessions</h4><p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Custom routing feeds via dual-homed AS328224 fabric.</p></div></div><div class="flex items-start gap-3 p-3.5 rounded-xl bg-surface-ice border border-[#e2e8f0]"><span class="material-symbols-outlined text-optical-blue text-xl mt-0.5">bolt</span><div><h4 class="font-headline-sm text-sm font-bold text-on-surface">Sub-15ms Convergence</h4><p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Automated optical failover across redundant ring topology.</p></div></div><div class="flex items-start gap-3 p-3.5 rounded-xl bg-surface-ice border border-[#e2e8f0]"><span class="material-symbols-outlined text-optical-blue text-xl mt-0.5">security</span><div><h4 class="font-headline-sm text-sm font-bold text-on-surface">Autonomous RTBH Scrubbing</h4><p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Line-rate automated DDoS mitigation and null-routing.</p></div></div><div class="flex items-start gap-3 p-3.5 rounded-xl bg-surface-ice border border-[#e2e8f0]"><span class="material-symbols-outlined text-optical-blue text-xl mt-0.5">tune</span><div><h4 class="font-headline-sm text-sm font-bold text-on-surface">Custom Communities</h4><p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Granular prepending and route prioritization controls.</p></div></div></div></div><div class="flex flex-wrap items-center gap-4 pt-4 border-t border-[#e2e8f0]"><a href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary transition-all gap-2"><span class="material-symbols-outlined text-sm">hub</span>Request Peering Session</a><a href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" class="inline-flex items-center justify-center px-6 py-3.5 rounded-lg bg-surface-ice text-deep-navy font-label-ui text-label-ui font-semibold border border-[#e2e8f0] hover:bg-surface-container transition-all gap-2"><span class="material-symbols-outlined text-sm">support_agent</span>Consult Network Architect</a></div></div><div class="relative rounded-2xl overflow-hidden shadow-md border border-[#e2e8f0] min-h-[420px] lg:min-h-full flex"><img src="<?php echo esc_url( $image_1 ); ?>" alt="Modern telecommunications network operations center and high-speed BGP routing infrastructure" class="w-full h-full object-cover"></div></div></div></section>
        
        <?php
    }
}
