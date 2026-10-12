<?php
/**
 * Widget: Blog Single - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_3';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 3', 'fibergrid' );
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
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => '1. Executive Summary &amp; The Latency Dilemma in Emerging Corridors',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'In modern intercontinental data transactions, traditional routing topologies have routinely forced traffic from Southern Africa and the Indian Ocean rim through non-linear detours—frequently traversing congested legacy points of presence in Western Europe before redirecting back toward Asian financial hubs. For mission-critical institutions, cloud hyperscalers, and algorithmic trading entities, this geometric inefficiency introduced upwards of 40–60 milliseconds of avoidable latency.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'LinkedIn Profile', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => 'https://linkedin.com',
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
                'default' => esc_html__( '1. Executive Summary &amp; Dilemma', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#summary',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBRvjTJTvbg0PPWlYGR_O-5Z1Af5LqmJkVii3YUkjynKS9r3s9V48wzCiOCyQYSbKxX6Sei9vSurhmcEWS-Pkhqf1hh9JDsCldr-n3XHOZxd9zuX67fVWuaPDNLbVNm_A33TdfBkjNBezseBm7qX0UDogP-UEoy_qw2G9lIByufcaMqeQKgY5uI9LfI4o4X2iiVqubxqjS5EgDm4WmoIVVOsYUBZIzx8ZIw5ZtSlLkCtMgvK03KLFHp6g',
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
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : '1. Executive Summary &amp; The Latency Dilemma in Emerging Corridors';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'In modern intercontinental data transactions, traditional routing topologies have routinely forced traffic from Southern Africa and the Indian Ocean rim through non-linear detours—frequently traversing congested legacy points of presence in Western Europe before redirecting back toward Asian financial hubs. For mission-critical institutions, cloud hyperscalers, and algorithmic trading entities, this geometric inefficiency introduced upwards of 40–60 milliseconds of avoidable latency.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'LinkedIn Profile';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : 'https://linkedin.com';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : '1. Executive Summary &amp; Dilemma';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#summary';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBRvjTJTvbg0PPWlYGR_O-5Z1Af5LqmJkVii3YUkjynKS9r3s9V48wzCiOCyQYSbKxX6Sei9vSurhmcEWS-Pkhqf1hh9JDsCldr-n3XHOZxd9zuX67fVWuaPDNLbVNm_A33TdfBkjNBezseBm7qX0UDogP-UEoy_qw2G9lIByufcaMqeQKgY5uI9LfI4o4X2iiVqubxqjS5EgDm4WmoIVVOsYUBZIzx8ZIw5ZtSlLkCtMgvK03KLFHp6g';
        ?>

        <section class="w-full bg-background py-10">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">
<!-- Left: Article Content (8 cols) -->
<article class="lg:col-span-8 flex flex-col gap-8 text-on-surface">
<!-- Section 1 -->
<div class="flex flex-col gap-4">
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            <?php echo wp_kses_post( $title ); ?>
          </h2>
<p class="font-body-md text-body-md text-secondary leading-relaxed"><?php echo esc_html( $desc ); ?></p>
<p class="font-body-md text-body-md text-secondary leading-relaxed">
            FiberGrid’s Q3 2024 subsea route commissioning directly solves this structural bottleneck. By illuminating direct coherent optical channels along newly completed Atlantic and Indian Ocean cable consortium pathways, FiberGrid delivers a dedicated low-loss bypass that natively bridges Western Europe, Sub-Saharan Africa, and the APAC gateway via Singapore.
          </p>
</div>
<!-- Highlight Callout Quote / Stat Box -->
<div class="my-2 p-6 sm:p-8 rounded-xl bg-surface-ice border-l-4 border-primary shadow-sm flex flex-col gap-3">
<div class="flex items-center gap-2 text-primary font-label-mono text-label-mono font-bold tracking-wider uppercase">
<span class="material-symbols-outlined text-[18px]">verified</span>
            Measured Performance Benchmark
          </div>
<blockquote class="font-headline-sm text-headline-sm text-deep-navy font-bold italic leading-snug">
            “Commissioning Dense Wave-Division Multiplexing (DWDM) across our direct subsea paths yielded an immediate 24% reduction in round-trip latency between London, Johannesburg, and Singapore.”
          </blockquote>
<p class="font-body-sm text-body-sm text-secondary">
            Verified across 720 continuous hours of SLA packet telemetry under peak 400 Gbps cross-border throughput load.
          </p>
</div>
<!-- Section 2: Technical Topology -->
<div class="flex flex-col gap-4 pt-4">
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            2. Technical Topology &amp; Multi-Homed BGP Path Selection
          </h2>
<p class="font-body-md text-body-md text-secondary leading-relaxed">
            Our backbone infrastructure integrates advanced 800G per-wavelength transponders deployed across multi-chassis core routing clusters. Through automated telemetry streaming via gRPC, our network orchestration engine dynamically evaluates optical signal-to-noise ratios (OSNR) alongside real-time carrier peering tables.
          </p>
<p class="font-body-md text-body-md text-secondary leading-relaxed">
            When standard subsea fiber experiences macro-bends, seismic events, or terrestrial landing station maintenance, FiberGrid’s autonomous BGP community triggers hitless sub-50ms MPLS Fast Reroute (FRR) sequences without packet loss or TCP session renegotiation.
          </p>
<!-- Latency Benchmark Comparison Card -->
<div class="mt-4 rounded-xl bg-surface-container-lowest border border-grid-line p-6 shadow-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-grid-line">
<div>
<h3 class="font-headline-sm text-[18px] text-deep-navy font-bold">Corridor Latency Telemetry (RTT)</h3>
<p class="font-body-sm text-body-sm text-secondary">Pre vs Post Optical Route Commissioning Benchmarks</p>
</div>
<span class="inline-flex items-center gap-1 text-status-healthy font-label-mono text-label-mono bg-status-healthy/10 px-2.5 py-1 rounded">
<span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span>
                ACTIVE GUARANTEE
              </span>
</div>
<!-- Telemetry Table -->
<div class="overflow-x-auto mt-4">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="text-secondary font-label-mono text-[11px] uppercase border-b border-grid-line">
<th class="py-2.5">Route Corridor</th>
<th class="py-2.5">Legacy Transmit</th>
<th class="py-2.5">FiberGrid DWDM</th>
<th class="py-2.5 text-right">Delta Improvement</th>
</tr>
</thead>
<tbody class="divide-y divide-grid-line font-tech-metric-md text-[14px]">
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 font-medium text-deep-navy font-body-md">London (LHR) → Johannesburg (JNB)</td>
<td class="py-3 text-secondary">174 ms</td>
<td class="py-3 text-primary font-bold">132 ms</td>
<td class="py-3 text-right text-status-healthy font-bold">-42 ms (-24.1%)</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 font-medium text-deep-navy font-body-md">Marseille (MRS) → Singapore (SIN)</td>
<td class="py-3 text-secondary">168 ms</td>
<td class="py-3 text-primary font-bold">128 ms</td>
<td class="py-3 text-right text-status-healthy font-bold">-40 ms (-23.8%)</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3 font-medium text-deep-navy font-body-md">New York (JFK) → Frankfurt (FRA)</td>
<td class="py-3 text-secondary">74 ms</td>
<td class="py-3 text-primary font-bold">68 ms</td>
<td class="py-3 text-right text-status-healthy font-bold">SLA Guaranteed</td>
</tr>
</tbody>
</table>
</div>
<div class="mt-4 pt-3 border-t border-grid-line flex items-center justify-between text-secondary font-label-mono text-[11px]">
<span class="">Sample Period: 30 Days Rolling P95</span>
<span class="">Layer 1 Optical Transport</span>
</div>
</div>
</div>
<!-- Section 3: Dual-Feed Subsea Landing Redundancy -->
<div class="flex flex-col gap-4 pt-4">
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            3. Dual-Feed Subsea Landing Redundancy &amp; Carrier-Neutral Protection
          </h2>
<p class="font-body-md text-body-md text-secondary leading-relaxed">
            A common failure domain in global telecommunications resides in the beach manhole and coastal cable landing stations (CLS). Physical anchoring incidents, civil works, or local utility grid collapses can isolate an entire continent's upstream feed.
          </p>
<p class="font-body-md text-body-md text-secondary leading-relaxed">
            FiberGrid isolates enterprise workloads from physical landing failure via ring-topology dark fiber rings connecting physically disparate landings. If Cable Landing Station A experiences an optical signal loss or shore-end disruption, automated DWDM transponders deflect transport wavelengths onto alternate terrestrial fiber loops within 20 milliseconds.
          </p>
<!-- Key Takeaways List -->
<div class="bg-surface-container-low rounded-xl p-6 sm:p-8 mt-2">
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold mb-4">
              Key Architecture Takeaways for CTOs &amp; Network Teams
            </h3>
<ul class="space-y-3 font-body-md text-body-md text-on-surface">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5" style="font-variation-settings: &quot;FILL&quot; 1;">check_circle</span>
<span class=""><strong>Deterministic Subsea Routing:</strong> Up to 42ms round-trip reduction directly improving real-time API syncs, high-frequency settlement, and global database replication.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5" style="font-variation-settings: &quot;FILL&quot; 1;">check_circle</span>
<span class=""><strong>Carrier-Neutral Edge Integration:</strong> Direct cross-connect capabilities across major colocation facilities in Frankfurt, London, Cape Town, and Singapore.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5" style="font-variation-settings: &quot;FILL&quot; 1;">check_circle</span>
<span class=""><strong>Sub-50ms Autonomous Failover:</strong> Dynamic MPLS-FRR and telemetry-driven BGP state reconciliation guaranteeing 99.999% network SLA availability.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5" style="font-variation-settings: &quot;FILL&quot; 1;">check_circle</span>
<span class=""><strong>Transparent Looking Glass Access:</strong> Real-time peering verification, route traceroutes, and BGP community flags accessible 24/7 via the FiberGrid looking glass &amp; telemetry hub.</span>
</li>
</ul>
</div>
</div>
<!-- Author Bio Box -->
<div class="mt-6 p-6 sm:p-8 rounded-2xl bg-white border border-grid-line shadow-md flex flex-col sm:flex-row items-center sm:items-start gap-6">
<img class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover shrink-0 ring-4 ring-surface-ice" data-alt="Close up professional portrait of Dr. Alistair Vance with engineering credentials, modern data center in background, warm confidence and telecom expertise." src="<?php echo esc_url( $image_1 ); ?>">
<div class="flex flex-col text-center sm:text-left">
<div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">About Dr. Alistair Vance</h4>
<span class="text-xs uppercase font-label-mono px-2 py-0.5 bg-primary/10 text-primary rounded self-center sm:self-auto font-semibold">Author</span>
</div>
<p class="font-label-ui text-label-ui text-secondary mt-0.5">Chief Network Architect &amp; Subsea Cable Program Lead</p>
<p class="font-body-sm text-body-sm text-secondary mt-3 leading-relaxed">
              Dr. Vance brings 18+ years of carrier engineering experience specializing in long-haul submarine cable landing architecture, DWDM wave-division multiplexing, and resilient autonomous BGP routing. Prior to FiberGrid, he directed subsea backhaul programs spanning the Atlantic and Indian oceans.
            </p>
<div class="flex items-center justify-center sm:justify-start gap-3 mt-4 pt-3 border-t border-grid-line">
<a class="font-label-ui text-label-ui text-primary hover:underline font-semibold flex items-center gap-1" href="#">
<span class="">View Author Archive</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
<span class="text-grid-line">|</span>
<a class="font-label-ui text-label-ui text-secondary hover:text-primary transition-colors" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_text ); ?></a>
</div>
</div>
</div>
</article>
<!-- Right: Sticky Technical Sidebar (4 cols) -->
<aside class="lg:col-span-4 flex flex-col gap-6">
<!-- Table of Contents Card -->
<div class="sticky top-28 flex flex-col gap-6">
<div class="p-6 rounded-xl bg-surface-container-lowest border border-grid-line shadow-sm">
<h3 class="font-label-mono text-label-mono uppercase tracking-wider text-secondary font-bold mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">menu_book</span>
              Article Contents
            </h3>
<nav class="flex flex-col space-y-2.5 font-label-ui text-label-ui">
<a class="text-primary font-semibold hover:underline flex items-center gap-2" href="<?php echo esc_url( $btn2_url ); ?>">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <?php echo esc_html( $btn2_text ); ?>
              </a>
<a class="text-secondary hover:text-primary transition-colors flex items-center gap-2" href="#topology">
<span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                2. Technical Topology &amp; BGP Reroute
              </a>
<a class="text-secondary hover:text-primary transition-colors flex items-center gap-2" href="#redundancy">
<span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                3. Subsea Landing Redundancy
              </a>
<a class="text-secondary hover:text-primary transition-colors flex items-center gap-2" href="#takeaways">
<span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                Key Architectural Takeaways
              </a>

</nav>
</div>
<!-- Real-Time Network Health HUD -->

<!-- Quick Quote / Inquire Box -->
<div class="p-6 rounded-xl bg-surface-ice border border-primary/20 shadow-sm flex flex-col gap-3">
<span class="font-label-mono text-label-mono text-primary font-bold uppercase">Dedicated Engineering Support</span>
<p class="font-headline-sm text-[16px] text-deep-navy font-bold">Need sub-second transit for your core AS?</p>
<p class="font-body-sm text-body-sm text-secondary">
              Our optical network architects are ready to review your current BGP routing matrix and quote direct interconnect lines.
            </p>
<a class="inline-flex items-center justify-between text-primary font-label-ui text-label-ui font-bold hover:gap-2 transition-all pt-1" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
    <span>Schedule Architecture Review</span>
    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</aside>
</div>
</section>
        <?php
    }
}
