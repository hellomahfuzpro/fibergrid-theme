<?php
/**
 * Widget: Blog Single - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 4', 'fibergrid' );
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
                'default' => esc_html__( 'Knowledge Hub', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Related Engineering Insights',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Knowledge Hub';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Related Engineering Insights';
        ?>

        <section class="w-full bg-surface-ice py-16 border-t border-grid-line">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
                    <div>
                        <span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider block mb-1"><?php echo esc_html( $eyebrow ); ?></span>
                        <h2 class="font-headline-lg text-headline-lg text-deep-navy font-bold"><?php echo wp_kses_post( $title ); ?></h2>
                    </div>
                    <a class="inline-flex items-center gap-1.5 font-label-ui text-label-ui text-primary font-semibold hover:underline" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
                        <span>Browse all technical articles</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
                <!-- 3 Card Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <article class="bg-surface-container-lowest rounded-xl border border-grid-line p-6 flex flex-col justify-between hover:shadow-xl hover:border-primary/40 transition-all group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="font-label-mono text-[11px] font-semibold text-primary uppercase bg-primary/10 px-2 py-0.5 rounded">Routing Optimization</span>
                                <span class="font-label-mono text-[11px] text-secondary">6 min read</span>
                            </div>
                            <h3 class="font-headline-sm text-[18px] text-deep-navy font-bold group-hover:text-primary transition-colors leading-snug">
                                Optimizing BGP Multi-Homed Convergence for Sub-15ms Regional Metro Latency
                            </h3>
                            <p class="font-body-sm text-body-sm text-secondary mt-2.5 line-clamp-3">
                                An architectural breakdown of community tagging, route reflectors, and customized weight parameters across dual Tier 1 internet exchanges.
                            </p>
                        </div>
                        <div class="pt-5 mt-6 border-t border-grid-line flex items-center justify-between text-secondary font-label-ui text-label-ui">
                            <span class="text-xs">By Marco Richter</span>
                            <span class="material-symbols-outlined text-[18px] text-primary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </article>
                    <!-- Card 2 -->
                    <article class="bg-surface-container-lowest rounded-xl border border-grid-line p-6 flex flex-col justify-between hover:shadow-xl hover:border-primary/40 transition-all group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="font-label-mono text-[11px] font-semibold text-tertiary uppercase bg-tertiary/10 px-2 py-0.5 rounded">Data Center Facilities</span>
                                <span class="font-label-mono text-[11px] text-secondary">9 min read</span>
                            </div>
                            <h3 class="font-headline-sm text-[18px] text-deep-navy font-bold group-hover:text-primary transition-colors leading-snug">
                                Tier III Colocation Power Efficiency &amp; Hot-Aisle Containment Dynamics
                            </h3>
                            <p class="font-body-sm text-body-sm text-secondary mt-2.5 line-clamp-3">
                                How high-density 30kW server racks leverage localized micro-climate loops to maintain strict 1.15 PUE ratings under constant high computational load.
                            </p>
                        </div>
                        <div class="pt-5 mt-6 border-t border-grid-line flex items-center justify-between text-secondary font-label-ui text-label-ui">
                            <span class="text-xs">By Elena Rostova</span>
                            <span class="material-symbols-outlined text-[18px] text-primary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </article>
                    <!-- Card 3 -->
                    <article class="bg-surface-container-lowest rounded-xl border border-grid-line p-6 flex flex-col justify-between hover:shadow-xl hover:border-primary/40 transition-all group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="font-label-mono text-[11px] font-semibold text-route-orange uppercase bg-route-orange/10 px-2 py-0.5 rounded">Subsea Maps</span>
                                <span class="font-label-mono text-[11px] text-secondary">5 min read</span>
                            </div>
                            <h3 class="font-headline-sm text-[18px] text-deep-navy font-bold group-hover:text-primary transition-colors leading-snug">
                                Subsea Cable Route Map 2025: Transatlantic Capacity Outlook
                            </h3>
                            <p class="font-body-sm text-body-sm text-secondary mt-2.5 line-clamp-3">
                                Forecasting intercontinental spectral demand, fiber pair allocations, and new submarine landing rights across North America and Western Europe.
                            </p>
                        </div>
                        <div class="pt-5 mt-6 border-t border-grid-line flex items-center justify-between text-secondary font-label-ui text-label-ui">
                            <span class="text-xs">By Dr. Alistair Vance</span>
                            <span class="material-symbols-outlined text-[18px] text-primary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <?php
    }
}
