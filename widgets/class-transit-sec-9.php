<?php
/**
 * Widget: IP Transit - Section 9 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec9 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_9';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 9 (FAQ)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-help-o';
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
                'default' => 'Have a question ? Look here ...',
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
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Have a question ? Look here ...';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 px-margin-mobile lg:px-margin-desktop border-t border-[#e2e8f0] fg-faq-section" id="faq">
            <div class="max-w-[1360px] mx-auto">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="font-headline-xl text-headline-xl text-on-surface font-bold"><?php echo wp_kses_post( $title ); ?></h2>
                    <p class="font-body-md text-body-sm text-on-surface-variant mt-2">
                        Have another question ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-optical-blue underline hover:text-primary transition-colors font-medium">Contact Engineering</a>
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start max-w-5xl mx-auto">
                    <div class="lg:col-span-3 flex lg:flex-col gap-2 overflow-x-auto pb-2">
                        <button type="button" class="flex items-center gap-4 text-left px-4 py-3 relative font-semibold text-on-surface group">
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-optical-blue rounded-r"></span>
                            <span class="font-headline-sm text-base">General</span>
                        </button>
                        <button type="button" class="flex items-center gap-4 text-left px-4 py-3 relative font-medium text-on-surface-variant hover:text-primary transition-colors">
                            <span class="font-headline-sm text-base">BGP Routing</span>
                        </button>
                        <button type="button" class="flex items-center gap-4 text-left px-4 py-3 relative font-medium text-on-surface-variant hover:text-primary transition-colors">
                            <span class="font-headline-sm text-base">Transit Pricing</span>
                        </button>
                        <button type="button" class="flex items-center gap-4 text-left px-4 py-3 relative font-medium text-on-surface-variant hover:text-primary transition-colors">
                            <span class="font-headline-sm text-base">SLA &amp; Delivery</span>
                        </button>
                    </div>
                    <div class="lg:col-span-9 flex flex-col gap-8">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">—</span>
                                <h3 class="font-headline-sm text-lg md:text-xl font-bold text-on-surface">What is Carrier-Grade IP Transit ?</h3>
                            </div>
                            <p class="font-body-md text-on-surface-variant leading-relaxed text-sm md:text-base pl-8">Carrier-Grade IP Transit provides uncompressed, deterministic high-speed bandwidth with direct multi-homed BGP sessions to 9+ global Tier-1 backbones. Engineered for mission-critical networks, it ensures autonomous route failover, minimum latency pathing across African and subsea fabrics, and 100% SLA packet-delivery commitment without shared contention.</p>
                        </div>
                        <div class="flex flex-col gap-3 pt-2">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-lg md:text-xl font-bold text-on-surface">What is your network SLA for uptime and packet loss ?</h3>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pt-2">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-lg md:text-xl font-bold text-on-surface">Can I peer directly with my own ASN and custom BGP communities ?</h3>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pt-2">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-lg md:text-xl font-bold text-on-surface">How quickly can a 10G or 100G port commit be provisioned ?</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
