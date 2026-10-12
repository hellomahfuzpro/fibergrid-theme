<?php
/**
 * Widget: Home - Section 1 (Hero with Tagline, Disclaimer & Full Elementor Controls)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 1 (Hero & Disclaimer)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    protected function register_controls() {
        // CONTENT SECTION: Hero Main
        $this->start_controls_section(
            'section_content_hero',
            array(
                'label' => esc_html__( 'Hero Content', 'fibergrid' ),
            )
        );

        $this->add_control(
            'hero_tagline',
            array(
                'label'       => esc_html__( 'Hero Tagline / Category', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'IP Transit & Colocation for Networks.',
                'placeholder' => 'IP Transit & Colocation for Networks.',
            )
        );

        $this->add_control(
            'hero_title',
            array(
                'label'       => esc_html__( 'Headline', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 2,
                'default'     => 'Ultra Low-Latency <span class="text-[#0066ff]">IP Transit</span> & Global Data Center Infrastructure.',
            )
        );

        $this->add_control(
            'hero_description',
            array(
                'label'       => esc_html__( 'Description', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => 'Powering mission-critical connectivity and enterprise colocation across 15 countries and 4 continents with direct Tier 1 backbone routing.',
            )
        );

        $this->add_control(
            'btn_text',
            array(
                'label'       => esc_html__( 'Button Text', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Explore Infrastructure',
            )
        );

        $this->add_control(
            'btn_link',
            array(
                'label'       => esc_html__( 'Button Link', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => array(
                    'url'         => '#pricing-matrix',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'hero_image',
            array(
                'label'   => esc_html__( 'Hero Map / Network Graphic', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCVKahf9TfN1WWe9FjpOpsjZICiDBVo4vRnaQPhKJ7FUIX7CYyx-jhJPfvDVd8x0ODI4BIOkTIYNv_IPTsDDpnebhXT1k1690Adiu_f10EUGCCmZoPP_UBYXpw7AVe-hCvjEbZThpRDKEqgLdfpouqH3aPqzvtQvsdcGbtagkGB6ljuAqWVb-Z-kjJX4D3uFMh8duf8vamLmiLYZ2sE4IDvIzDOTgIzPUvc5To4CYhG7kECDyrFWbPNRQ',
                ),
            )
        );

        $repeater_regions = new \Elementor\Repeater();
        $repeater_regions->add_control(
            'region_name',
            array(
                'label'   => esc_html__( 'Region Name', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Europe',
            )
        );
        $repeater_regions->add_control(
            'is_active',
            array(
                'label'        => esc_html__( 'Active Highlight', 'fibergrid' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'no',
            )
        );

        $this->add_control(
            'regions_list',
            array(
                'label'       => esc_html__( 'Region Badges', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater_regions->get_controls(),
                'default'     => array(
                    array( 'region_name' => 'Europe', 'is_active' => 'no' ),
                    array( 'region_name' => 'North America', 'is_active' => 'no' ),
                    array( 'region_name' => 'Asia Pacific', 'is_active' => 'yes' ),
                ),
                'title_field' => '{{{ region_name }}}',
            )
        );

        $this->end_controls_section();

        // CONTENT SECTION: Homepage Disclaimer
        $this->start_controls_section(
            'section_content_disclaimer',
            array(
                'label' => esc_html__( 'Homepage Disclaimer Callout', 'fibergrid' ),
            )
        );

        $this->add_control(
            'show_disclaimer',
            array(
                'label'        => esc_html__( 'Show Operator Disclaimer', 'fibergrid' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            )
        );

        $this->add_control(
            'disclaimer_badge',
            array(
                'label'   => esc_html__( 'Disclaimer Badge', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'OPERATOR SCOPE NOTICE',
            )
        );

        $this->add_control(
            'disclaimer_text',
            array(
                'label'   => esc_html__( 'Disclaimer Notice Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => 'We are a network operator, not a hosting company. We provide IP transit and colocation to ISPs, hosting providers, and enterprises. We do not offer web hosting, dedicated servers, VPS, domain registration, or website support.',
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

        $tagline     = ! empty( $settings['hero_tagline'] ) ? $settings['hero_tagline'] : 'IP Transit & Colocation for Networks.';
        $title       = ! empty( $settings['hero_title'] ) ? $settings['hero_title'] : 'Ultra Low-Latency <span class="text-[#0066ff]">IP Transit</span> & Global Data Center Infrastructure.';
        $desc        = ! empty( $settings['hero_description'] ) ? $settings['hero_description'] : 'Powering mission-critical connectivity and enterprise colocation across 15 countries and 4 continents with direct Tier 1 backbone routing.';
        $btn_text    = ! empty( $settings['btn_text'] ) ? $settings['btn_text'] : 'Explore Infrastructure';
        $btn_link    = ! empty( $settings['btn_link'] ) ? $settings['btn_link'] : array( 'url' => '#pricing-matrix' );
        $default_map = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCVKahf9TfN1WWe9FjpOpsjZICiDBVo4vRnaQPhKJ7FUIX7CYyx-jhJPfvDVd8x0ODI4BIOkTIYNv_IPTsDDpnebhXT1k1690Adiu_f10EUGCCmZoPP_UBYXpw7AVe-hCvjEbZThpRDKEqgLdfpouqH3aPqzvtQvsdcGbtagkGB6ljuAqWVb-Z-kjJX4D3uFMh8duf8vamLmiLYZ2sE4IDvIzDOTgIzPUvc5To4CYhG7kECDyrFWbPNRQ';

        $regions = ! empty( $settings['regions_list'] ) ? $settings['regions_list'] : array(
            array( 'region_name' => 'Europe', 'is_active' => 'no' ),
            array( 'region_name' => 'North America', 'is_active' => 'no' ),
            array( 'region_name' => 'Asia Pacific', 'is_active' => 'yes' ),
        );

        $show_disclaimer  = ( 'yes' === ( $settings['show_disclaimer'] ?? 'yes' ) );
        $disclaimer_badge = ! empty( $settings['disclaimer_badge'] ) ? $settings['disclaimer_badge'] : 'OPERATOR SCOPE NOTICE';
        $disclaimer_text  = ! empty( $settings['disclaimer_text'] ) ? $settings['disclaimer_text'] : 'We are a network operator, not a hosting company. We provide IP transit and colocation to ISPs, hosting providers, and enterprises. We do not offer web hosting, dedicated servers, VPS, domain registration, or website support.';
        ?>
        <section class="relative w-full overflow-hidden pt-space-xl lg:pt-space-2xl pb-space-2xl bg-white <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <!-- Ambient decorative glow -->
            <div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-primary/10 blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/4 right-0 w-[550px] h-[550px] rounded-full bg-cyan-pulse/10 blur-[120px] pointer-events-none"></div>
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1400px] mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center min-h-[540px]">
                    <!-- Left Column: Hero Content & Disclaimer -->
                    <div class="lg:col-span-6 flex flex-col gap-space-md z-10">
                        <!-- Region Selectors / Badges -->
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <?php foreach ( $regions as $r ) : ?>
                                <?php if ( ! empty( $r['is_active'] ) && 'yes' === $r['is_active'] ) : ?>
                                    <span class="px-3.5 py-1.5 rounded-md bg-[#0066ff] text-white font-semibold text-xs shadow-sm select-none">
                                        <?php echo esc_html( $r['region_name'] ); ?>
                                    </span>
                                <?php else : ?>
                                    <span class="px-3.5 py-1.5 rounded-md bg-[#eff4ff] text-[#0066ff] font-semibold text-xs select-none">
                                        <?php echo esc_html( $r['region_name'] ); ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <!-- Hero Tagline / Category -->
                        <div class="font-label-mono text-xs text-on-surface-variant font-bold uppercase tracking-wider mt-2">
                            <?php echo esc_html( $tagline ); ?>
                        </div>

                        <!-- Bold Clean Headline -->
                        <h1 class="text-4xl sm:text-5xl lg:text-[44px] font-black tracking-tight text-[#0b1c30] leading-[1.15]">
                            <?php echo wp_kses_post( $title ); ?>
                        </h1>

                        <!-- Clean Readable Description -->
                        <p class="text-base text-on-surface-variant leading-relaxed max-w-lg">
                            <?php echo esc_html( $desc ); ?>
                        </p>

                        <!-- Primary CTA Button -->
                        <div class="pt-2">
                            <?php
                            $this->render_button(
                                $btn_text,
                                $btn_link,
                                'inline-flex items-center justify-center px-6 py-3 rounded-lg bg-[#0066ff] text-white font-semibold text-sm shadow-md hover:bg-blue-600 transition-all'
                            );
                            ?>
                        </div>

                        <!-- Prominent Homepage Disclaimer Banner -->
                        <?php if ( $show_disclaimer ) : ?>
                            <div class="mt-4 p-4 sm:p-5 rounded-xl border border-amber-200/80 bg-amber-50/70 shadow-sm max-w-lg">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <span class="material-symbols-outlined text-amber-600 text-lg">info</span>
                                    <span class="font-label-mono text-[11px] font-bold uppercase tracking-wider text-amber-800">
                                        <?php echo esc_html( $disclaimer_badge ); ?>
                                    </span>
                                </div>
                                <p class="text-xs sm:text-[13px] text-amber-950/85 leading-relaxed font-medium">
                                    <?php echo esc_html( $disclaimer_text ); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right Column: Interconnected World Map Graphic -->
                    <div class="lg:col-span-6 relative flex items-center justify-center w-full min-h-[420px] sm:min-h-[500px]">
                        <div class="relative w-full rounded-2xl overflow-hidden border border-slate-100 bg-white group flex items-center justify-center p-2 sm:p-4">
                            <?php
                            $this->render_media(
                                $settings['hero_image'] ?? array(),
                                $default_map,
                                'FiberGrid Worldwide Low-Latency Map Network',
                                'w-full h-auto max-h-[440px] object-contain rounded-xl'
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
