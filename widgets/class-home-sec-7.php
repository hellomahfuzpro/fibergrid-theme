<?php
/**
 * Widget: Home - Section 7
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec7 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_7';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 7', 'fibergrid' );
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
                'default' => esc_html__( 'Why Enterprise Leaders Choose Us', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Total Resilience By Design',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We combine carrier-grade physical facilities with proactive human expertise to eliminate single points of failure.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Why Enterprise Leaders Choose Us';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Total Resilience By Design';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'We combine carrier-grade physical facilities with proactive human expertise to eliminate single points of failure.';
        ?>

        <section class="w-full py-space-3xl bg-background">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1320px] mx-auto">
<div class="text-center max-w-2xl mx-auto mb-space-2xl">
<span class="font-label-mono text-label-mono uppercase text-primary font-bold"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold mt-1"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
<!-- Feature 1 -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-primary mb-space-md">
<span class="material-symbols-outlined text-headline-sm">verified_user</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-deep-navy font-bold">100% Network Uptime</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
            Multi-homed mesh architecture with automated BGP convergence ensures non-stop routing during cable cuts or upstream outages.
          </p>
</div>
<!-- Feature 2 -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-status-healthy mb-space-md">
<span class="material-symbols-outlined text-headline-sm">currency_exchange</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-deep-navy font-bold">7-Day Risk-Free Guarantee</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
            Try our IP Transit and Cloud compute risk-free with our 7-day money-back guarantee without any questions asked.
          </p>
</div>
<!-- Feature 3 -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-route-orange mb-space-md">
<span class="material-symbols-outlined text-headline-sm">swap_driving_apps</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-deep-navy font-bold">Free Rack Migration</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
            Seamless physical hardware relocation and structured cross-connect cabling managed by FiberGrid engineers with zero downtime.
          </p>
</div>
<!-- Feature 4 -->
<div class="p-space-lg rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center text-cyan-pulse mb-space-md">
<span class="material-symbols-outlined text-headline-sm">support_agent</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-deep-navy font-bold">24/7 Dedicated Tier-3 NOC</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">
            Connect directly with experienced network and system architects in seconds, not level-1 call center script readers.
          </p>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
