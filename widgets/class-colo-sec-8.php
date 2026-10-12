<?php
/**
 * Widget: Colocation - Section 8
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec8 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_8';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 8', 'fibergrid' );
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
                'default' => esc_html__( 'CUSTOMER ENDORSEMENTS', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'See What Our Enterprise Colocation Clients Say',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Empowering mission-critical telecommunication backbones, fintech platforms, and content networks.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'CUSTOMER ENDORSEMENTS';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'See What Our Enterprise Colocation Clients Say';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Empowering mission-critical telecommunication backbones, fintech platforms, and content networks.';
        ?>

        <section class="w-full bg-surface-ice py-20 lg:py-24">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="flex flex-col items-center text-center gap-3 max-w-3xl mx-auto mb-14">
<span class="font-label-mono text-label-mono font-bold tracking-widest text-primary uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy tracking-tight">
          <?php echo wp_kses_post( $title ); ?>
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Review 1 -->
<div class="p-8 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col justify-between gap-6 hover:shadow-lg transition-all">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-1 text-signal-amber">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
</div>
<p class="font-body-md text-body-md text-deep-navy italic">
              "Great experience, amazing customer service and lightning-fast response time. Moving our 42U primary cluster was seamless with their complimentary racking team."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-grid-line/60">
<div class="w-10 h-10 rounded-full bg-surface-ice text-primary font-bold flex items-center justify-center font-label-mono text-sm">
              FD
            </div>
<div>
<div class="font-label-ui text-label-ui font-bold text-deep-navy">Fergus Doucheb</div>
<div class="font-body-sm text-xs text-on-surface-variant">Lead Infrastructure Programmer</div>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="p-8 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col justify-between gap-6 hover:shadow-lg transition-all">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-1 text-signal-amber">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
</div>
<p class="font-body-md text-body-md text-deep-navy italic">
              "It is simply the best and fastest. Zero packet loss on their BGP mix and rock-solid cooling reliability through peak summer heatwaves."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-grid-line/60">
<div class="w-10 h-10 rounded-full bg-surface-ice text-primary font-bold flex items-center justify-center font-label-mono text-sm">
              KV
            </div>
<div>
<div class="font-label-ui text-label-ui font-bold text-deep-navy">Kevin V.</div>
<div class="font-body-sm text-xs text-on-surface-variant">Systems Operations Manager</div>
</div>
</div>
</div>
<!-- Review 3 -->
<div class="p-8 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col justify-between gap-6 hover:shadow-lg transition-all">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-1 text-signal-amber">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
</div>
<p class="font-body-md text-body-md text-deep-navy italic">
              "Many thanks for your excellent service. FiberGrid's remote hands team handled our optical transceiver upgrade in under 12 minutes without disruption."
            </p>
</div>
<div class="flex items-center gap-3 pt-4 border-t border-grid-line/60">
<div class="w-10 h-10 rounded-full bg-surface-ice text-primary font-bold flex items-center justify-center font-label-mono text-sm">
              SM
            </div>
<div>
<div class="font-label-ui text-label-ui font-bold text-deep-navy">Scooter MC</div>
<div class="font-body-sm text-xs text-on-surface-variant">Chief Executive Officer</div>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
