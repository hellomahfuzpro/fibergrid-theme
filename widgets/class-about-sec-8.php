<?php
/**
 * Widget: About Us - Section 8 (FAQ)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec8 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_8';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 8 (FAQ)', 'fibergrid' );
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

        <section class="w-full bg-surface-container-lowest py-20 lg:py-28 border-t border-[#e2e8f0] fg-faq-section" id="faq">
            <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-16">
                    <h2 class="font-headline-xl text-3xl sm:text-4xl text-on-surface font-bold tracking-tight mb-2"><?php echo wp_kses_post( $title ); ?></h2>
                    <p class="font-body-md text-sm sm:text-base text-on-surface-variant font-medium">
                        Have another question ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-optical-blue font-medium hover:underline">Contact Engineering</a>
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start max-w-5xl mx-auto">
                    <div class="lg:col-span-3 flex lg:flex-col gap-2 overflow-x-auto lg:overflow-visible pb-2 lg:pb-0">
                        <div class="relative flex items-center py-2.5 px-4 font-headline-sm text-base lg:text-lg font-bold text-on-surface cursor-pointer">
                            <span class="absolute right-0 top-1/2 -translate-y-1/2 hidden lg:block w-1 h-8 bg-optical-blue rounded-full"></span>
                            General
                        </div>
                        <div class="py-2.5 px-4 font-headline-sm text-base lg:text-lg font-medium text-secondary hover:text-on-surface transition-colors cursor-pointer">
                            Company &amp; Roots
                        </div>
                        <div class="py-2.5 px-4 font-headline-sm text-base lg:text-lg font-medium text-secondary hover:text-on-surface transition-colors cursor-pointer">
                            Network Reach
                        </div>
                        <div class="py-2.5 px-4 font-headline-sm text-base lg:text-lg font-medium text-secondary hover:text-on-surface transition-colors cursor-pointer">
                            Compliance
                        </div>
                    </div>
                    <div class="lg:col-span-9 flex flex-col divide-y divide-surface-container">
                        <div class="py-6 first:pt-0">
                            <div class="flex items-start gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">—</span>
                                <h3 class="font-headline-sm text-base lg:text-lg font-bold text-on-surface">What is FiberGrid's core engineering focus?</h3>
                            </div>
                            <div class="mt-3 pl-8 pr-4 font-body-md text-body-sm lg:text-body-md text-on-surface-variant leading-relaxed">
                                <p>Founded over a decade ago, FiberGrid is an autonomous, privately owned telecommunications and data center provider delivering carrier-grade IP transit, sovereign colocation facilities, and optical interconnects across 15 countries and 4 continents.</p>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-base lg:text-lg font-bold text-on-surface">Why choose an autonomous privately owned provider over legacy conglomerates?</h3>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-base lg:text-lg font-bold text-on-surface">Where are FiberGrid's primary international interconnection points?</h3>
                            </div>
                        </div>
                        <div class="py-6">
                            <div class="flex items-center gap-4 cursor-pointer">
                                <span class="text-optical-blue font-bold text-2xl select-none leading-none">+</span>
                                <h3 class="font-headline-sm text-base lg:text-lg font-bold text-on-surface">What industry compliance and security standards are enforced?</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
