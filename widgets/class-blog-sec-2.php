<?php
/**
 * Widget: Blog - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_2';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 2', 'fibergrid' );
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
                'default' => esc_html__( 'BACKBONE EXPANSION', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => '<a href="/blog/subsea-cable-expansion-2024" class="">
                  Expanding Global Optical Routes: New Direct Subsea Pathways Connecting Europe, Africa, and Asia
                </a>',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'How FiberGrid activated new redundant paths to slash intercontinental latency by 24% while providing autonomous multi-homed failover for enterprise workloads across the southern Atlantic corridor.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuByehflLD6Nz0JpfXssCTxzMUIixOsx0i8I4bchsLhgh4YzOCMrm6auSTUFeuQBmFQmKlou51SRksDUs8m9FCXIJqwr2VqoAN86kd-Z5raOh7x02takgSmBzgfYCOWRs8TH8jgTNQX2MP3SNt1M4ewEcGs9-UA8osV84LszBy5V0GtQs2_EaIFbIb21XMOt1ToVRhGVPznufOufwzWJrg8BaOXIeZSpttfWzfWXGx0ihDXziLLG9sAu-g',
                ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'BACKBONE EXPANSION';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : '<a href="/blog/subsea-cable-expansion-2024" class="">
                  Expanding Global Optical Routes: New Direct Subsea Pathways Connecting Europe, Africa, and Asia
                </a>';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'How FiberGrid activated new redundant paths to slash intercontinental latency by 24% while providing autonomous multi-homed failover for enterprise workloads across the southern Atlantic corridor.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuByehflLD6Nz0JpfXssCTxzMUIixOsx0i8I4bchsLhgh4YzOCMrm6auSTUFeuQBmFQmKlou51SRksDUs8m9FCXIJqwr2VqoAN86kd-Z5raOh7x02takgSmBzgfYCOWRs8TH8jgTNQX2MP3SNt1M4ewEcGs9-UA8osV84LszBy5V0GtQs2_EaIFbIb21XMOt1ToVRhGVPznufOufwzWJrg8BaOXIeZSpttfWzfWXGx0ihDXziLLG9sAu-g';
        ?>

        <section class="w-full bg-background pb-14">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
<div class="w-full rounded-2xl bg-surface-container-lowest shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
<div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
<!-- Content Side -->
<div class="lg:col-span-7 p-6 sm:p-10 lg:p-12 flex flex-col justify-between order-2 lg:order-1 bg-surface-container-lowest">
<div>
<!-- Meta Row -->
<div class="flex flex-wrap items-center gap-3 mb-5">
<span class="px-3 py-1 rounded bg-secondary-container text-on-secondary-container font-label-mono text-label-mono uppercase tracking-wider font-semibold"><?php echo esc_html( $eyebrow ); ?></span>
<span class="w-1 h-1 rounded-full bg-outline"></span>
<span class="font-label-ui text-label-ui text-secondary">6 min read</span>
<span class="w-1 h-1 rounded-full bg-outline"></span>
<span class="font-label-ui text-label-ui text-secondary">October 24, 2024</span>
</div>
<!-- Main Title -->
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-4 group-hover:text-primary transition-colors leading-tight">
<?php echo wp_kses_post( $title ); ?>
</h2>
<!-- Summary -->
<p class="font-body-md text-body-md text-secondary leading-relaxed mb-6"><?php echo esc_html( $desc ); ?></p>
<!-- Technical Micro-metrics -->
<div class="grid grid-cols-3 gap-3 p-3.5 rounded-lg bg-surface-container-low mb-8">
<div>
<div class="font-label-mono text-label-mono text-secondary uppercase">Path Latency</div>
<div class="font-tech-metric-md text-tech-metric-md text-primary font-bold">114ms</div>
</div>
<div>
<div class="font-label-mono text-label-mono text-secondary uppercase">Aggregate Cap</div>
<div class="font-tech-metric-md text-tech-metric-md text-on-surface font-bold">180 Tbps</div>
</div>
<div>
<div class="font-label-mono text-label-mono text-secondary uppercase">Redundancy</div>
<div class="font-tech-metric-md text-tech-metric-md text-status-healthy font-bold">N+2 Dark</div>
</div>
</div>
</div>
<!-- Author & CTA -->
<div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-grid-line">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-sm">
                  AV
                </div>
<div>
<div class="font-label-ui text-label-ui text-on-surface font-semibold">Dr. Alistair Vance</div>
<div class="font-body-sm text-body-sm text-secondary">VP of Network Architecture</div>
</div>
</div>
<a class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold hover:bg-primary transition-all shadow-sm" href="/blog/subsea-cable-expansion-2024">
<span class="">Read Full Case Study</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Graphic / Visualization Side -->
<div class="lg:col-span-5 relative min-h-[300px] lg:min-h-full order-1 lg:order-2 bg-midnight-bg flex flex-col justify-end p-6 overflow-hidden">
<img class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700" data-alt="Futuristic luminous blue and cyan fiber optic cables glowing inside an ultra-modern server facility, high technical contrast, sharp glass reflections, ambient orange data routing accents, clean enterprise style." src="<?php echo esc_url( $image_1 ); ?>">
<div class="absolute inset-0 bg-gradient-to-t from-midnight-bg via-midnight-bg/40 to-transparent"></div>
<!-- Overlay Badge Card -->

</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
