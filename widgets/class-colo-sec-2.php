<?php
/**
 * Widget: Colocation - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_2';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 2', 'fibergrid' );
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
                'default' => esc_html__( '{ Tier III-Compatible Data Center Colocation }', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Mission-Critical Colocation Built to <span class="text-optical-blue">TIA-942 Standards.</span>',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Secure, resilient, and carrier-neutral digital infrastructure engineered for enterprises operating mission-critical workloads. Deploy custom server suites across 15 countries and 4 continents with redundant A+B utility power, UPS battery banks, Cummins diesel generators, and strict biometric defense.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Book a Facility Visit', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#facility-booking',
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
                'default' => esc_html__( 'Configure Colocation Rack', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#pricing-matrix',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'hero_image',
            array(
                'label'   => esc_html__( 'Hero Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/colocation-hero.jpg',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '{ Tier III-Compatible Data Center Colocation }';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Mission-Critical Colocation Built to <span class="text-optical-blue">TIA-942 Standards.</span>';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Secure, resilient, and carrier-neutral digital infrastructure engineered for enterprises operating mission-critical workloads. Deploy custom server suites across 15 countries and 4 continents with redundant A+B utility power, UPS battery banks, Cummins diesel generators, and strict biometric defense.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Book a Facility Visit';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '#facility-booking';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Configure Colocation Rack';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#pricing-matrix';
        $hero_img  = ! empty( $settings['hero_image']['url'] ) ? $settings['hero_image']['url'] : $theme_uri . '/assets/images/colocation-hero.jpg';
        ?>

        <section class="relative w-full bg-surface-container-lowest overflow-hidden py-16 lg:py-24">
            <!-- Ambient Optical Glow & Subsurface Gridlines -->
            <div class="absolute -top-32 right-0 w-[640px] h-[640px] bg-gradient-to-br from-optical-blue/10 via-cyan-pulse/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-10 w-[420px] h-[420px] bg-surface-container-high/40 rounded-full blur-2xl pointer-events-none"></div>
            <div class="relative max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    <!-- Left Hero Copy -->
                    <div class="lg:col-span-7 flex flex-col gap-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-surface-ice text-primary w-fit shadow-sm">
                            <span class="material-symbols-outlined text-[16px] text-optical-blue" style="font-variation-settings: &quot;FILL&quot; 1;">verified</span>
                            <span class="font-label-mono text-label-mono tracking-wider font-bold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <h1 class="font-display-hero text-display-hero text-deep-navy tracking-tight leading-[1.08]">
                                <?php echo wp_kses_post( $title ); ?>
                            </h1>
                            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl pt-2 leading-relaxed"><?php echo esc_html( $desc ); ?></p>
                        </div>
                        <!-- CTAs -->
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-lg hover:shadow-optical-blue/30 hover:bg-primary transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
                                <span class="material-symbols-outlined text-[18px]">event_available</span>
                                <?php echo esc_html( $btn1_text ); ?>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                            <a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-lg bg-surface-ice text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container-high transition-colors shadow-sm" href="<?php echo esc_url( $btn2_url ); ?>">
                                <span class="material-symbols-outlined text-[18px] text-optical-blue">tune</span>
                                <?php echo esc_html( $btn2_text ); ?>
                            </a>
                        </div>
                        <!-- Feature Badges -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-6 border-t border-grid-line/80">
                            <div class="flex items-center gap-2 text-deep-navy">
                                <span class="material-symbols-outlined text-optical-blue text-[20px]">verified_user</span>
                                <span class="font-label-ui text-label-ui font-semibold">TIA-942 Rated 3</span>
                            </div>
                            <div class="flex items-center gap-2 text-deep-navy">
                                <span class="material-symbols-outlined text-optical-blue text-[20px]">ac_unit</span>
                                <span class="font-label-ui text-label-ui font-semibold">N+1 Cooling</span>
                            </div>
                            <div class="flex items-center gap-2 text-deep-navy">
                                <span class="material-symbols-outlined text-optical-blue text-[20px]">bolt</span>
                                <span class="font-label-ui text-label-ui font-semibold">Dual 32A A+B Feeds</span>
                            </div>
                            <div class="flex items-center gap-2 text-deep-navy">
                                <span class="material-symbols-outlined text-optical-blue text-[20px]">support_agent</span>
                                <span class="font-label-ui text-label-ui font-semibold">24/7 Remote Hands</span>
                            </div>
                        </div>
                    </div>
                    <!-- Right Visual Showcase / Modern Glass Server Enclosure -->
                    <div class="lg:col-span-5 relative h-full min-h-[420px] flex items-stretch">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-slate-surface border border-grid-line/60 h-full min-h-[420px] flex flex-col items-stretch w-full">
                            <img src="<?php echo esc_url( $hero_img ); ?>" alt="Modern enterprise colocation data center facility" class="w-full h-full object-cover rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-midnight-bg via-transparent to-transparent pointer-events-none"></div>
                        </div>
                        <div class="hidden sm:flex absolute -top-5 -right-4 px-4 py-2.5 rounded-xl bg-surface-container-lowest shadow-xl items-center gap-3">
                            <span class="material-symbols-outlined text-route-orange text-[22px]">hub</span>
                            <div>
                                <div class="font-label-ui text-[12px] font-bold text-deep-navy">Carrier Neutral Mesh</div>
                                <div class="font-body-sm text-[11px] text-on-surface-variant">50+ Upstream Fiber Providers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
