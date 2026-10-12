<?php
/**
 * Widget: Blog Single - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_2';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 2', 'fibergrid' );
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
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCXzUkGYC4W02C_ShhKVPPRRP-f3GroFt08oVhLk_7en2G7AerYha82AhN9m71VGWM3NaaAGCIA0fSivHa1Y96M59f7srHCC0lZF36TPE4JdJuQNgNMVzdAO-0M1oP85hM-YfZYL-ibIvtanUXACDLVjsFq_1qDdt6XVzd-PUcg-DaqwivT80i1p1gwZY2E-NZHKxwRV56t-uyGuiBVHRYGvpSe3OouhT_xTjljG8_Jb9QNFSryUGAXGA',
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
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCXzUkGYC4W02C_ShhKVPPRRP-f3GroFt08oVhLk_7en2G7AerYha82AhN9m71VGWM3NaaAGCIA0fSivHa1Y96M59f7srHCC0lZF36TPE4JdJuQNgNMVzdAO-0M1oP85hM-YfZYL-ibIvtanUXACDLVjsFq_1qDdt6XVzd-PUcg-DaqwivT80i1p1gwZY2E-NZHKxwRV56t-uyGuiBVHRYGvpSe3OouhT_xTjljG8_Jb9QNFSryUGAXGA';
        ?>

        <section class="w-full bg-background pt-8 pb-4"><div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto"><div class="w-full rounded-2xl overflow-hidden border border-grid-line shadow-xl bg-midnight-bg"><img class="w-full h-auto max-h-[480px] object-cover rounded-2xl block aspect-[16/9]" src="<?php echo esc_url( $image_1 ); ?>" alt="Subsea fiber optic cable expansion across Europe, Africa, and Asia"></div></div></section>
        
        <?php
    }
}
