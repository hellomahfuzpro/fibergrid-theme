<?php
/**
 * Widget: Colocation - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 4', 'fibergrid' );
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
                'default' => esc_html__( 'INFRASTRUCTURE TIERS', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Standardized Hardware Footprints with Guaranteed Power Density',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Deploy turnkey rack footprints with zero hidden cross-connect surcharges. Fully metered dual feeds, certified cabling, and enterprise remote support built-in.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Deploy Quarter Rack', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#facility-booking',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => esc_html__( 'Secondary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Deploy Half Rack', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#facility-booking',
                    'is_external' => false,
                    'nofollow'    => false,
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'INFRASTRUCTURE TIERS';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Standardized Hardware Footprints with Guaranteed Power Density';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Deploy turnkey rack footprints with zero hidden cross-connect surcharges. Fully metered dual feeds, certified cabling, and enterprise remote support built-in.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Deploy Quarter Rack';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '#facility-booking';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Deploy Half Rack';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#facility-booking';
        ?>

        <section class="w-full bg-surface-ice py-20 lg:py-28" id="pricing-matrix">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<!-- Section Header -->
<div class="flex flex-col items-center text-center gap-3 max-w-3xl mx-auto mb-16">
<span class="font-label-mono text-label-mono font-bold tracking-widest text-primary uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy tracking-tight">
          <?php echo wp_kses_post( $title ); ?>
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Rack Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
<!-- CARD 1: Quarter Rack -->
<div class="flex flex-col rounded-2xl bg-surface-container-lowest p-8 shadow-sm hover:shadow-xl transition-all duration-300 relative">
<div class="flex items-center justify-between pb-6">
<div>
<span class="font-label-mono text-label-mono text-secondary uppercase font-semibold">Edge Micro-Tier</span>
<h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Quarter Rack</h3>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-ice flex items-center justify-center text-optical-blue">
<span class="material-symbols-outlined text-[28px]">dns</span>
</div>
</div>
<div class="pb-6">
<div class="flex items-baseline gap-1">
<span class="font-tech-metric-lg text-tech-metric-lg font-bold text-deep-navy">$199</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ month</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1">Ideal for distributed edge nodes, DNS caches, and branch failover arrays.</p>
</div>
<!-- Specs List -->
<div class="flex flex-col gap-3 py-6 border-t border-grid-line flex-grow font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Rack Space</span>
<span class="font-semibold text-deep-navy font-label-mono">10U Secured</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Power Allocation</span>
<span class="font-semibold text-deep-navy font-label-mono">2 kW Continuous</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Feed Redundancy</span>
<span class="font-semibold text-deep-navy font-label-mono">2x 16A (A+B)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Network Uplink</span>
<span class="font-semibold text-deep-navy font-label-mono">1 Gbps Dedicated</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">IP Allocation</span>
<span class="font-semibold text-deep-navy font-label-mono">8 Usable IPv4 (/29)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Facility Access</span>
<span class="font-semibold text-deep-navy font-label-mono">24/7 Escorted</span>
</div>
</div>
<a class="w-full mt-6 py-3 px-4 rounded-lg bg-surface-container text-primary font-label-ui text-label-ui font-semibold text-center hover:bg-primary hover:text-on-primary transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
            <?php echo esc_html( $btn1_text ); ?>
          </a>
</div>
<!-- CARD 2: Half Rack -->
<div class="flex flex-col rounded-2xl bg-surface-container-lowest p-8 shadow-sm hover:shadow-xl transition-all duration-300 relative">
<div class="flex items-center justify-between pb-6">
<div>
<span class="font-label-mono text-label-mono text-secondary uppercase font-semibold">Mid-Scale Infrastructure</span>
<h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Half Rack</h3>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-ice flex items-center justify-center text-optical-blue">
<span class="material-symbols-outlined text-[28px]">view_agenda</span>
</div>
</div>
<div class="pb-6">
<div class="flex items-baseline gap-1">
<span class="font-tech-metric-lg text-tech-metric-lg font-bold text-deep-navy">$299</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ month</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1">Designed for regional corporate databases, hypervisors, and SAN storage nodes.</p>
</div>
<!-- Specs List -->
<div class="flex flex-col gap-3 py-6 border-t border-grid-line flex-grow font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Rack Space</span>
<span class="font-semibold text-deep-navy font-label-mono">21U Partitioned</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Power Allocation</span>
<span class="font-semibold text-deep-navy font-label-mono">4 kW Continuous</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Feed Redundancy</span>
<span class="font-semibold text-deep-navy font-label-mono">2x 32A (A+B)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Network Uplink</span>
<span class="font-semibold text-deep-navy font-label-mono">10 Gbps Burstable</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">IP Allocation</span>
<span class="font-semibold text-deep-navy font-label-mono">16 Usable IPv4 (/28)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Smart Remote PDU</span>
<span class="font-semibold text-status-healthy font-label-mono">Included (Per-Port)</span>
</div>
</div>
<a class="w-full mt-6 py-3 px-4 rounded-lg bg-surface-container text-primary font-label-ui text-label-ui font-semibold text-center hover:bg-primary hover:text-on-primary transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
            <?php echo esc_html( $btn2_text ); ?>
          </a>
</div>
<!-- CARD 3: Full Rack (Featured FiberGrid Spec) -->
<div class="flex flex-col rounded-2xl bg-surface-container-lowest p-8 shadow-2xl relative transform lg:-translate-y-2">
<!-- Featured Badge -->
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-optical-blue text-on-primary px-4 py-1 rounded-full font-label-mono text-[11px] font-bold uppercase tracking-wider shadow-md">
            RECOMMENDED ENTERPRISE TIER
          </div>
<div class="flex items-center justify-between pb-6 pt-2">
<div>
<span class="font-label-mono text-label-mono text-primary uppercase font-bold">FiberGrid Flagship Spec</span>
<h3 class="font-headline-md text-headline-md text-deep-navy font-bold">Full Rack (42U)</h3>
</div>
<div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center shadow-md">
<span class="material-symbols-outlined text-[28px]">storage</span>
</div>
</div>
<div class="pb-6">
<div class="flex items-baseline gap-1">
<span class="font-tech-metric-lg text-tech-metric-lg font-bold text-optical-blue">$399</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ month</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1">Full private locking cabinet with complete carrier routing and hands-free provisioning.</p>
</div>
<!-- Specs List -->
<div class="flex flex-col gap-3 py-6 border-t border-grid-line flex-grow font-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Rack Space</span>
<span class="font-bold text-deep-navy font-label-mono">42U Full Enclosure</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Free 10G Port</span>
<span class="font-bold text-status-healthy font-label-mono">Included Free</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Dual Power Feed</span>
<span class="font-semibold text-deep-navy font-label-mono">True A+B Feeds</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Backup Systems</span>
<span class="font-semibold text-deep-navy font-label-mono">UPS + Cummins Gen</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">IP Allocation</span>
<span class="font-bold text-deep-navy font-label-mono">32 Usable IPv4 (/27)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Bandwidth</span>
<span class="font-semibold text-deep-navy font-label-mono">1G @ 95% Burstable</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Racking &amp; Cabling</span>
<span class="font-bold text-status-healthy font-label-mono">Complimentary</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">NOC Remote Hands</span>
<span class="font-bold text-optical-blue font-label-mono">24/7 Dedicated Support</span>
</div>
</div>
<a class="w-full mt-6 py-3.5 px-4 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold text-center hover:bg-primary shadow-lg hover:shadow-optical-blue/40 transition-all" href="#facility-booking">
            Deploy Full Rack Enclosure
          </a>
</div>
</div>
<!-- High-Density Cages Banner -->
<div class="mt-12 rounded-2xl bg-midnight-bg text-on-primary p-8 lg:p-10 shadow-xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8">
<div class="absolute -right-20 -bottom-20 w-96 h-96 bg-optical-blue/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="flex flex-col gap-2 max-w-2xl relative z-10">
<div class="inline-flex items-center gap-2 text-cyan-pulse font-label-mono text-label-mono uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">grid_goldenratio</span>
            Custom Enterprise Footprints
          </div>
<h3 class="font-headline-lg text-headline-lg font-bold text-white">Private Cages &amp; High-Density Pods (10kW - 40kW+)</h3>
<p class="font-body-md text-body-md text-white/70">
            Dedicated biometric cages with custom containment, chilled water rear-door heat exchangers, dual-bus STS switches, and multi-megawatt private hall allocations.
          </p>
</div>
<div class="relative z-10 flex-shrink-0">
<a class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-white text-deep-navy font-label-ui text-label-ui font-bold hover:bg-surface-ice transition-colors shadow-md" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
<span class="material-symbols-outlined text-[20px] text-optical-blue">contact_mail</span>
            Request Custom Pod Architecture
          </a>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
