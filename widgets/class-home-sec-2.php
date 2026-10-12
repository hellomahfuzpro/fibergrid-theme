<?php
/**
 * Widget: Home - Section 2
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_2';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 2', 'fibergrid' );
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
                'default' => esc_html__( 'TRUSTED BY FAST-GROWING COMPANIES WORLDWIDE', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'TRUSTED BY FAST-GROWING COMPANIES WORLDWIDE';
        ?>

        <section class="w-full bg-surface-container-lowest border-y border-surface-container-high/60 py-8">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
<div class="flex flex-col items-center justify-center text-center gap-6"><div class="flex flex-col items-center justify-center gap-1.5 text-center"><span class="text-3xl sm:text-4xl font-black text-deep-navy tracking-tight leading-none">100+</span><span class="text-xs font-semibold tracking-widest text-outline uppercase"><?php echo esc_html( $eyebrow ); ?></span></div><div class="flex flex-wrap items-center justify-center gap-8 sm:gap-12 lg:gap-16 w-full pt-1"><div class="flex items-center gap-1 text-on-surface hover:opacity-80 transition-opacity"><span class="font-black text-xl sm:text-2xl tracking-tighter text-[#0b1c30]">techradar</span><span class="w-2.5 h-2.5 rounded-full bg-[#FF007A] mb-1"></span></div><div class="font-black text-2xl sm:text-3xl tracking-widest text-[#0b1c30] border-2 border-[#0b1c30] px-2 py-0.5 leading-none">WIRED</div><div class="font-serif italic font-bold text-2xl sm:text-3xl tracking-tight text-[#0b1c30]">Forbes</div><div class="flex items-center gap-1.5 font-bold text-xl sm:text-2xl tracking-tight text-[#0b1c30]"><span class="w-4 h-4 border-2 border-[#0b1c30] flex items-center justify-center text-[10px] font-mono">c</span>cybernews</div><div class="hidden md:flex items-center gap-6 border-l border-surface-container-high pl-6 text-on-surface-variant text-sm font-semibold font-mono"><span class="">NTT</span><span class="">COGENT</span><span class="">TELSTRA</span><span class="">HE.NET</span></div></div></div>
</div>
</section>
        
        <?php
    }
}
