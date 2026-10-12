<?php
/**
 * Widget: Contact - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ContactSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_contact_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Contact - Section 1', 'fibergrid' );
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
                'default' => esc_html__( 'Target SLA', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'True Reliable Support That Can Be Easily Reached <span class="text-optical-blue">24 × 7</span>',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We want to ensure that you are able to easily access your mission-critical infrastructure, request rapid peering shifts, and resolve issues with direct access to senior Tier 3 network architects.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Target SLA';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'True Reliable Support That Can Be Easily Reached <span class="text-optical-blue">24 × 7</span>';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'We want to ensure that you are able to easily access your mission-critical infrastructure, request rapid peering shifts, and resolve issues with direct access to senior Tier 3 network architects.';
        ?>

        <section class="w-full bg-gradient-to-b from-surface-ice to-background py-10 lg:py-16">
<div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop">
<!-- Breadcrumb navigation -->

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-8 flex flex-col gap-4">
<div class="inline-flex items-center gap-2 self-start px-3 py-1 rounded-full bg-surface-container-high/60 backdrop-blur-sm">
<span class="w-2 h-2 rounded-full bg-status-healthy animate-ping"></span>

</div>
<h1 class="font-display-hero text-headline-xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
            <?php echo wp_kses_post( $title ); ?>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- NOC Visual / Telemetry Hero Graphic -->
<div class="lg:col-span-4 flex justify-center lg:justify-end">
<div class="relative w-full max-w-xs p-6 bg-surface-container-lowest rounded-xl shadow-md flex flex-col items-center text-center">
<!-- Ambient Glow Behind Graphic -->
<div class="absolute -top-6 -right-6 w-32 h-32 bg-optical-blue/10 rounded-full blur-2xl pointer-events-none"></div>
<div class="relative w-24 h-24 mb-4 rounded-full bg-surface-ice flex items-center justify-center">
<span class="material-symbols-outlined text-optical-blue text-5xl">support_agent</span>
<div class="absolute bottom-0 right-1 px-2 py-0.5 rounded-full bg-status-healthy text-on-primary font-label-mono text-[10px] font-bold shadow-sm">
                ONLINE
              </div>
</div>
<div class="font-headline-sm text-headline-sm text-on-surface font-semibold mb-1">
              Active NOC Duty
            </div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">
              Johannesburg &amp; London Network Operations Centers staffed around the clock.
            </p>
<div class="w-full grid grid-cols-2 gap-2 pt-3 bg-surface-ice rounded-lg p-2.5">
<div class="flex flex-col text-left">
<span class="font-label-mono text-[11px] text-outline uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<span class="font-tech-metric-md text-tech-metric-md text-deep-navy font-bold">&lt; 15 min</span>
</div>
<div class="flex flex-col text-left">
<span class="font-label-mono text-[11px] text-outline uppercase">Active Peers</span>
<span class="font-tech-metric-md text-tech-metric-md text-optical-blue font-bold">10+ Tier 1</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
