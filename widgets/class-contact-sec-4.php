<?php
/**
 * Widget: Contact - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ContactSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_contact_sec_4';
    }

    public function get_title() {
        return esc_html__( 'Contact - Section 4', 'fibergrid' );
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
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Immediate ticket triage by accredited Juniper and Cisco certified network engineers.', 'fibergrid' ),
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
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Immediate ticket triage by accredited Juniper and Cisco certified network engineers.';
        ?>

        <section class="w-full bg-deep-navy text-on-primary py-12 lg:py-16 relative overflow-hidden">
<div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop relative z-10">
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="flex items-start gap-4 p-4 rounded-xl bg-midnight-bg/60 backdrop-blur-sm">
<div class="w-12 h-12 rounded-xl bg-optical-blue/20 text-sky-bright flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-2xl">timer</span>
</div>
<div class="flex flex-col">
<span class="font-tech-metric-md text-tech-metric-md text-on-primary font-bold mb-1">&lt; 15 Min SLA</span>
<span class="font-label-ui text-label-ui text-sky-bright font-semibold mb-1">Guaranteed Response Time</span>
<p class="font-body-sm text-body-sm text-surface-container-high/80"><?php echo esc_html( $desc ); ?></p>
</div>
</div>
<div class="flex items-start gap-4 p-4 rounded-xl bg-midnight-bg/60 backdrop-blur-sm">
<div class="w-12 h-12 rounded-xl bg-optical-blue/20 text-sky-bright flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-2xl">verified_user</span>
</div>
<div class="flex flex-col">
<span class="font-tech-metric-md text-tech-metric-md text-on-primary font-bold mb-1">100% Uptime</span>
<span class="font-label-ui text-label-ui text-sky-bright font-semibold mb-1">Core Backbone SLA</span>
<p class="font-body-sm text-body-sm text-surface-container-high/80">
              Dual-ring redundancy across top Tier 1 carrier paths, UPS backups and N+1 power generation.
            </p>
</div>
</div>
<div class="flex items-start gap-4 p-4 rounded-xl bg-midnight-bg/60 backdrop-blur-sm">
<div class="w-12 h-12 rounded-xl bg-optical-blue/20 text-sky-bright flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-2xl">handyman</span>
</div>
<div class="flex flex-col">
<span class="font-tech-metric-md text-tech-metric-md text-on-primary font-bold mb-1">Remote Hands</span>
<span class="font-label-ui text-label-ui text-sky-bright font-semibold mb-1">Physical Onsite Eyes &amp; Hands</span>
<p class="font-body-sm text-body-sm text-surface-container-high/80">
              Rapid physical disk swaps, cable cross-connect verification, and power cycles at our data centers.
            </p>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
