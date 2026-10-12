<?php
/**
 * Widget: Colocation - Section 9 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec9 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_9';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 9 (FAQ)', 'fibergrid' );
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

        <section class="w-full bg-surface-container-lowest py-20 lg:py-24 border-t border-grid-line/60 fg-faq-section" id="faq">
            <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="flex flex-col items-center text-center gap-2 mb-16">
                    <h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold tracking-tight"><?php echo wp_kses_post( $title ); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Have another question ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-optical-blue hover:underline font-medium">Contact Engineering</a>
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                    <div class="lg:col-span-3 flex lg:flex-col gap-1 border-b lg:border-b-0 lg:border-r border-grid-line/60 pb-4 lg:pb-0 relative">
                        <button class="flex items-center justify-between text-left px-5 py-3 text-deep-navy font-bold text-headline-sm relative bg-surface-ice/40 lg:bg-transparent rounded-lg lg:rounded-none">
                            <span class="flex items-center gap-2">General</span>
                            <span class="hidden lg:block absolute -right-[1px] top-0 bottom-0 w-1 bg-optical-blue"></span>
                        </button>
                        <button class="flex items-center justify-between text-left px-5 py-3 text-on-surface-variant hover:text-deep-navy font-medium text-body-md transition-colors">
                            <span>Facility &amp; Power</span>
                        </button>
                        <button class="flex items-center justify-between text-left px-5 py-3 text-on-surface-variant hover:text-deep-navy font-medium text-body-md transition-colors">
                            <span>Cross-Connects</span>
                        </button>
                        <button class="flex items-center justify-between text-left px-5 py-3 text-on-surface-variant hover:text-deep-navy font-medium text-body-md transition-colors">
                            <span>Security &amp; Access</span>
                        </button>
                    </div>
                    <div class="lg:col-span-9 flex flex-col gap-6">
                        <div class="flex flex-col pb-6 border-b border-grid-line/60">
                            <div class="flex items-start gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-[22px] leading-none select-none">—</span>
                                <div class="flex flex-col gap-3">
                                    <h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">What colocation rack footprints are available?</h3>
                                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">We offer standardized Quarter Racks (10U Secured), Half Racks (21U Partitioned), and Full Racks (42U Private Locking Cabinets) with dedicated A+B power feeds and metered distribution. For hyperscale or custom workloads, we design dedicated high-density private cages and pods scaling from 10kW to 40kW+ with modular hot/cold aisle containment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col pb-6 border-b border-grid-line/60">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-[24px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold hover:text-primary transition-colors">What facility redundancy standards do you meet?</h3>
                            </div>
                        </div>
                        <div class="flex flex-col pb-6 border-b border-grid-line/60">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-[24px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold hover:text-primary transition-colors">Are remote hands and eyes services included?</h3>
                            </div>
                        </div>
                        <div class="flex flex-col pb-6 border-b border-grid-line/60">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-[24px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold hover:text-primary transition-colors">How do I schedule an on-site facility audit or hardware delivery?</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
