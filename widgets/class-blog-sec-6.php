<?php
/**
 * Widget: Blog - Section 6
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec6 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_6';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 6', 'fibergrid' );
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
                'default' => esc_html__( 'ENTERPRISE ARCHITECTURE CONSULTING', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Ready to architect your high-speed network infrastructure?',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Speak directly with a senior solutions engineer today to configure 100G/400G transit commits, colocation footprints, or hybrid private cloud fabrics.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Deploy Bare Metal', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '/services/bare-metal',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'ENTERPRISE ARCHITECTURE CONSULTING';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Ready to architect your high-speed network infrastructure?';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Speak directly with a senior solutions engineer today to configure 100G/400G transit commits, colocation footprints, or hybrid private cloud fabrics.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Deploy Bare Metal';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '/services/bare-metal';
        ?>

        <section class="w-full bg-background py-14 pb-20">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
<div class="w-full rounded-2xl bg-surface-container-low p-8 sm:p-12 lg:p-14 flex flex-col lg:flex-row items-center justify-between gap-8 shadow-sm">
<div class="max-w-2xl">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-secondary-container text-on-secondary-container font-label-mono text-label-mono uppercase tracking-wider font-semibold mb-3"><?php echo esc_html( $eyebrow ); ?></div>
<h3 class="font-headline-lg text-headline-lg text-on-surface mb-3 tracking-tight">
            <?php echo wp_kses_post( $title ); ?>
          </h3>
<p class="font-body-md text-body-md text-secondary leading-relaxed"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">
<a class="w-full sm:w-auto text-center px-6 py-3.5 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold hover:bg-primary transition-all shadow-md" href="<?php echo esc_url( $btn1_url ); ?>">
            <?php echo esc_html( $btn1_text ); ?>
          </a>
<a class="w-full sm:w-auto text-center px-6 py-3.5 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-ui text-label-ui font-semibold transition-all shadow-sm" href="
        <?php
    }
}
