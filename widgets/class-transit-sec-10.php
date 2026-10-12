<?php
/**
 * Widget: IP Transit - Section 10
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_TransitSec10 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_transit_sec_10';
    }

    public function get_title() {
        return esc_html__( 'IP Transit - Section 10', 'fibergrid' );
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
                'default' => esc_html__( 'Ready to Upgrade Your Upstream?', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Connect Your Autonomous System Today.',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Contact our network architecture sales desk for custom port cross-connects, committed information rates (CIR), and multi-region testing.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '">
          Request Custom Proposal', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '<?php echo esc_url( home_url( ',
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
                'default' => esc_html__( 'Run BGP Diagnostic', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Ready to Upgrade Your Upstream?';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Connect Your Autonomous System Today.';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Contact our network architecture sales desk for custom port cross-connects, committed information rates (CIR), and multi-region testing.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : '">
          Request Custom Proposal';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '<?php echo esc_url( home_url( ';
        $btn2_text = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Run BGP Diagnostic';
        $btn2_url  = ! empty( $settings['btn2_url']['url'] ) ? $settings['btn2_url']['url'] : '#looking-glass';
        ?>

        <section class="w-full bg-deep-navy text-on-primary py-16 px-margin-mobile lg:px-margin-desktop relative overflow-hidden">
<div class="max-w-[1360px] mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
<div>
<span class="font-label-mono text-label-mono text-cyan-pulse font-bold uppercase tracking-wider"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-on-primary mt-2"><?php echo wp_kses_post( $title ); ?></h2>
<p class="font-body-md text-body-md text-surface-dim max-w-xl mt-2"><?php echo esc_html( $desc ); ?></p>
</div>
<div class="flex flex-wrap items-center gap-4">
<a class="px-8 py-4 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-bold shadow-lg hover:bg-primary transition-all" href="<?php echo esc_url( home_url( "/contact/" ) ); ?><?php echo esc_html( $btn1_text ); ?>
        </a>
<a class="px-8 py-4 rounded-lg bg-slate-surface text-on-primary font-label-ui text-label-ui font-semibold hover:bg-slate-surface/80 transition-all" href="<?php echo esc_url( $btn2_url ); ?>">
          <?php echo esc_html( $btn2_text ); ?>
        </a>
</div>
</div>
</section>
        
        <?php
    }
}
