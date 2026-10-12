<?php
/**
 * Widget: About Us - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_2';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 2', 'fibergrid' );
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
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Connecting Continents with Relentless Optical Speed &amp; Stability',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'From our origins as a specialized regional telecommunications provider in South Africa to an unyielding international backbone, FiberGrid delivers carrier-grade IP transit, sovereign colocation facilities, and low-latency interconnectivity spanning 15 nations across 4 continents.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Global Topology', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#network-reach',
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
                'default' => esc_html__( 'Engineering Governance', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#engineering-leadership',
                    'is_external' => false,
                    'nofollow'    => false,
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
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Connecting Continents with Relentless Optical Speed &amp; Stability';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'From our origins as a specialized regional telecommunications provider in South Africa to an unyielding international backbone, FiberGrid delivers carrier-grade IP transit, sovereign colocation facilities, and low-latency interconnectivity spanning 15 nations across 4 continents.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Explore Global Topology';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '#network-reach';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Engineering Governance';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#engineering-leadership';
        ?>

        <section class="w-full bg-surface-container-lowest relative overflow-hidden pb-16 lg:pb-24">
<!-- Subtle architectural backdrop gradient -->
<div class="absolute inset-0 bg-gradient-to-b from-surface-ice via-transparent to-transparent pointer-events-none"></div>
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop relative z-10">
<div class="flex flex-col max-w-4xl pt-4 lg:pt-8">
<!-- Category Badge -->
<div class="inline-flex items-center gap-2.5 self-start px-3.5 py-1.5 rounded-full bg-surface-container-low text-primary mb-6 shadow-sm">
<span class="w-2 h-2 rounded-full bg-status-healthy"></span>

</div>
<!-- Main Headline -->
<h1 class="font-display-hero text-headline-xl lg:text-display-hero text-on-surface tracking-tight mb-8">
          <?php echo wp_kses_post( $title ); ?>
        </h1>
<!-- Narrative Subtext -->
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-10 max-w-3xl"><?php echo esc_html( $desc ); ?></p>
<!-- Rapid Access Links -->
<div class="flex flex-wrap items-center gap-4">
<a class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
            <?php echo esc_html( $btn1_text ); ?>
            <span class="material-symbols-outlined text-base">arrow_downward</span>
</a>
<a class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-surface-container text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container-high transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
            <?php echo esc_html( $btn2_text ); ?>
            <span class="material-symbols-outlined text-base">tune</span>
</a>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
