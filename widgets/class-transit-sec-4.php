<?php
/**
 * Widget: IP Transit - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_4';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 4', 'fibergrid' );
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
                'default' => esc_html__( 'Commercial Bandwidth Tiers', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Transparent IP Transit Pricing',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Deploy high-speed autonomous BGP transit with direct cross-connects at world-class carrier-neutral data centers.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Tier 1 Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Request 1G Port Quote', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Tier 1 Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => home_url( '/contact/' ),
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => esc_html__( 'Tier 2 Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Deploy 10G Port', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Tier 2 Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => home_url( '/contact/' ),
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'btn3_text',
            array(
                'label'   => esc_html__( 'Tier 3 Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Consult Network Architect', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn3_url',
            array(
                'label'   => esc_html__( 'Tier 3 Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => home_url( '/contact/' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Commercial Bandwidth Tiers';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Transparent IP Transit Pricing';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Deploy high-speed autonomous BGP transit with direct cross-connects at world-class carrier-neutral data centers.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Request 1G Port Quote';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : home_url( '/contact/' );
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Deploy 10G Port';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : home_url( '/contact/' );
        $btn3_text = ! empty( $settings['btn3_text'] ) ? $settings['btn3_text'] : 'Consult Network Architect';
        $btn3_url  = ! empty( $settings['btn3_url']['url'] ) ? $settings['btn3_url']['url'] : home_url( '/contact/' );
        ?>

        <section class="w-full bg-surface-ice py-20 px-margin-mobile lg:px-margin-desktop" id="pricing-matrix">
<div class="max-w-[1360px] mx-auto">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-on-surface mt-2"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-3"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- 3 Tier Cards -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
<!-- Tier 1: 1 Gigabit -->
<div class="bg-surface-container-lowest rounded-2xl p-8 shadow-sm flex flex-col justify-between hover:shadow-xl transition-all">
<div>
<div class="flex items-center justify-between">
<span class="p-3 rounded-xl bg-surface-container-low text-primary material-symbols-outlined text-2xl">speed</span>
<span class="font-label-mono text-xs font-bold text-on-surface-variant bg-surface-ice px-3 py-1 rounded-full">SME / POP</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mt-5">1 Gigabit Dedicated</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
              Full enterprise routing table via dual BGP sessions with 9 upstream carrier failover redundancy.
            </p>
<div class="mt-6 mb-6">
<span class="font-tech-metric-lg text-tech-metric-lg text-on-surface font-bold">$300</span>
<span class="font-body-sm text-on-surface-variant">/ month</span>
</div>
<!-- Features List -->
<ul class="space-y-3 font-body-sm text-body-sm text-on-surface pt-6">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Dual-Stack IPv4 &amp; IPv6 Routing</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">9 Global Tier-1 Upstream Feeds</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">BGP Community Tagging &amp; RTBH</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Free IPv4/29 Subnet Allocation</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">100% Guaranteed SLA &amp; 0% Packet Loss</span>
</li>
</ul>
</div>
<div class="mt-8 pt-6">
<a class="w-full inline-flex items-center justify-center py-3.5 px-4 rounded-lg bg-surface-ice text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
  <?php echo esc_html( $btn1_text ); ?>
</a>
</div>
</div>
<!-- Tier 2: 10 Gigabit (Highlighted Featured Tier) -->
<div class="bg-surface-container-lowest rounded-2xl p-8 shadow-xl flex flex-col justify-between relative transform lg:-translate-y-2">
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-optical-blue text-on-primary text-xs font-bold px-4 py-1 rounded-full uppercase tracking-wider shadow">
            Most Popular Choice
          </div>
<div>
<div class="flex items-center justify-between">
<span class="p-3 rounded-xl bg-optical-blue text-on-primary material-symbols-outlined text-2xl">hub</span>
<span class="font-label-mono text-xs font-bold text-optical-blue bg-surface-ice px-3 py-1 rounded-full">HIGH CAPACITY</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mt-5">10 Gigabit Enterprise</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
              High-throughput 10G optical SFP+ port delivered directly into your rack or Teraco / Equinix MMR.
            </p>
<div class="mt-6 mb-6">
<span class="font-tech-metric-lg text-tech-metric-lg text-optical-blue font-bold">$850</span>
<span class="font-body-sm text-on-surface-variant">/ month</span>
</div>
<!-- Features List -->
<ul class="space-y-3 font-body-sm text-body-sm text-on-surface pt-6">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="font-semibold">Full 10Gbps Committed or 95th Percentile</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Direct Peering via NAPAfrica &amp; JINX</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Automated DDoS Blackholing (&lt;1s MTTR)</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Free Racking &amp; MMR Cross-Connect Assist</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Sub-15ms Metro Routing Guarantee</span>
</li>
</ul>
</div>
<div class="mt-8 pt-6">
<a class="w-full inline-flex items-center justify-center py-3.5 px-4 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
  <?php echo esc_html( $btn2_text ); ?>
</a>
</div>
</div>
<!-- Tier 3: 100 Gigabit Hyperscale -->
<div class="bg-surface-container-lowest rounded-2xl p-8 shadow-sm flex flex-col justify-between hover:shadow-xl transition-all">
<div>
<div class="flex items-center justify-between">
<span class="p-3 rounded-xl bg-surface-container-low text-route-orange material-symbols-outlined text-2xl">dns</span>
<span class="font-label-mono text-xs font-bold text-on-surface-variant bg-surface-ice px-3 py-1 rounded-full">HYPERSCALE</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mt-5">100 Gigabit Optical</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
              Bespoke DWDM wavelength circuits and uncompressed 100GbE QSFP28 ports for telcos and hyperscalers.
            </p>
<div class="mt-6 mb-6">
<span class="font-headline-md text-headline-md text-on-surface font-bold">Custom Quote</span>
<span class="font-body-sm text-on-surface-variant block mt-1">Tailored CIR &amp; Metro Wave</span>
</div>
<!-- Features List -->
<ul class="space-y-3 font-body-sm text-body-sm text-on-surface pt-6">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Dedicated 100G Coherent Optical Interface</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Multi-Metro Ring Protected Backhaul</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Dedicated NOC Engineering Team</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Custom BGP Flowspec Filtering</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-status-healthy text-lg">check_circle</span>
<span class="">Tier 3 Facility Direct Cross-Connect</span>
</li>
</ul>
</div>
<div class="mt-8 pt-6">
<a class="w-full inline-flex items-center justify-center py-3.5 px-4 rounded-lg bg-surface-ice text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container transition-all" href="<?php echo esc_url( $btn3_url ); ?>">
  <?php echo esc_html( $btn3_text ); ?>
</a>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
