<?php
/**
 * Widget: About Us - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_3';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 3', 'fibergrid' );
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
                'default' => esc_html__( 'Operational Heritage', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Operational Heritage';
        ?>

        <section class="w-full bg-surface-ice py-12 lg:py-16">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Metric 1 -->
<div class="flex flex-col justify-between p-8 rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-6">
<span class="font-label-mono text-label-mono text-secondary uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></span>
<span class="material-symbols-outlined text-primary text-2xl">verified_user</span>
</div>
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy mb-1">10+ Years</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Founded in 2007; over a decade of carrier-neutral network resilience.</div>
</div>
<div class="w-full bg-surface-container h-1 mt-6 rounded-full overflow-hidden">
<div class="bg-optical-blue h-full w-full"></div>
</div>
</div>
<!-- Metric 2 -->
<div class="flex flex-col justify-between p-8 rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-6">
<span class="font-label-mono text-label-mono text-secondary uppercase tracking-wider">Sovereign Presence</span>
<span class="material-symbols-outlined text-optical-blue text-2xl">public</span>
</div>
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy mb-1">15 Countries</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Strategically routed facilities interconnected by dark fiber &amp; subsea links.</div>
</div>
<div class="w-full bg-surface-container h-1 mt-6 rounded-full overflow-hidden">
<div class="bg-cyan-pulse h-full w-4/5"></div>
</div>
</div>
<!-- Metric 3 -->
<div class="flex flex-col justify-between p-8 rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-6">
<span class="font-label-mono text-label-mono text-secondary uppercase tracking-wider">Global Reach</span>
<span class="material-symbols-outlined text-route-orange text-2xl">lan</span>
</div>
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy mb-1">4 Continents</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Seamless edge routes crossing Africa, Europe, North America &amp; APAC.</div>
</div>
<div class="w-full bg-surface-container h-1 mt-6 rounded-full overflow-hidden">
<div class="bg-route-orange h-full w-3/4"></div>
</div>
</div>
<!-- Metric 4 -->
<div class="flex flex-col justify-between p-8 rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-6">
<span class="font-label-mono text-label-mono text-secondary uppercase tracking-wider">Core Reliability</span>
<span class="material-symbols-outlined text-status-healthy text-2xl">speed</span>
</div>
<div>
<div class="font-tech-metric-lg text-tech-metric-lg text-deep-navy mb-1">100% Uptime</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Multi-terabit core routing backed by enforceable Tier-3 SLAs and guarantees.</div>
</div>
<div class="w-full bg-surface-container h-1 mt-6 rounded-full overflow-hidden">
<div class="bg-status-healthy h-full w-full"></div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
