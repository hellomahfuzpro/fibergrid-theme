<?php
/**
 * Widget: IP Transit - Section 5
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_5';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 5', 'fibergrid' );
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
                'default' => '{ GLOBAL REACH & BACKBONE POPS }',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our Transit Location',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'World Wide Availability: Low-latency autonomous transit routes connecting Tier-1 carrier interchanges across North America, Europe, and Asia-Pacific.',
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

        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '{ GLOBAL REACH & BACKBONE POPS }';
        $title   = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Our Transit Location';
        $desc    = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'World Wide Availability: Low-latency autonomous transit routes connecting Tier-1 carrier interchanges across North America, Europe, and Asia-Pacific.';
        ?>
        <section id="transit-locations" class="w-full bg-surface-ice py-20 px-margin-mobile lg:px-margin-desktop border-t border-[#e2e8f0] <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>"><div class="max-w-[1360px] mx-auto"><div class="text-center max-w-3xl mx-auto mb-12"><span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></span><h2 class="font-headline-xl text-headline-xl text-on-surface mt-2"><?php echo esc_html( $title ); ?></h2><p class="font-body-md text-body-md text-on-surface-variant mt-3"><?php echo esc_html( $desc ); ?></p></div><!-- Interactive Tab Switcher --><div class="flex flex-wrap items-center justify-center gap-3 mb-10"><button type="button" id="tab-btn-na" onclick="switchTransitMap('na')" class="transit-tab-btn px-6 py-3 rounded-xl bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md transition-all flex items-center gap-2"><span class="material-symbols-outlined text-base">public</span>North America Backbone</button><button type="button" id="tab-btn-eu" onclick="switchTransitMap('eu')" class="transit-tab-btn px-6 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-label-ui text-label-ui font-medium hover:bg-surface-container transition-all flex items-center gap-2"><span class="material-symbols-outlined text-base">hub</span>Europe &amp; Interconnects</button><button type="button" id="tab-btn-apac" onclick="switchTransitMap('apac')" class="transit-tab-btn px-6 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-label-ui text-label-ui font-medium hover:bg-surface-container transition-all flex items-center gap-2"><span class="material-symbols-outlined text-base">cell_tower</span>Asia-Pacific Subsea Links</button></div><!-- Map Display Cards Container --><div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden border border-[#e2e8f0]"><!-- Panel 1: North America --><div id="map-panel-na" class="transit-map-panel"><div class="p-6 lg:p-8 border-b border-[#e2e8f0] flex flex-col items-center text-center gap-3 bg-surface-bright"><div class="flex items-center justify-center gap-2.5"><span class="w-2.5 h-2.5 rounded-full bg-status-healthy"></span><span class="font-headline-sm text-headline-sm text-on-surface font-bold">North American Terrestrial &amp; Subsea Mesh</span></div><p class="font-body-sm text-body-sm text-on-surface-variant max-w-3xl">Cross-continental DWDM optical ring spanning Ashburn, New York, Chicago, Dallas, San Jose, and Los Angeles with direct Atlantic &amp; Pacific gateways.</p><div class="flex flex-wrap justify-center gap-2 mt-1"><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Ashburn (Equinix DC2)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">New York (60 Hudson)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">San Jose (SV1)</span></div></div><div class="relative w-full overflow-hidden bg-surface-bright flex items-center justify-center p-2 sm:p-6"><img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCW0twqJSc-UOdozir5TQg_1hyv9ngWnGeFubESqHW_7-B-taHl2fMhYgdYfi0YU-N6niCn3VGTQUggeS0UUnwXFmFynMqQO5yl4suBfuf6lMyonuGALJ8wdOrNA5uoV0wXuvGIi3xAUTJ-d31LOpOjpBfKtvCKdW7RK-sGCVO5jQxXNjWNyFzfkWp_YSySpZFf51wyJrB5HbB8Qk9DDbVS-UoduUi8U3dKrhxwEr7Fcd0Kr6qzxHMTbYSpTqewNI4c3T8" alt="FiberGrid North America IP Transit Core Route Map" class="w-full h-auto max-h-[620px] object-contain rounded-xl"></div><div class="p-6 bg-surface-bright grid grid-cols-2 sm:grid-cols-4 gap-4 text-center border-t border-[#e2e8f0]"><div><div class="font-tech-metric-md text-tech-metric-md text-optical-blue font-bold">42+</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Carrier Hotels &amp; MMRs</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-on-surface font-bold">&lt; 38ms</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Transcontinental RTD</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-route-orange font-bold">100 Gbps</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Protected Optical Rings</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-status-healthy font-bold">100.00%</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">SLA Packet Delivery</div></div></div></div><!-- Panel 2: Europe --><div id="map-panel-eu" class="transit-map-panel hidden"><div class="p-6 lg:p-8 border-b border-[#e2e8f0] flex flex-col items-center text-center gap-3 bg-surface-bright"><div class="flex items-center justify-center gap-2.5"><span class="w-2.5 h-2.5 rounded-full bg-status-healthy"></span><span class="font-headline-sm text-headline-sm text-on-surface font-bold">European Core Interconnects &amp; Transatlantic Landings</span></div><p class="font-body-sm text-body-sm text-on-surface-variant max-w-3xl">Ultra low-latency optical rings spanning London, Amsterdam, Frankfurt, Paris, Stockholm, and Marseille connecting DE-CIX, AMS-IX, and LINX fabrics.</p><div class="flex flex-wrap justify-center gap-2 mt-1"><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Frankfurt (DE-CIX)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">London (LINX / Telehouse)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Amsterdam (AMS-IX)</span></div></div><div class="relative w-full overflow-hidden bg-surface-bright flex items-center justify-center p-2 sm:p-6"><img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiFtiuHHxpBnB1gtSLXi0aKARZZF9wqM43nQlQGdhN-Rf2w64UcaqK8kyifJ7x2Swz1sB76o-iRqRHSOH_JV8Og1QEMp09PT8W0Y6bXgf9fedzzSDPZKC1Achg9ivYpBf-0giGOmXGIKZkRv1_rIfj2Gj-k3S0BuIOzzSBNymGwgjK-0Vv5emEya7pnC-knO2Ft3-fnhmCC-q4RJbY8Yy8eXRWhJJnVU_gn_wKyq3YexhzxYSqxfP60pgxLH2j6qU64Uo" alt="FiberGrid Europe and Transatlantic IP Transit Route Map" class="w-full h-auto max-h-[620px] object-contain rounded-xl"></div><div class="p-6 bg-surface-bright grid grid-cols-2 sm:grid-cols-4 gap-4 text-center border-t border-[#e2e8f0]"><div><div class="font-tech-metric-md text-tech-metric-md text-optical-blue font-bold">68+</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Interconnected PoPs</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-on-surface font-bold">&lt; 4.8ms</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">FLAP Metro RTD</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-route-orange font-bold">Nx100G</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">DWDM Coherent Waves</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-status-healthy font-bold">0.00%</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Transit Packet Loss</div></div></div></div><!-- Panel 3: Asia-Pacific --><div id="map-panel-apac" class="transit-map-panel hidden"><div class="p-6 lg:p-8 border-b border-[#e2e8f0] flex flex-col items-center text-center gap-3 bg-surface-bright"><div class="flex items-center justify-center gap-2.5"><span class="w-2.5 h-2.5 rounded-full bg-status-healthy"></span><span class="font-headline-sm text-headline-sm text-on-surface font-bold">Asia-Pacific Subsea Express Cables &amp; Regional Hubs</span></div><p class="font-body-sm text-body-sm text-on-surface-variant max-w-3xl">High-speed low-jitter transit interconnects linking Singapore, Hong Kong, Tokyo, and coastal landing stations to US West Coast and Europe.</p><div class="flex flex-wrap justify-center gap-2 mt-1"><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Singapore (Equinix SG1)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Hong Kong (HKIX)</span><span class="font-label-mono text-xs bg-surface-container-high text-on-surface px-3 py-1.5 rounded-lg font-semibold">Tokyo (Equinix TY2)</span></div></div><div class="relative w-full overflow-hidden bg-surface-bright flex items-center justify-center p-2 sm:p-6"><img src="https://lh3.googleusercontent.com/aida-public/AB6AXuATG9j2M5OZL8ldia-oDy-GzPshRUeF4a8q9o9hDg3RHNd3va7WazKdMkpXXZxJsd_clNwRDxwLH7KvWlGNWvMDEYe8ucF9eKXhSC4u5-hVOuHsr3PrOejw9PMDJR31RrjdyeQxJvcxeVMzkNESi6F-pvD2Ta32IUQuwlZ_nh38AUVH9FZ_fN9DaHnaL4s3ivzZTKYROG5nMGVzEQuXno5Vmx0fJDaJoq_FNJGxgp0EeOUOVD-lOJeEGktt6zVv-VltRyI" alt="FiberGrid Asia Pacific IP Transit Route Map" class="w-full h-auto max-h-[620px] object-contain rounded-xl"></div><div class="p-6 bg-surface-bright grid grid-cols-2 sm:grid-cols-4 gap-4 text-center border-t border-[#e2e8f0]"><div><div class="font-tech-metric-md text-tech-metric-md text-optical-blue font-bold">5+</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Transpacific Cables</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-on-surface font-bold">&lt; 32ms</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">HKG - SIN Round Trip</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-route-orange font-bold">400G Ready</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">Core Optical Fabric</div></div><div><div class="font-tech-metric-md text-tech-metric-md text-status-healthy font-bold">100.00%</div><div class="font-label-mono text-xs text-on-surface-variant uppercase mt-0.5">SLA Availability</div></div></div></div></div></div><script>function switchTransitMap(region){var panels={na:document.getElementById('map-panel-na'),eu:document.getElementById('map-panel-eu'),apac:document.getElementById('map-panel-apac')};var buttons={na:document.getElementById('tab-btn-na'),eu:document.getElementById('tab-btn-eu'),apac:document.getElementById('tab-btn-apac')};Object.keys(panels).forEach(function(key){if(panels[key]){if(key===region){panels[key].classList.remove('hidden');}else{panels[key].classList.add('hidden');}}if(buttons[key]){if(key===region){buttons[key].className='transit-tab-btn px-6 py-3 rounded-xl bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md transition-all flex items-center gap-2';}else{buttons[key].className='transit-tab-btn px-6 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-label-ui text-label-ui font-medium hover:bg-surface-container transition-all flex items-center gap-2';}}});}</script></section>
        <?php
    }
}
