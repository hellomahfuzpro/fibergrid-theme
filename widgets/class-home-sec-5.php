<?php
/**
 * Widget: Home - Section 5 (Carrier-Grade IP Transit & Colocation Plans Matrix)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_5';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 5 (Pricing & Capacity)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    protected function register_controls() {
        // Section Header
        $this->start_controls_section(
            'section_header',
            array(
                'label' => esc_html__( 'Section Header', 'fibergrid' ),
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Transparent Network Pricing',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Enterprise Transit & Colocation Plans',
            )
        );

        $this->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Predictable monthly bandwidth commitments and rack housing backed by a 100% SLA and zero surprise overage fees.',
            )
        );

        $this->end_controls_section();

        // Plan 1: 10G IP Transit Port
        $this->start_controls_section(
            'section_plan_1',
            array(
                'label' => esc_html__( 'Plan 1: BGP Port Commit', 'fibergrid' ),
            )
        );

        $this->add_control( 'p1_badge', array( 'label' => 'Badge', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Metro Transit' ) );
        $this->add_control( 'p1_title', array( 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '10G IP Transit Port' ) );
        $this->add_control( 'p1_desc', array( 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Burstable multi-homed BGP routing for mid-tier ISPs.' ) );
        $this->add_control( 'p1_price', array( 'label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$300' ) );
        $this->add_control( 'p1_period', array( 'label' => 'Period', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '/ month' ) );
        $this->add_control( 'p1_btn_text', array( 'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Request Port Quote' ) );
        $this->add_control( 'p1_btn_url', array( 'label' => 'Button URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => home_url( '/contact/' ) ) ) );

        $this->end_controls_section();

        // Plan 2: 100G Hyperscale Transit (Featured)
        $this->start_controls_section(
            'section_plan_2',
            array(
                'label' => esc_html__( 'Plan 2: 100G Hyperscale (Featured)', 'fibergrid' ),
            )
        );

        $this->add_control( 'p2_badge', array( 'label' => 'Badge', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100% Contractual SLA' ) );
        $this->add_control( 'p2_title', array( 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100G Hyperscale Transit' ) );
        $this->add_control( 'p2_desc', array( 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Full autonomous multi-carrier blend with line-rate DDoS filtering.' ) );
        $this->add_control( 'p2_price', array( 'label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$1,250' ) );
        $this->add_control( 'p2_period', array( 'label' => 'Period', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '/ month' ) );
        $this->add_control( 'p2_btn_text', array( 'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Request 100G Port' ) );
        $this->add_control( 'p2_btn_url', array( 'label' => 'Button URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => home_url( '/contact/' ) ) ) );

        $this->end_controls_section();

        // Plan 3: Colocation Cabinet
        $this->start_controls_section(
            'section_plan_3',
            array(
                'label' => esc_html__( 'Plan 3: Enterprise Colocation', 'fibergrid' ),
            )
        );

        $this->add_control( 'p3_badge', array( 'label' => 'Badge', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Tier-3 Facility' ) );
        $this->add_control( 'p3_title', array( 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Full 42U Locking Rack' ) );
        $this->add_control( 'p3_desc', array( 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Carrier-grade datacenter housing with clean A+B dual power.' ) );
        $this->add_control( 'p3_price', array( 'label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$399' ) );
        $this->add_control( 'p3_period', array( 'label' => 'Period', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '/ month' ) );
        $this->add_control( 'p3_btn_text', array( 'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Reserve Rack Space' ) );
        $this->add_control( 'p3_btn_url', array( 'label' => 'Button URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => home_url( '/contact/' ) ) ) );

        $this->end_controls_section();

        $this->add_style_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Transparent Network Pricing';
        $title   = ! empty( $settings['title'] ) ? $settings['title'] : 'Enterprise Transit & Colocation Plans';
        $desc    = ! empty( $settings['description'] ) ? $settings['description'] : 'Predictable monthly bandwidth commitments and rack housing backed by a 100% SLA and zero surprise overage fees.';

        $p1 = array(
            'badge'    => $settings['p1_badge'] ?? 'Metro Transit',
            'title'    => $settings['p1_title'] ?? '10G IP Transit Port',
            'desc'     => $settings['p1_desc'] ?? 'Burstable multi-homed BGP routing for mid-tier ISPs.',
            'price'    => $settings['p1_price'] ?? '$300',
            'period'   => $settings['p1_period'] ?? '/ month',
            'btn_text' => $settings['p1_btn_text'] ?? 'Request Port Quote',
            'btn_url'  => $settings['p1_btn_url'] ?? array( 'url' => home_url( '/contact/' ) ),
        );

        $p2 = array(
            'badge'    => $settings['p2_badge'] ?? '100% Contractual SLA',
            'title'    => $settings['p2_title'] ?? '100G Hyperscale Transit',
            'desc'     => $settings['p2_desc'] ?? 'Full autonomous multi-carrier blend with line-rate DDoS filtering.',
            'price'    => $settings['p2_price'] ?? '$1,250',
            'period'   => $settings['p2_period'] ?? '/ month',
            'btn_text' => $settings['p2_btn_text'] ?? 'Request 100G Port',
            'btn_url'  => $settings['p2_btn_url'] ?? array( 'url' => home_url( '/contact/' ) ),
        );

        $p3 = array(
            'badge'    => $settings['p3_badge'] ?? 'Tier-3 Facility',
            'title'    => $settings['p3_title'] ?? 'Full 42U Locking Rack',
            'desc'     => $settings['p3_desc'] ?? 'Carrier-grade datacenter housing with clean A+B dual power.',
            'price'    => $settings['p3_price'] ?? '$399',
            'period'   => $settings['p3_period'] ?? '/ month',
            'btn_text' => $settings['p3_btn_text'] ?? 'Reserve Rack Space',
            'btn_url'  => $settings['p3_btn_url'] ?? array( 'url' => home_url( '/contact/' ) ),
        );
        ?>
        <section class="w-full py-space-3xl bg-background" id="pricing-matrix">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1320px] mx-auto">
                <div class="text-center max-w-2xl mx-auto mb-space-2xl">
                    <span class="font-label-mono text-label-mono uppercase text-primary font-bold"><?php echo esc_html( $eyebrow ); ?></span>
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold mt-1"><?php echo esc_html( $title ); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2">
                        <?php echo esc_html( $desc ); ?>
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-space-lg items-stretch">
                    <!-- Pricing Card 1: 10G IP Transit Port -->
                    <div class="flex flex-col justify-between p-space-xl rounded-2xl bg-surface-container-lowest shadow-md hover:shadow-xl transition-all">
                        <div>
                            <div class="flex justify-between items-center mb-space-sm">
                                <span class="font-label-ui text-label-ui text-on-surface-variant uppercase">IP Transit</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-label-mono bg-surface-container text-deep-navy"><?php echo esc_html( $p1['badge'] ); ?></span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( $p1['title'] ); ?></h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1"><?php echo esc_html( $p1['desc'] ); ?></p>
                            <div class="my-space-lg p-space-md rounded-xl bg-surface-container-low">
                                <div class="font-label-mono text-label-mono text-on-surface-variant">Starting At</div>
                                <div class="flex items-baseline gap-1 mt-1">
                                    <span class="font-tech-metric-lg text-tech-metric-lg font-bold text-deep-navy"><?php echo esc_html( $p1['price'] ); ?></span>
                                    <span class="font-label-mono text-label-mono text-on-surface-variant"><?php echo esc_html( $p1['period'] ); ?></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-space-sm font-body-sm text-body-sm">
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">Port Interface</span>
                                    <span class="font-label-mono font-bold text-deep-navy">10G SFP+ Optical</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">Routing Engine</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Dual BGP Sessions</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">Upstream Transit</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Tier-1 Blend</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">IPv4 / IPv6</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Dual-Stack Standard</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">SLA Commitment</span>
                                    <span class="font-label-mono font-bold text-status-healthy">99.999% Core</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-space-xl mt-space-lg">
                            <a href="<?php echo esc_url( $p1['btn_url']['url'] ?? home_url( '/contact/' ) ); ?>" class="block text-center w-full py-3 rounded-lg bg-deep-navy text-on-primary font-label-ui text-label-ui hover:bg-optical-blue shadow transition-colors">
                                <?php echo esc_html( $p1['btn_text'] ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Pricing Card 2: 100G Hyperscale IP Transit (FEATURED) -->
                    <div class="relative flex flex-col justify-between p-space-xl rounded-2xl bg-surface-container-lowest border-2 border-optical-blue shadow-2xl scale-105 z-10">
                        <div>
                            <div class="flex justify-between items-center mb-space-sm mt-1">
                                <span class="font-label-ui text-label-ui text-primary uppercase font-bold">Hyperscale Transit</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-label-mono bg-status-healthy/10 text-status-healthy font-bold"><?php echo esc_html( $p2['badge'] ); ?></span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( $p2['title'] ); ?></h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1"><?php echo esc_html( $p2['desc'] ); ?></p>
                            <div class="my-space-lg p-space-md rounded-xl bg-surface-container-high">
                                <div class="font-label-mono text-label-mono text-primary font-semibold">Starting At</div>
                                <div class="flex items-baseline gap-1 mt-1">
                                    <span class="font-tech-metric-lg text-tech-metric-lg font-bold text-optical-blue"><?php echo esc_html( $p2['price'] ); ?></span>
                                    <span class="font-label-mono text-label-mono text-on-surface-variant"><?php echo esc_html( $p2['period'] ); ?></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-space-sm font-body-sm text-body-sm">
                                <div class="flex justify-between py-1 bg-surface-container-low px-2 rounded">
                                    <span class="text-on-surface-variant">Port Interface</span>
                                    <span class="font-label-mono font-bold text-deep-navy">100G QSFP28</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">Upstream Mix</span>
                                    <span class="font-label-mono font-bold text-deep-navy">9 Tier-1 Carriers</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low px-2 rounded">
                                    <span class="text-on-surface-variant">DDoS Protection</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Line-Rate Scrubbing</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">BGP Communities</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Granular Prepend/Blackhole</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low px-2 rounded">
                                    <span class="text-on-surface-variant">Uptime Guarantee</span>
                                    <span class="font-label-mono font-bold text-status-healthy">100% Contractual SLA</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-space-xl mt-space-lg">
                            <a href="<?php echo esc_url( $p2['btn_url']['url'] ?? home_url( '/contact/' ) ); ?>" class="block text-center w-full py-3.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui hover:bg-primary shadow-lg transition-colors">
                                <?php echo esc_html( $p2['btn_text'] ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Pricing Card 3: Enterprise Colocation -->
                    <div class="flex flex-col justify-between p-space-xl rounded-2xl bg-surface-container-lowest shadow-md hover:shadow-xl transition-all">
                        <div>
                            <div class="flex justify-between items-center mb-space-sm">
                                <span class="font-label-ui text-label-ui text-on-surface-variant uppercase">Facility Space</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-label-mono bg-surface-container text-deep-navy"><?php echo esc_html( $p3['badge'] ); ?></span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-deep-navy font-bold"><?php echo esc_html( $p3['title'] ); ?></h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1"><?php echo esc_html( $p3['desc'] ); ?></p>
                            <div class="my-space-lg p-space-md rounded-xl bg-surface-container-low">
                                <div class="font-label-mono text-label-mono text-on-surface-variant">Starting At</div>
                                <div class="flex items-baseline gap-1 mt-1">
                                    <span class="font-tech-metric-lg text-tech-metric-lg font-bold text-deep-navy"><?php echo esc_html( $p3['price'] ); ?></span>
                                    <span class="font-label-mono text-label-mono text-on-surface-variant"><?php echo esc_html( $p3['period'] ); ?></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-space-sm font-body-sm text-body-sm">
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">Rack Space</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Full 42U Locking Rack</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">Power Architecture</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Dual A+B 32A Feeds</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">Cross-Connect</span>
                                    <span class="font-label-mono font-bold text-deep-navy">Included Fiber Patch</span>
                                </div>
                                <div class="flex justify-between py-1 px-2">
                                    <span class="text-on-surface-variant">Remote Hands</span>
                                    <span class="font-label-mono font-bold text-deep-navy">24/7 Priority NOC Dispatch</span>
                                </div>
                                <div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded">
                                    <span class="text-on-surface-variant">Facility Access</span>
                                    <span class="font-label-mono font-bold text-status-healthy">24/7 Biometric Entry</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-space-xl mt-space-lg">
                            <a href="<?php echo esc_url( $p3['btn_url']['url'] ?? home_url( '/contact/' ) ); ?>" class="block text-center w-full py-3 rounded-lg bg-deep-navy text-on-primary font-label-ui text-label-ui hover:bg-optical-blue shadow transition-colors">
                                <?php echo esc_html( $p3['btn_text'] ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
