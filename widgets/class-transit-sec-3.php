<?php
/**
 * Widget: IP Transit - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_3';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 3', 'fibergrid' );
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
                'default' => esc_html__( 'Global Upstream Ecosystem', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Multi-Homed Direct Upstream &amp; IXP Cross-Connects',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Global Upstream Ecosystem';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Multi-Homed Direct Upstream &amp; IXP Cross-Connects';
        ?>

        <section class="w-full bg-surface-container-lowest py-16 px-margin-mobile lg:px-margin-desktop">
<div class="max-w-[1360px] mx-auto">
<div class="text-center max-w-xl mx-auto mb-10">
<span class="font-label-mono text-label-mono text-optical-blue uppercase tracking-widest font-bold"><?php echo esc_html( $eyebrow ); ?></span>
<h3 class="font-headline-md text-headline-md text-on-surface mt-1"><?php echo wp_kses_post( $title ); ?></h3>
</div>
<!-- Carrier Logos Badges -->
<div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4 items-center">
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">COGENT</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Tier-1 Transit</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">NTT</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Global IP Network</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">TELSTRA</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Subsea Optical</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">HE.NET</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Hurricane Electric</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">ZAYO</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Bandwidth Infra</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">DE-CIX</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Frankfurt / Dallas</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">NAPAfrica</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">IXP Teraco JB1/CT1</span>
</div>
<div class="p-4 rounded-xl bg-surface-ice flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-all">
<span class="font-headline-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">JINX</span>
<span class="text-[10px] font-label-mono text-on-surface-variant mt-1">Johannesburg IXP</span>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
