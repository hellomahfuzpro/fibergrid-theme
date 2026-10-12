<?php
/**
 * Widget: About Us - Section 4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec4 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_4';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 4', 'fibergrid' );
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
                'default' => esc_html__( 'Our Foundation', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Privately Owned, Autonomously Routed, Engineering-First.',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'FiberGrid is a privately owned telecommunications and data center provider built on the principle that modern enterprises cannot afford black-box connectivity. Founded to bring carrier-grade routing transparency to high-growth markets, we expanded systematically by deploying point-of-presence nodes in the world’s most critical interconnection facilities.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Our Foundation';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Privately Owned, Autonomously Routed, Engineering-First.';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'FiberGrid is a privately owned telecommunications and data center provider built on the principle that modern enterprises cannot afford black-box connectivity. Founded to bring carrier-grade routing transparency to high-growth markets, we expanded systematically by deploying point-of-presence nodes in the world’s most critical interconnection facilities.';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 lg:py-28">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
<!-- Left Column: Storytelling & Heritage -->
<div class="lg:col-span-6 flex flex-col">
<span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider mb-3"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-lg lg:text-headline-xl text-on-surface mb-6">
            <?php echo wp_kses_post( $title ); ?>
          </h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-6"><?php echo esc_html( $desc ); ?></p>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-8">
            Unlike consolidated telecom conglomerates with layered bureaucracy, FiberGrid maintains flat engineering directness. When network architects or system administrators raise a question, they interface directly with Tier-3 network operations engineers who hold hands-on control over the physical racks, BGP tables, and cross-connect patch fields.
          </p>
<!-- Key Highlights Bento Box -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="p-6 rounded-xl bg-surface-ice">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined text-optical-blue">hub</span>
<span class="font-headline-sm text-headline-sm text-deep-navy">Direct Peering</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Low-hop access to cloud on-ramps, major regional IXPs (NAPAfrica, AMS-IX, LINX, DE-CIX), and hyperscale transit partners.</p>
</div>
<div class="p-6 rounded-xl bg-surface-ice">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined text-status-healthy">security</span>
<span class="font-headline-sm text-headline-sm text-deep-navy">Carrier Neutral</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Zero lock-in. Cross-connect freely to any Tier-1 backhaul or local metro loop without restrictive provider penalties.</p>
</div>
</div>
</div>
<!-- Right Column: Visual Facility Showcase & Core Values -->
<div class="lg:col-span-6 flex flex-col gap-8">
<!-- Infrastructure Visual Placeholder -->
<div class="relative w-full rounded-2xl overflow-hidden shadow-xl bg-midnight-bg min-h-[320px] lg:min-h-[380px] flex items-end p-8">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Pristine interior of a modern Tier-3 enterprise data center with illuminated blue optical fiber runs, row after row of high-density server racks with green status indicator LEDs, cold aisle containment glass doors, and reflections on high-gloss anti-static white flooring in sleek technical minimalism." style="background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuD3pXMi6em3xgebtVJcDY_La9JoPGdZqwH7_T-p44hXhhZaxEsJkBEtdWyDpaxo4oEwHJ04Hi2-wUk87Hoyxx_uHpbOBuhFeHx5Ir1p8q5Kz69-u6Kwfm-NFIXgvZW4EPdPXoo0KeAj9XhcnMWw_nahZ-GkyBSB3mgZi0SigvLvcmGmXEfbKFX-ue_1aQbrmBPcrEZvyJQQi_l1mN7v2qziZKvPCEe1vtBA-rbjdqwmc89hgo-322FqmA&quot;);"></div>
<div class="absolute inset-0 bg-gradient-to-t from-midnight-bg via-midnight-bg/40 to-transparent"></div>
<div class="relative z-10 w-full flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<div>
<span class="font-label-mono text-label-mono text-cyan-pulse uppercase tracking-wider">Facility Standard</span>
<h3 class="font-headline-sm text-headline-sm text-on-primary">TIA-942 Tier III &amp; ISO 27001 Aligned</h3>
</div>
<span class="px-3.5 py-1.5 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-deep-navy font-label-mono text-label-mono font-bold self-start sm:self-auto">
                2N Redundancy
              </span>
</div>
</div>
<!-- 4 Pillar Values Stack -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="p-5 rounded-xl bg-surface-container-low">
<div class="flex items-center gap-3 mb-2">
<span class="w-8 h-8 rounded-lg bg-primary text-on-primary flex items-center justify-center font-bold text-sm">01</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface">Carrier Independence</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Autonomous BGP routing over 10+ Tier-1 upstream providers ensures continuous non-blocking failover.</p>
</div>
<div class="p-5 rounded-xl bg-surface-container-low">
<div class="flex items-center gap-3 mb-2">
<span class="w-8 h-8 rounded-lg bg-primary text-on-primary flex items-center justify-center font-bold text-sm">02</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface">Transparent Velocity</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Real-time Looking Glass routing matrices and deterministic latency telemetry with zero traffic throttling.</p>
</div>
<div class="p-5 rounded-xl bg-surface-container-low">
<div class="flex items-center gap-3 mb-2">
<span class="w-8 h-8 rounded-lg bg-primary text-on-primary flex items-center justify-center font-bold text-sm">03</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface">Round-The-Clock NOC</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">On-site technical staff and remote hands active 24/7/365 to verify port health and install server modules.</p>
</div>
<div class="p-5 rounded-xl bg-surface-container-low">
<div class="flex items-center gap-3 mb-2">
<span class="w-8 h-8 rounded-lg bg-primary text-on-primary flex items-center justify-center font-bold text-sm">04</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface">Tailored Topologies</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Customized hybrid bare-metal, unmetered multi-gigabit pipes, and cage partitions configured to workload specifications.</p>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
