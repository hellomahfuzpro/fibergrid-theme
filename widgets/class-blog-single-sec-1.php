<?php
/**
 * Widget: Blog Single - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 1', 'fibergrid' );
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
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Home', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '/',
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
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Home';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '/';
        ?>

        <section class="w-full bg-surface-container-lowest border-b border-grid-line pt-8 pb-12">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto flex flex-col gap-6">
<!-- Breadcrumb & Tag -->
<div class="flex flex-wrap items-center justify-between gap-4">
<nav class="flex items-center gap-2 font-label-ui text-label-ui text-secondary">
<a class="hover:text-primary transition-colors" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_text ); ?></a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary transition-colors" href="
        <?php
    }
}
