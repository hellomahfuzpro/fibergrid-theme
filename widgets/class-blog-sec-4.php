<?php
/**
 * Widget: Blog - Section 4 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 4 (FAQ)', 'fibergrid' );
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

        <section class="w-full bg-white py-16 lg:py-24 my-10 border-t border-b border-grid-line/60 fg-faq-section" id="faq">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto">
                <!-- Centered Header -->
                <div class="text-center mb-16">
                    <h2 class="font-headline-xl text-3xl sm:text-4xl text-deep-navy font-bold tracking-tight mb-2">
                        <?php echo wp_kses_post( $title ); ?>
                    </h2>
                    <p class="font-body-md text-sm sm:text-base text-secondary font-medium">
                        Have another question ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-optical-blue font-semibold hover:underline">Contact Engineering</a>
                    </p>
                </div>

                <!-- 2-Column Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                    <!-- Left Navigation Column -->
                    <div class="lg:col-span-3 flex flex-col">
                        <nav class="flex flex-col border-r-0 lg:border-r border-grid-line/80 pr-0 lg:pr-6 relative">
                            <button class="flex items-center justify-between text-left py-3.5 px-3 font-semibold text-deep-navy text-[17px] group relative focus:outline-none transition-colors w-full">
                                <span>General</span>
                                <span class="hidden lg:block absolute -right-[25px] top-1/2 -translate-y-1/2 w-[3px] h-9 bg-optical-blue rounded-full"></span>
                            </button>
                            <button class="flex items-center justify-between text-left py-3.5 px-3 font-medium text-secondary hover:text-deep-navy text-[17px] focus:outline-none transition-colors w-full">
                                <span>Facility &amp; Power</span>
                            </button>
                            <button class="flex items-center justify-between text-left py-3.5 px-3 font-medium text-secondary hover:text-deep-navy text-[17px] focus:outline-none transition-colors w-full">
                                <span>Cross-Connects</span>
                            </button>
                            <button class="flex items-center justify-between text-left py-3.5 px-3 font-medium text-secondary hover:text-deep-navy text-[17px] focus:outline-none transition-colors w-full">
                                <span>Security &amp; Access</span>
                            </button>
                        </nav>
                    </div>

                    <!-- Right Accordion Column -->
                    <div class="lg:col-span-9 flex flex-col divide-y divide-grid-line/80">
                        <div class="py-6 first:pt-0">
                            <div class="flex items-start gap-4">
                                <span class="text-optical-blue font-bold text-[22px] leading-none select-none">—</span>
                                <div class="flex flex-col gap-3">
                                    <h3 class="font-headline-sm text-deep-navy text-[19px] sm:text-[20px] font-bold leading-snug">What colocation rack footprints are available?</h3>
                                    <p class="text-secondary font-body-md text-[15px] leading-relaxed">We offer standardized Quarter Racks (10U Secured), Half Racks (21U Partitioned), and Full Racks (42U Private Locking Cabinets) with dedicated A+B power feeds and metered distribution. For hyperscale or custom workloads, we design dedicated high-density private cages and pods scaling from 10kW to 40kW+ with modular hot/cold aisle containment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-[22px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-deep-navy text-[19px] sm:text-[20px] font-bold leading-snug hover:text-optical-blue transition-colors">What facility redundancy standards do you meet?</h3>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-[22px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-deep-navy text-[19px] sm:text-[20px] font-bold leading-snug hover:text-optical-blue transition-colors">Are remote hands and eyes services included?</h3>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4">
                                <span class="text-optical-blue font-bold text-[22px] leading-none select-none">+</span>
                                <h3 class="font-headline-sm text-deep-navy text-[19px] sm:text-[20px] font-bold leading-snug hover:text-optical-blue transition-colors">How do I schedule an on-site facility audit or hardware delivery?</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
