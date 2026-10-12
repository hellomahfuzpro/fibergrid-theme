<?php
/**
 * Widget: Home - Section 8
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec8 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_8';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 8', 'fibergrid' );
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
                'default' => esc_html__( 'Enterprise Endorsements', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'See What Our Customers Have To Say',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Trusted by developers, systems administrators, and infrastructure leaders across multiple continents.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Enterprise Endorsements';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'See What Our Customers Have To Say';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Trusted by developers, systems administrators, and infrastructure leaders across multiple continents.';
        ?>

        <section class="w-full py-space-3xl bg-surface-container-low">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1320px] mx-auto">
<div class="text-center max-w-2xl mx-auto mb-space-2xl">
<span class="font-label-mono text-label-mono uppercase text-primary font-bold"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy font-bold mt-1"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg"><div class="p-space-xl rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between"><div><div class="flex items-center gap-1 text-signal-amber mb-space-md"><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span></div><p class="font-body-md text-body-md text-on-surface italic">“Great experience with FiberGrid. Amazing customer service and lightning-fast response times from their engineering desk. Migrating our routing was flawless.”</p></div><div class="flex items-center gap-space-sm pt-space-md mt-space-md"><div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-deep-navy">FD</div><div><div class="font-label-ui text-label-ui text-deep-navy font-bold">Fergus Doucheb</div><div class="font-body-sm text-body-sm text-on-surface-variant">Lead Systems Programmer</div></div></div></div><div class="p-space-xl rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between"><div><div class="flex items-center gap-1 text-signal-amber mb-space-md"><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span></div><p class="font-body-md text-body-md text-on-surface italic">“It is simply the best and fastest transit provider we have deployed across Johannesburg and Frankfurt. Zero packet loss during peak load hours.”</p></div><div class="flex items-center gap-space-sm pt-space-md mt-space-md"><div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-deep-navy">KV</div><div><div class="font-label-ui text-label-ui text-deep-navy font-bold">Kevin van der Merwe</div><div class="font-body-sm text-body-sm text-on-surface-variant">IT Infrastructure Operations Manager</div></div></div></div><div class="p-space-xl rounded-2xl bg-surface-container-lowest shadow-md flex flex-col justify-between"><div><div class="flex items-center gap-1 text-signal-amber mb-space-md"><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span><span class="material-symbols-outlined text-body-md" style="font-variation-settings: &quot;FILL&quot; 1;">star</span></div><p class="font-body-md text-body-md text-on-surface italic">“Many thanks for your excellent colocation service and rock-solid BGP routing. FiberGrid has backed our growth without a single hitch.”</p></div><div class="flex items-center gap-space-sm pt-space-md mt-space-md"><div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-deep-navy">SM</div><div><div class="font-label-ui text-label-ui text-deep-navy font-bold">Scooter MC</div><div class="font-body-sm text-body-sm text-on-surface-variant">Chief Executive Officer</div></div></div></div></div>
</div>
</section>
        
        <?php
    }
}
