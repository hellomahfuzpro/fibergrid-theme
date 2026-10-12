<?php
/**
 * Widget: Blog - Section 5
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_5';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 5', 'fibergrid' );
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
                'default' => esc_html__( 'FIBERGRID ENGINEERING MONTHLY', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Stay ahead of latency and infrastructure trends.',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Direct NOC dispatches, routing analyses, subsea cable repair logs, and architecture blueprints. Curated by network engineers for technical operators. Zero marketing fluff.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'FIBERGRID ENGINEERING MONTHLY';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Stay ahead of latency and infrastructure trends.';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Direct NOC dispatches, routing analyses, subsea cable repair logs, and architecture blueprints. Curated by network engineers for technical operators. Zero marketing fluff.';
        ?>

        <section class="w-full bg-background py-10">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
<div class="w-full rounded-2xl bg-midnight-bg p-8 lg:p-14 relative overflow-hidden text-white shadow-xl">
<!-- Subtle optical backdrop ambient accents -->
<div class="absolute -right-20 -top-20 w-80 h-80 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
<div class="absolute right-1/3 -bottom-20 w-60 h-60 rounded-full bg-cyan-pulse/15 blur-3xl pointer-events-none"></div>
<div class="relative z-10 max-w-2xl">
<div class="inline-flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-cyan-pulse text-[20px]">rss_feed</span>
<span class="font-label-mono text-label-mono text-cyan-pulse tracking-wider font-semibold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
</div>
<h3 class="font-headline-lg text-headline-lg text-white mb-3">
            <?php echo wp_kses_post( $title ); ?>
          </h3>
<p class="font-body-md text-body-md text-outline-variant mb-8 leading-relaxed"><?php echo esc_html( $desc ); ?></p>
<form class="flex flex-col sm:flex-row gap-3" onsubmit="event.preventDefault(); document.getElementById('sub-feedback').classList.remove('hidden');">
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline text-[20px]">mail</span>
<input class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/10 text-white font-body-md text-body-md placeholder:text-outline-variant focus:outline-none focus:bg-white/15 focus:ring-1 focus:ring-cyan-pulse transition-all" placeholder="colleague@enterprise.com" required="" type="email">
</div>
<button class="px-7 py-3 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold hover:bg-primary transition-all shadow-md flex items-center justify-center gap-2 whitespace-nowrap" type="submit">
<span class="">Subscribe</span>
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</form>
<div class="hidden mt-3 text-status-healthy font-label-ui text-label-ui flex items-center gap-1.5" id="sub-feedback">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span class="">You are now subscribed to the FiberGrid Engineering Monthly dispatch.</span>
</div>
<div class="flex items-center gap-6 mt-6 font-label-mono text-label-mono text-outline">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px] text-status-healthy">verified</span> Instant Unsubscribe</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px] text-status-healthy">shield</span> Strict Zero-Spam Policy</span>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
