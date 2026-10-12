<?php
/**
 * Widget: IP Transit - Section 8
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec8 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_8';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 8', 'fibergrid' );
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
                'default' => esc_html__( 'The FiberGrid Standard', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Engineered For Ultra-High Performance',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Why leading enterprises, financial exchanges, and telecommunications providers trust FiberGrid with their core upstream connectivity.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'The FiberGrid Standard';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Engineered For Ultra-High Performance';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Why leading enterprises, financial exchanges, and telecommunications providers trust FiberGrid with their core upstream connectivity.';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 px-margin-mobile lg:px-margin-desktop">
<div class="max-w-[1360px] mx-auto">
<div class="text-center max-w-2xl mx-auto mb-16">
<span class="font-label-mono text-label-mono text-optical-blue font-bold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-on-surface mt-2"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-3"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Feature Mosaic -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<div class="p-6 rounded-2xl bg-surface-ice flex flex-col gap-4">
<div class="w-12 h-12 rounded-xl bg-optical-blue/10 text-optical-blue flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">verified</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">100% SLA Guarantee</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Zero excuses. Our enterprise SLA covers packet delivery, network latency, and continuous uptime backed by financial credits.
          </p>
</div>
<div class="p-6 rounded-2xl bg-surface-ice flex flex-col gap-4">
<div class="w-12 h-12 rounded-xl bg-optical-blue/10 text-optical-blue flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">shield_with_heart</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">7-Day Risk-Free Trial</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Try our IP Transit service risk-free. If routing latency doesn't outperform your incumbent provider, cancel within 7 days.
          </p>
</div>
<div class="p-6 rounded-2xl bg-surface-ice flex flex-col gap-4">
<div class="w-12 h-12 rounded-xl bg-optical-blue/10 text-optical-blue flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">support_agent</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">24/7 Majestic NOC</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Connect directly with Tier-3 network engineers. No tier-1 call center script reading when managing your critical BGP sessions.
          </p>
</div>
<div class="p-6 rounded-2xl bg-surface-ice flex flex-col gap-4">
<div class="w-12 h-12 rounded-xl bg-optical-blue/10 text-optical-blue flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">cable</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Cross-Connect Setup</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Direct MMR jumper cables provisioned at Teraco (JB1, CT1, DB1), Equinix, and Telehouse with zero markup on facility handoffs.
          </p>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
