<?php
/**
 * Widget: Home - Section 4 (Infrastructure Pillars: IP Transit, Colocation & BGP Interconnection)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 4 (Infrastructure Pillars)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-columns';
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
                'default' => 'INFRASTRUCTURE PILLARS',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Engineered For Ultra–High Performance',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Section Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'From multi-gigabit IP transit to full enterprise colocation racks and carrier-neutral BGP peering, FiberGrid equips network operators with relentless stability.',
            )
        );

        $this->end_controls_section();

        // Pillar 1: IP Transit
        $this->start_controls_section(
            'section_pillar_1',
            array(
                'label' => esc_html__( 'Pillar 1: IP Transit', 'fibergrid' ),
            )
        );

        $this->add_control(
            'p1_title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'High-Speed IP Transit',
            )
        );

        $this->add_control(
            'p1_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Direct connection with top Tier-1 upstream transit providers. Enjoy autonomous multi-homed BGP routing with low latency routes, packet loss prevention, and burstable commit options.',
            )
        );

        $this->add_control(
            'p1_link_text',
            array(
                'label'   => esc_html__( 'Link Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'View Transit Specifications →',
            )
        );

        $this->add_control(
            'p1_link_url',
            array(
                'label'   => esc_html__( 'Link URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/ip-transit/' ) ),
            )
        );

        $this->end_controls_section();

        // Pillar 2: Colocation
        $this->start_controls_section(
            'section_pillar_2',
            array(
                'label' => esc_html__( 'Pillar 2: Colocation', 'fibergrid' ),
            )
        );

        $this->add_control(
            'p2_title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Global Data Center Colocation',
            )
        );

        $this->add_control(
            'p2_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Full and half-rack configurations in Tier III standard facilities. Includes redundant A+B utility power, UPS battery backups, diesel generators, and 24/7 biometric security.',
            )
        );

        $this->add_control(
            'p2_link_text',
            array(
                'label'   => esc_html__( 'Link Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'View Colocation Facilities →',
            )
        );

        $this->add_control(
            'p2_link_url',
            array(
                'label'   => esc_html__( 'Link URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/colocation/' ) ),
            )
        );

        $this->end_controls_section();

        // Pillar 3: BGP Interconnection & Peering
        $this->start_controls_section(
            'section_pillar_3',
            array(
                'label' => esc_html__( 'Pillar 3: BGP Peering & IXPs', 'fibergrid' ),
            )
        );

        $this->add_control(
            'p3_title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Autonomous BGP Routing & IXP Peering',
            )
        );

        $this->add_control(
            'p3_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Connect directly to major Internet Exchange Points (NAPAfrica, LINX, DE-CIX). Granular BGP community support with sub-15ms regional route convergence and line-rate DDoS filtering.',
            )
        );

        $this->add_control(
            'p3_link_text',
            array(
                'label'   => esc_html__( 'Link Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Explore Peering Fabric →',
            )
        );

        $this->add_control(
            'p3_link_url',
            array(
                'label'   => esc_html__( 'Link URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/ip-transit/#looking-glass' ) ),
            )
        );

        $this->end_controls_section();

        $this->add_style_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $eyebrow  = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'INFRASTRUCTURE PILLARS';
        $title    = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Engineered For Ultra–High Performance';
        $desc     = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'From multi-gigabit IP transit to full enterprise colocation racks and carrier-neutral BGP peering, FiberGrid equips network operators with relentless stability.';

        $p1_title = ! empty( $settings['p1_title'] ) ? $settings['p1_title'] : 'High-Speed IP Transit';
        $p1_desc  = ! empty( $settings['p1_description'] ) ? $settings['p1_description'] : 'Direct connection with top Tier-1 upstream transit providers. Enjoy autonomous multi-homed BGP routing with low latency routes, packet loss prevention, and burstable commit options.';
        $p1_text  = ! empty( $settings['p1_link_text'] ) ? $settings['p1_link_text'] : 'View Transit Specifications →';
        $p1_link  = ! empty( $settings['p1_link_url'] ) ? $settings['p1_link_url'] : array( 'url' => home_url( '/ip-transit/' ) );

        $p2_title = ! empty( $settings['p2_title'] ) ? $settings['p2_title'] : 'Global Data Center Colocation';
        $p2_desc  = ! empty( $settings['p2_description'] ) ? $settings['p2_description'] : 'Full and half-rack configurations in Tier III standard facilities. Includes redundant A+B utility power, UPS battery backups, diesel generators, and 24/7 biometric security.';
        $p2_text  = ! empty( $settings['p2_link_text'] ) ? $settings['p2_link_text'] : 'View Colocation Facilities →';
        $p2_link  = ! empty( $settings['p2_link_url'] ) ? $settings['p2_link_url'] : array( 'url' => home_url( '/colocation/' ) );

        $p3_title = ! empty( $settings['p3_title'] ) ? $settings['p3_title'] : 'Autonomous BGP Routing & IXP Peering';
        $p3_desc  = ! empty( $settings['p3_description'] ) ? $settings['p3_description'] : 'Connect directly to major Internet Exchange Points (NAPAfrica, LINX, DE-CIX). Granular BGP community support with sub-15ms regional route convergence and line-rate DDoS filtering.';
        $p3_text  = ! empty( $settings['p3_link_text'] ) ? $settings['p3_link_text'] : 'Explore Peering Fabric →';
        $p3_link  = ! empty( $settings['p3_link_url'] ) ? $settings['p3_link_url'] : array( 'url' => home_url( '/ip-transit/#looking-glass' ) );
        ?>
        <section class="w-full py-space-3xl bg-surface-container-lowest" id="infrastructure-pillars">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1320px] mx-auto flex flex-col gap-20 lg:gap-28">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto">
                    <span class="font-label-mono text-xs uppercase text-primary font-bold tracking-wider"><?php echo esc_html( $eyebrow ); ?></span>
                    <h2 class="text-3xl sm:text-4xl font-black text-deep-navy tracking-tight mt-1"><?php echo esc_html( $title ); ?></h2>
                    <p class="font-body-md text-base sm:text-lg text-on-surface-variant mt-3 max-w-2xl mx-auto leading-relaxed">
                        <?php echo esc_html( $desc ); ?>
                    </p>
                </div>

                <!-- FEATURE ROW 1: High-Speed IP Transit -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <div class="lg:col-span-6 flex flex-col gap-5">
                        <div class="w-10 h-10 rounded-lg bg-blue-100/70 text-[#0066ff] flex items-center justify-center mb-1">
                            <span class="material-symbols-outlined text-xl">speed</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-[#0b1c30] tracking-tight"><?php echo esc_html( $p1_title ); ?></h3>
                        <p class="text-base text-on-surface-variant leading-relaxed"><?php echo esc_html( $p1_desc ); ?></p>
                        <div class="flex flex-col gap-2.5 pt-2 text-sm text-[#0b1c30]">
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>Tier-1 Global Upstream Mix (Cogent, NTT, Telstra, HE.net)</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>1G, 10G &amp; 100G Port Speeds Available</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>Dual-Stack IPv4 &amp; IPv6 Routing Standard</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>100% Contractual Uptime SLA</span>
                            </div>
                        </div>
                        <div class="pt-3">
                            <a class="inline-flex items-center gap-1.5 font-bold text-sm text-[#0066ff] hover:text-primary transition-colors" href="<?php echo esc_url( $p1_link['url'] ?? '#' ); ?>">
                                <?php echo esc_html( $p1_text ); ?>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-6 relative flex items-center justify-center">
                        <div class="relative w-full max-w-[480px]">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-slate-900 aspect-[4/3.5] border border-slate-100">
                                <img alt="High-density enterprise server hardware racks" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYvlBsk2WTCDe0twhfsE-RDGYdCuAhRJjKuojclou89KoaIkuS2NcxLqhUrtG6Y07ftSxLMkHidgejByYbogm9iIvrK64tB2j4PjYdCxznCkiSReBRs5CjxLzG-MipVxGUoN80UuSfRbspaoofiGUILBEdVBPaCGaPlAjGBP3G6tot9Z6orbmiq1owaTrUUrp8MG0_-GOtoYTyPBSZZ7NuhUGuuvoW5YtcbLaUxwAfVKRMYSZ9QaJ8UA">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b1c30]/50 via-transparent to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FEATURE ROW 2: Global Colocation -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    <div class="lg:col-span-6 relative flex items-center justify-center order-2 lg:order-1">
                        <div class="relative w-full max-w-[480px]">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-slate-900 aspect-[4/3.5] border border-slate-100">
                                <img alt="NOC Network Systems Engineer configuring data center rack" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQRrBbhgXMO5yksVSB3Y-KHNUlxF7fkP0juae702T5lnpxp6U4s-sb0nPXdNHZbC_fHcRELP1N0aE6wD1ZrhYrBaDYR7nqFDxiK6xx7FKyC5ggane_kC6kkKs13Hsddb4PhEkgKQIVsLbHnY9XgVmya0aSVZalmuofGy52Qk6eIHQcYSu7Z3OX-KEkwDKnOD_8D7CfD4KPkICJEmT44BgdVyr4YFCXK8NtiuNlgWr1aifWMk3H6KwDpw">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b1c30]/50 via-transparent to-transparent"></div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-6 flex flex-col gap-5 order-1 lg:order-2">
                        <div class="w-10 h-10 rounded-lg bg-surface-container-high/60 text-route-orange flex items-center justify-center mb-1">
                            <span class="material-symbols-outlined text-xl">dns</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-[#0b1c30] tracking-tight"><?php echo esc_html( $p2_title ); ?></h3>
                        <p class="text-base text-on-surface-variant leading-relaxed"><?php echo esc_html( $p2_desc ); ?></p>
                        <div class="flex flex-col gap-2.5 pt-2 text-sm text-[#0b1c30]">
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>TIA-942 Rated 3 Certified Facilities</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>Locking Cabinets &amp; Private Colocation Cages</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>Dual A+B Power Feeds with N+1 Generator Backup</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-status-healthy text-lg shrink-0">check_circle</span>
                                <span>24/7 Remote Hands &amp; Rack Access Escorts</span>
                            </div>
                        </div>
                        <div class="pt-3">
                            <a class="inline-flex items-center gap-1.5 font-bold text-sm text-route-orange hover:opacity-80 transition-opacity" href="<?php echo esc_url( $p2_link['url'] ?? '#' ); ?>">
                                <?php echo esc_html( $p2_text ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </section>
        <?php
    }
}
