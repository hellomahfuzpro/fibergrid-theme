<?php
/**
 * Widget: Blog - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_3';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 3', 'fibergrid' );
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
                'default' => esc_html__( 'TECHNICAL ARTICLES', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Latest NOC &amp; Systems Dispatches',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'An architectural examination of community-based traffic engineering and autonomous system prepending to bypass carrier congestion.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuChCUPROYU-5ljdJu770kIfA68nWBtszXql-swYZMuxuIsHe9wcypF0wM9-ptKmid27Ju2M3em3x031ttu1-QfP2TI97qY0FRZGx81glzYv3CLR_zN07RqmIysX5hP6Am_AWeDFRzvRevJj3lCbb4s7_yQ8hwoYaKGayAeuDGDq3enZF1n5z7-s-zGYD83hHN7y5ylUbh643c4Jwwzl0VTZKYZ7K2y3JiXVIXQ_UFJ9fVjHJfjecYTX-g',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'TECHNICAL ARTICLES';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Latest NOC &amp; Systems Dispatches';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'An architectural examination of community-based traffic engineering and autonomous system prepending to bypass carrier congestion.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuChCUPROYU-5ljdJu770kIfA68nWBtszXql-swYZMuxuIsHe9wcypF0wM9-ptKmid27Ju2M3em3x031ttu1-QfP2TI97qY0FRZGx81glzYv3CLR_zN07RqmIysX5hP6Am_AWeDFRzvRevJj3lCbb4s7_yQ8hwoYaKGayAeuDGDq3enZF1n5z7-s-zGYD83hHN7y5ylUbh643c4Jwwzl0VTZKYZ7K2y3JiXVIXQ_UFJ9fVjHJfjecYTX-g';
        ?>

        <section class="w-full bg-background py-8">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
<div class="flex items-center justify-between mb-8">
<div>
<span class="font-label-mono text-label-mono text-primary uppercase font-semibold tracking-wider"><?php echo esc_html( $eyebrow ); ?></span>
<h3 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mt-1"><?php echo wp_kses_post( $title ); ?></h3>
</div>
<div class="hidden sm:flex items-center gap-2 text-secondary font-label-mono text-label-mono">
<span class="">SORT BY: RECENT</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Article 1: BGP & Peering -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Technical network topology visualization of global BGP routers with glowing cyan nodes and orange data packet paths, clean minimalistic server rack background." src="<?php echo esc_url( $image_1 ); ?>">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                BGP &amp; PEERING
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Oct 18, 2024</span>
<span class="">•</span>
<span class="">8 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Optimizing BGP Multi-Homed Convergence for Sub-15ms Regional Metro Latency
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  KM
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">Karl Meyer</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/bgp-metro-latency">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Article 2: Colocation -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Row of modern server racks in a high-security enterprise colocation data center with cool white and blue aisle lighting and clean cable management." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZve87QBLHmOQsI5_zkOApwqC7B7vZSRifkqTrpITk-ECp5G0JPKVsz8vMzNFq5vlA1o46ayv9HIO6um1ZUrEHXRAoMaYSJOxQwxwPo5_Jx14r1NVfFrUWahjRG3c0ThbuA2IQSUnu40xwymMrrrm-ZaKSeLppQ0aLSqm1q72bxA2RbQsV7kaCHWoohLhP_tEfpuqsBFm1FCwkvFjYwAfGAznIBrkuKQ6yd7lbIdhVaWXiDpPMBf4FNg">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                COLOCATION
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Oct 11, 2024</span>
<span class="">•</span>
<span class="">5 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Tier III Colocation Power Efficiency: Implementing Hot-Aisle Containment &amp; N+1 Redundancy
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6">
                Achieving a sustained 1.18 PUE index while managing continuous 30kW per-rack thermal loads for modern GPU and compute deployments.
              </p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  SL
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">Sarah Lin</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/tier-3-power-efficiency">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Article 3: Cloud Infrastructure -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Macro view of high-density PCIe Gen5 NVMe solid-state storage array modules illuminated in high-tech blue light within an enterprise blade server." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzvWR9cajPhqiz8jfzsHVH9fq2_B5yGKGxV3SbIaSN6gNoPYpPlZ_L4gQTnFlzHjqaQ8zD6T84B-cRq0XLfRb13PRBkvJQaa3byonO1F9Kl6EeouJnI1mikWruwtyj7CzovZaLo0Tw91H-qiNOvRUpaF2omuWu69er1oGV9TSrA5Rg2fr5YHo8pWGjjMfghdGusihoboyqiZBc38bADne2eB9Z1pxeeWY43EtZX4jkb07TSHNLL191nw">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                CLOUD INFRASTRUCTURE
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Sep 29, 2024</span>
<span class="">•</span>
<span class="">7 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Enterprise NVMe Private Cloud: Benchmarking High-Frequency Virtual Compute Clusters
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6">
                Comparative analysis of bare-metal KVM hypervisors paired with Ceph-NVMe distributed storage fabrics for financial transaction processing.
              </p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  DR
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">David Ross</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/enterprise-nvme-benchmarks">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Article 4: Cybersecurity & DDoS -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Digital cyber defense telemetry console showing automated network packet inspection and line-rate scrubbing visualizations in deep obsidian and electric blue." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBz6B20hwLkWItLx-FCDlPkj5qQ08aHj40SnlpXFtZ6sJNF8eH4RobUqEE9RpNYAfIuQ6zxZVbFR7BxpONp3GslAicKItRmeP7WMjRJm1Gz9RWYwd-AIJl_VgkDMx6Ju7x9R7C3pzgGp-_UazSQD5S7liOmmIu-EFM2lKslqrScKdy5oMeHNh9BnBYXexZ5IderSVTc_br_33U0Y-gTd-9SVx-eaqoMg2a11bdJCQY_rAue-5QCF1aMRw">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                CYBERSECURITY &amp; DDOS
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Sep 19, 2024</span>
<span class="">•</span>
<span class="">10 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Mitigating Terabit-Scale Distributed Attacks with Line-Rate Autonomous RTBH Scrubbing
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6">
                How FiberGrid automated edge BGP Flowspec filters to discard volumetric UDP amplifications within 1.2 seconds of signature anomaly detection.
              </p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  TM
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">Tariq Mansoor</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/autonomous-ddos-mitigation">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Article 5: Telecom Strategy -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Telecommunications fiber patch panel in a carrier-neutral facility showing clean color-coded LC fiber interconnect lines arranged neatly." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFsuDtG4jiCh24TNB0Opvw69KxBDx-zzVWWym_dC-k9FFz2d4XbS05tAAkir4p0tQCud4Ke6Pag4G9jasAY7LpXbsYUTlrMfhI6KWXMhsTPcWrw0H13lmlShk1MZLZJazHRZIAdpIEuCdqLFnAROkilbYH-9iqZB2728-o2UY8F6f2HIRWWPGnB9bl2jo4JZEco_aFFZrkuIUvFLIhykUDcuIK7_A9Mzmj28fTFlYavNeQhRgNAC7WNw">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                TELECOM STRATEGY
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Sep 04, 2024</span>
<span class="">•</span>
<span class="">6 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Understanding Carrier-Neutral Interconnects: Why Fabric Diversity Protects Uptime
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6">
                Why relying on a single transit monopoly invites catastrophic disruption, and how distributed IXP blending guarantees four-nines resiliency.
              </p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  EG
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">Elena García</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/carrier-neutral-fabric">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Article 6: Subsea Cables -->
<article class="flex flex-col rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
<div class="relative h-52 w-full overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Digital cartographic world map with glowing oceanic submarine optical fiber routes crossing deep ocean beds with digital latency data nodes." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBclaK4AkGES-4obbZCV_37pXgbTJrS5O8DjiWDTaQ9h4nnnMQ5RzrlTkP6Lns3DoGDvZwzQjwOggtuFX0b_etMft6_XGWNp6hQr-vlQT8w_M7dW55W4JG-DiQxcJdRJHg-t0tZoGCN8oM_s-wQLLUb-9xEP485KgSSD9ClfJEuYzbs1suuc7rDKiaK5S59E2jAPH_KcUuNwUBiZONov12Fbfxl7g8r5q9GyrVilwB9t4ZyTotKWb_5fA">
<div class="absolute top-3.5 left-3.5">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-mono text-label-mono font-bold">
                SUBSEA CABLES
              </span>
</div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 font-label-ui text-label-ui text-secondary mb-3">
<span class="">Aug 22, 2024</span>
<span class="">•</span>
<span class="">9 min read</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors mb-3 line-clamp-2">
                Subsea Cable Route Map 2025: Investing in the Next Generation of Transatlantic Fiber
              </h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-6">
                A review of newly funded subsea consortium cables, spatial-division multiplexing (SDM), and capacity predictions through 2030.
              </p>
</div>
<div class="pt-4 border-t border-grid-line flex items-center justify-between">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center font-bold text-xs">
                  AV
                </div>
<span class="font-label-ui text-label-ui text-on-surface font-medium">Dr. Alistair Vance</span>
</div>
<a class="inline-flex items-center gap-1 font-label-ui text-label-ui font-semibold text-optical-blue group-hover:translate-x-1 transition-transform" href="/blog/subsea-cable-map-2025">
<span class="">Read</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</article>
</div>
<!-- Pagination or Load More -->
<div class="mt-12 flex items-center justify-center">
<button class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-label-ui text-label-ui font-semibold hover:bg-surface-container hover:text-primary transition-all shadow-sm">
<span class="">Load More Engineering Articles</span>
<span class="material-symbols-outlined text-[18px]">expand_more</span>
</button>
</div>
</div>
</section>
        
        <?php
    }
}
