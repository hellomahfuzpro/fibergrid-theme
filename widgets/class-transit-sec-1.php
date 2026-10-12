<?php
/**
 * Widget: IP Transit - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_1';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 1', 'fibergrid' );
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
                'default' => esc_html__( 'Uptime Guaranteed', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Carrier-Grade Global IP Transit with <span class="text-optical-blue underline decoration-sky-bright/30">9+ Tier-1</span> Upstream Carriers.',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Autonomous multi-homed BGP routing engineered for low-latency transmission, 100% SLA packet-delivery commitment, and multi-gigabit throughput from 1G, 10G to hyperscale 100Gbps interfaces across 15 countries.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Request Transit Quote', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#pricing-matrix',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => esc_html__( 'Secondary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Launch Looking Glass', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#looking-glass',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDEpWztJ_n3g5XBnmlnTU7VwahcwbiTiG3LwA-YGsZCgnsJNw6l5vn4Gy3jcO0hvdFvBWZe7eK4bwRrJYZrLJqHhIB9ZcslhoyetB9l_NwfqIcPhOJSmVCm92pomfuB2Yj6EKOvG90uwRgxP47F7R0LuFgJYLZuIWg5zD_-Dg1KiCk0sRVe4e99gSo7kidkHe3yP1Ql9azGbrKlBOXXW8Y2kZ8K450Z4SGsiperFb_LsrgkzDWE4eJHmA',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Uptime Guaranteed';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Carrier-Grade Global IP Transit with <span class="text-optical-blue underline decoration-sky-bright/30">9+ Tier-1</span> Upstream Carriers.';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Autonomous multi-homed BGP routing engineered for low-latency transmission, 100% SLA packet-delivery commitment, and multi-gigabit throughput from 1G, 10G to hyperscale 100Gbps interfaces across 15 countries.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Request Transit Quote';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '#pricing-matrix';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Launch Looking Glass';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#looking-glass';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDEpWztJ_n3g5XBnmlnTU7VwahcwbiTiG3LwA-YGsZCgnsJNw6l5vn4Gy3jcO0hvdFvBWZe7eK4bwRrJYZrLJqHhIB9ZcslhoyetB9l_NwfqIcPhOJSmVCm92pomfuB2Yj6EKOvG90uwRgxP47F7R0LuFgJYLZuIWg5zD_-Dg1KiCk0sRVe4e99gSo7kidkHe3yP1Ql9azGbrKlBOXXW8Y2kZ8K450Z4SGsiperFb_LsrgkzDWE4eJHmA';
        ?>

        <section class="w-full bg-surface-container-lowest py-16 lg:py-24 px-margin-mobile lg:px-margin-desktop relative overflow-hidden">
<div class="max-w-[1360px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Left Column: Copy & Value Proposition -->
<div class="lg:col-span-7 flex flex-col gap-6">

<h1 class="font-display-hero text-display-hero-mobile lg:text-display-hero text-on-surface tracking-tight">
          <?php echo wp_kses_post( $title ); ?>
        </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed"><?php echo esc_html( $desc ); ?></p>
<!-- CTA Buttons -->
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="inline-flex items-center justify-center px-7 py-3.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-lg hover:shadow-xl hover:bg-primary transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
            <?php echo esc_html( $btn1_text ); ?>
            <span class="material-symbols-outlined ml-2 text-sm">arrow_forward</span>
</a>
<a class="inline-flex items-center justify-center px-7 py-3.5 rounded-lg bg-surface-ice text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
<span class="material-symbols-outlined mr-2 text-sm">terminal</span>
            <?php echo esc_html( $btn2_text ); ?>
          </a>
</div>
<!-- Telemetry Stats Pill Ribbon -->
<div class="grid grid-cols-3 gap-4 pt-8 max-w-xl">
<div class="bg-surface-ice p-4 rounded-xl">
<div class="font-tech-metric-md text-tech-metric-md text-on-surface font-bold">100% SLA</div>
<div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1"><?php echo esc_html( $eyebrow ); ?></div>
</div>
<div class="bg-surface-ice p-4 rounded-xl">
<div class="font-tech-metric-md text-tech-metric-md text-optical-blue font-bold">&lt; 15ms</div>
<div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Regional Metro RTD</div>
</div>
<div class="bg-surface-ice p-4 rounded-xl">
<div class="font-tech-metric-md text-tech-metric-md text-route-orange font-bold">4.8 Tbps</div>
<div class="font-label-mono text-label-mono text-on-surface-variant uppercase mt-1">Edge Capacity</div>
</div>
</div>
</div>
<!-- Right Column: Visual Telemetry Card & Rack Visual -->
<div class="lg:col-span-5 relative h-full flex flex-col justify-center">
<div class="relative rounded-2xl overflow-hidden shadow-2xl bg-midnight-bg p-1 h-full flex flex-col">
<!-- Server Rack Imagery with Gradient Scrim -->
<div class="relative h-full min-h-[360px] sm:min-h-[460px] w-full rounded-xl overflow-hidden flex-1"><img class="w-full h-full object-cover" data-alt="Enterprise dark high-density data center cold aisle with illuminated server racks, fiber optic cabling patch panels glowing in vibrant cyan and cobalt blue LEDs, precision clean telecommunications facility." src="<?php echo esc_url( $image_1 ); ?>"><div class="absolute inset-0 bg-gradient-to-t from-midnight-bg via-midnight-bg/40 to-transparent"></div></div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
