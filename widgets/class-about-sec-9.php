<?php
/**
 * Widget: About Us - Section 9
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec9 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_9';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 9', 'fibergrid' );
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
                'default' => esc_html__( 'Begin Your Custom Deployment', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Ready to Accelerate Your Network Infrastructure?',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Speak directly with our engineering staff to provision tailored IP transit blend, reserve high-density colocation space, or request private fiber cross-connect details.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Speak to an Engineer', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => home_url( '/contact/' ),
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
                'default' => esc_html__( 'Looking Glass Ping', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '#network-reach',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Begin Your Custom Deployment';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Ready to Accelerate Your Network Infrastructure?';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Speak directly with our engineering staff to provision tailored IP transit blend, reserve high-density colocation space, or request private fiber cross-connect details.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Speak to an Engineer';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : home_url( '/contact/' );
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Looking Glass Ping';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#network-reach';
        ?>

        <section class="w-full bg-deep-navy text-on-primary py-20 lg:py-24 relative overflow-hidden">
<div class="absolute right-0 top-0 w-96 h-96 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute left-0 bottom-0 w-80 h-80 bg-cyan-pulse/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop relative z-10">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-10 bg-slate-surface/60 rounded-3xl p-8 lg:p-14 backdrop-blur-xl">
<div class="max-w-2xl">
<span class="font-label-mono text-label-mono text-cyan-pulse uppercase tracking-wider font-semibold block mb-3"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-lg lg:text-headline-xl text-on-primary mb-4">
            <?php echo wp_kses_post( $title ); ?>
          </h2>
<p class="font-body-lg text-body-lg text-surface-variant/90 leading-relaxed"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 shrink-0">
<a class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-lg hover:bg-primary transition-all" href="<?php echo esc_url( $btn1_url ); ?>">
  <?php echo esc_html( $btn1_text ); ?>
  <span class="material-symbols-outlined text-lg">arrow_forward</span>
</a>
<a class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-surface-container-lowest/10 text-on-primary font-label-ui text-label-ui font-semibold hover:bg-surface-container-lowest/20 transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
  <?php echo esc_html( $btn2_text ); ?>
</a>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
