<?php
/**
 * Widget: Contact - Section 3 (Physical Office Facilities & Zero Phone/Email Enforcement)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ContactSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_contact_sec_3';
    }

    public function get_title() {
        return esc_html__( 'Contact - Section 3 (Office Facilities & Campuses)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_facilities',
            array(
                'label' => esc_html__( 'Office Facilities & Access Settings', 'fibergrid' ),
            )
        );

        $this->add_control(
            'card1_title',
            array(
                'label'   => esc_html__( 'Card 1 Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Registered Office Addresses',
            )
        );

        $this->add_control(
            'card1_subtitle',
            array(
                'label'   => esc_html__( 'Card 1 Subtitle', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Operational & Corporate Sites',
            )
        );

        $this->add_control(
            'uk_address',
            array(
                'label'   => esc_html__( 'UK Address', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Streathbourne House, Redehall Road, Smallfield, Surrey, RH6 9QA, England, United Kingdom',
            )
        );

        $this->add_control(
            'sa_address',
            array(
                'label'   => esc_html__( 'South Africa Address', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Isando Data Center Campus, 21 Electron Avenue, Isando, Johannesburg 1600, South Africa',
            )
        );

        $this->add_control(
            'card2_title',
            array(
                'label'   => esc_html__( 'Card 2 Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Colocation Campuses',
            )
        );

        $this->add_control(
            'card2_subtitle',
            array(
                'label'   => esc_html__( 'Card 2 Subtitle', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Primary Interconnection Hubs',
            )
        );

        $this->add_control(
            'card3_title',
            array(
                'label'   => esc_html__( 'Card 3 Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Support & Ticket Dispatch',
            )
        );

        $this->add_control(
            'card3_subtitle',
            array(
                'label'   => esc_html__( 'Card 3 Subtitle', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Secure Digital Channels Only',
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

        $c1_title = ! empty( $settings['card1_title'] ) ? $settings['card1_title'] : 'Registered Office Addresses';
        $c1_sub   = ! empty( $settings['card1_subtitle'] ) ? $settings['card1_subtitle'] : 'Operational & Corporate Sites';
        $uk_addr  = ! empty( $settings['uk_address'] ) ? $settings['uk_address'] : 'Streathbourne House, Redehall Road, Smallfield, Surrey, RH6 9QA, England, United Kingdom';
        $sa_addr  = ! empty( $settings['sa_address'] ) ? $settings['sa_address'] : 'Isando Data Center Campus, 21 Electron Avenue, Isando, Johannesburg 1600, South Africa';

        $c2_title = ! empty( $settings['card2_title'] ) ? $settings['card2_title'] : 'Colocation Campuses';
        $c2_sub   = ! empty( $settings['card2_subtitle'] ) ? $settings['card2_subtitle'] : 'Primary Interconnection Hubs';

        $c3_title = ! empty( $settings['card3_title'] ) ? $settings['card3_title'] : 'Support & Ticket Dispatch';
        $c3_sub   = ! empty( $settings['card3_subtitle'] ) ? $settings['card3_subtitle'] : 'Secure Digital Channels Only';
        ?>
        <section class="w-full bg-surface-ice py-12 lg:py-16 <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Left: Office Facilities & Addresses -->
                    <div class="lg:col-span-4 flex flex-col gap-6 bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-surface-ice text-deep-navy flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">domain</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold"><?php echo esc_html( $c1_title ); ?></h4>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php echo esc_html( $c1_sub ); ?></span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 pt-2">
                            <!-- Location 1: UK -->
                            <div class="flex flex-col gap-1">
                                <span class="font-label-ui text-label-ui text-deep-navy font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-optical-blue"></span>
                                    United Kingdom Operational Facility
                                </span>
                                <p class="font-body-sm text-body-sm text-on-surface-variant pl-3.5 leading-relaxed">
                                    <?php echo esc_html( $uk_addr ); ?>
                                </p>
                            </div>
                            <!-- Location 2: South Africa -->
                            <div class="flex flex-col gap-1">
                                <span class="font-label-ui text-label-ui text-deep-navy font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-optical-blue"></span>
                                    South Africa Core PoP &amp; NOC Facility
                                </span>
                                <p class="font-body-sm text-body-sm text-on-surface-variant pl-3.5 leading-relaxed">
                                    <?php echo esc_html( $sa_addr ); ?>
                                </p>
                            </div>
                        </div>
                        <div class="mt-auto pt-4 flex items-center gap-2 text-xs font-body-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-status-healthy text-sm">verified</span>
                            Facility visits available on pre-approved RFC authorization.
                        </div>
                    </div>

                    <!-- Middle: Data Center Campuses & PoP Locations -->
                    <div class="lg:col-span-4 flex flex-col gap-6 bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-surface-ice text-deep-navy flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">dns</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold"><?php echo esc_html( $c2_title ); ?></h4>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php echo esc_html( $c2_sub ); ?></span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 pt-2">
                            <div class="p-3.5 rounded-lg bg-surface-ice flex flex-col gap-1">
                                <span class="font-label-mono text-xs text-outline uppercase font-semibold">Africa Interconnect</span>
                                <span class="font-body-md text-sm text-deep-navy font-semibold">Isando Campus &amp; Teraco JB1, Johannesburg</span>
                                <span class="text-xs text-on-surface-variant">Direct NAPAfrica IXP peering cross-connects</span>
                            </div>
                            <div class="p-3.5 rounded-lg bg-surface-ice flex flex-col gap-1">
                                <span class="font-label-mono text-xs text-outline uppercase font-semibold">Europe Interconnect</span>
                                <span class="font-body-md text-sm text-deep-navy font-semibold">Telehouse North &amp; Equinix LD8, London</span>
                                <span class="text-xs text-on-surface-variant">Direct LINX &amp; LONAP peering cross-connects</span>
                            </div>
                            <div class="p-3.5 rounded-lg bg-surface-ice flex flex-col gap-1">
                                <span class="font-label-mono text-xs text-outline uppercase font-semibold">Continental Core</span>
                                <span class="font-body-md text-sm text-deep-navy font-semibold">Equinix FR5, Frankfurt</span>
                                <span class="text-xs text-on-surface-variant">Direct DE-CIX peering sessions</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Digital Dispatch & Portal Only (Zero Email/Phone) -->
                    <div class="lg:col-span-4 flex flex-col gap-6 bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-surface-ice text-deep-navy flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">shield_person</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold"><?php echo esc_html( $c3_title ); ?></h4>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php echo esc_html( $c3_sub ); ?></span>
                            </div>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                            To ensure cryptographic verification and contractual SLA tracking, all network tickets, quote requests, and emergency RFCs are handled exclusively through our encrypted online dispatch channels.
                        </p>
                        <div class="flex flex-col gap-3 font-body-sm text-body-sm pt-1">
                            <div class="p-3 rounded-lg border border-surface-container-high/60 flex items-center justify-between">
                                <span class="font-semibold text-on-surface flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-optical-blue">send</span>
                                    New Inquiry Dispatch:
                                </span>
                                <a class="font-label-ui text-xs font-bold text-optical-blue hover:underline" href="#contactForm">
                                    Use Web Form ↑
                                </a>
                            </div>
                            <div class="p-3 rounded-lg border border-surface-container-high/60 flex items-center justify-between">
                                <span class="font-semibold text-on-surface flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-optical-blue">login</span>
                                    Existing Client Queue:
                                </span>
                                <a class="font-label-ui text-xs font-bold text-optical-blue hover:underline" href="<?php echo esc_url( get_theme_mod( 'fg_header_client_portal_url', home_url( '/contact/#portal' ) ) ); ?>">
                                    Customer Portal →
                                </a>
                            </div>
                        </div>
                        <div class="mt-auto pt-2 flex items-center gap-2 text-xs font-body-sm text-status-healthy font-medium">
                            <span class="w-2 h-2 rounded-full bg-status-healthy"></span>
                            NOC Engineers On-Call 24/7/365
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
