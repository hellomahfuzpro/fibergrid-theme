<?php
/**
 * Widget: About Us - Section 7
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec7 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_7';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 7', 'fibergrid' );
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
                'default' => esc_html__( 'Carrier Ecosystem', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Tier-1 Transit Partners &amp; Industry Standards',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We maintain direct peering relations and transit interconnects with the world’s leading Tier-1 carriers to guarantee the shortest AS-path hop count worldwide.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Carrier Ecosystem';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Tier-1 Transit Partners &amp; Industry Standards';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'We maintain direct peering relations and transit interconnects with the world’s leading Tier-1 carriers to guarantee the shortest AS-path hop count worldwide.';
        ?>

        <section class="w-full bg-surface-container-low py-16 lg:py-24">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-14">
<span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-4"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Carrier Monochromatic Logos Ribbon -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-items-center mb-16">
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          COGENT
        </div>
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          ZAYO
        </div>
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          NTT COMMS
        </div>
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          TELIA / ARENION
        </div>
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          HE.NET (AS6939)
        </div>
<div class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all">
          TATA COMM
        </div>
</div>
<!-- Compliance & Standard Badges Bento -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex items-start gap-4">
<div class="p-3 rounded-lg bg-surface-container-low text-primary shrink-0">
<span class="material-symbols-outlined text-2xl">verified</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">TIA-942 Tier III</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Concurrently maintainable site infrastructure with dual independent power distributions and redundant precision chillers.</p>
</div>
</div>
<div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex items-start gap-4">
<div class="p-3 rounded-lg bg-surface-container-low text-status-healthy shrink-0">
<span class="material-symbols-outlined text-2xl">lock</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">ISO/IEC 27001</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Enterprise information security management governing physical access controls, perimeter surveillance, and cage containment.</p>
</div>
</div>
<div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex items-start gap-4">
<div class="p-3 rounded-lg bg-surface-container-low text-optical-blue shrink-0">
<span class="material-symbols-outlined text-2xl">route</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">BGP4 &amp; IPv6 Ready</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Full dual-stack IPv4/IPv6 allocation across all POPs with granular BGP community control for custom route engineering.</p>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
