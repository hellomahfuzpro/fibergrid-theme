<?php
/**
 * Widget: Home - Section 10 (Closing CTA with Full Controls & Zero Email Policy)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec10 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_10';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 10 (Closing CTA)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'CTA Content', 'fibergrid' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ready to interconnect your network?',
            )
        );

        $this->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Connect directly to Tier-1 upstream transit and carrier-neutral colocation facilities worldwide. Contact our engineering team for custom commits and rapid cross-connect provisioning.',
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Request Transit Quote',
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/contact/' ) ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => esc_html__( 'Secondary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Colocation Facilities',
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/colocation/' ) ),
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

        $title    = ! empty( $settings['title'] ) ? $settings['title'] : 'Ready to interconnect your network?';
        $desc     = ! empty( $settings['description'] ) ? $settings['description'] : 'Connect directly to Tier-1 upstream transit and carrier-neutral colocation facilities worldwide. Contact our engineering team for custom commits and rapid cross-connect provisioning.';
        $b1_text  = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Request Transit Quote';
        $b1_url   = ! empty( $settings['btn1_url'] ) ? $settings['btn1_url'] : array( 'url' => home_url( '/contact/' ) );
        $b2_text  = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : 'Colocation Facilities';
        $b2_url   = ! empty( $settings['btn2_url'] ) ? $settings['btn2_url'] : array( 'url' => home_url( '/colocation/' ) );
        ?>
        <section class="w-full bg-[#eff4ff] py-14 sm:py-16 <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                    <div class="max-w-2xl text-center lg:text-left">
                        <h2 class="text-3xl sm:text-4xl lg:text-[44px] font-black text-[#0b1c30] tracking-tight leading-tight">
                            <?php echo esc_html( $title ); ?>
                        </h2>
                        <p class="text-base sm:text-lg text-on-surface-variant mt-2 leading-relaxed">
                            <?php echo esc_html( $desc ); ?>
                        </p>
                    </div>
                    <div class="flex items-center gap-4 shrink-0 flex-wrap justify-center">
                        <?php
                        $this->render_button(
                            $b1_text,
                            $b1_url,
                            'inline-flex items-center justify-center px-7 py-3.5 rounded-lg bg-[#0066ff] text-white font-semibold text-sm shadow hover:bg-[#0050cb] transition-colors'
                        );
                        $this->render_button(
                            $b2_text,
                            $b2_url,
                            'inline-flex items-center justify-center px-7 py-3.5 rounded-lg bg-white border border-[#0066ff] text-[#0066ff] font-semibold text-sm shadow-sm hover:bg-[#f4f8ff] transition-colors'
                        );
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
