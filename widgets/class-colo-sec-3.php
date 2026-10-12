<?php
/**
 * Widget: Colocation - Section 3
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec3 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_3';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 3', 'fibergrid' );
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
                'default' => esc_html__( 'INTERCONNECTED VIA TIER-1 FIBER CARRIERS &amp; GLOBAL EXCHANGE FABRICS', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'INTERCONNECTED VIA TIER-1 FIBER CARRIERS &amp; GLOBAL EXCHANGE FABRICS';
        ?>

        <section class="w-full bg-surface-container-low py-8 border-y border-grid-line/70">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop flex flex-col items-center gap-6"><div class="text-center w-full block mb-4 uppercase tracking-widest text-xs font-semibold text-slate-500"><?php echo esc_html( $eyebrow ); ?></div><div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 w-full text-center font-bold text-slate-600 tracking-wider text-sm"><span class=""><span class="inline-block w-2 h-2 rounded-full bg-blue-500 mr-2"></span>COGENT</span><span class=""><span class="inline-block w-2 h-2 rounded-full bg-indigo-500 mr-2"></span>ZAYO</span><span class=""><span class="inline-block w-2 h-2 rounded-full bg-amber-500 mr-2"></span>NTT COMM</span><span class=""><span class="inline-block w-2 h-2 rounded-full bg-cyan-500 mr-2"></span>HURRICANE ELECTRIC</span><span class=""><span class="inline-block w-2 h-2 rounded-full bg-blue-600 mr-2"></span>TELSTRA</span></div></div>
</section>
        
        <?php
    }
}
