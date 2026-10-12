<?php
/**
 * Widget: Colocation - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 1', 'fibergrid' );
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
            'status_text',
            array(
                'label'       => esc_html__( 'Status Banner Text', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'placeholder' => 'Leave empty to hide',
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
        $status_text = ! empty( $settings['status_text'] ) ? $settings['status_text'] : '';

        if ( empty( $status_text ) ) {
            return;
        }
        ?>

        <section class="w-full bg-surface-container-lowest border-b border-grid-line/60 py-2.5 px-margin-mobile lg:px-margin-desktop">
            <div class="max-w-[1360px] mx-auto flex items-center justify-between text-xs font-label-mono text-on-surface-variant">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-status-healthy animate-pulse"></span>
                    <span><?php echo esc_html( $status_text ); ?></span>
                </div>
            </div>
        </section>
        
        <?php
    }
}
