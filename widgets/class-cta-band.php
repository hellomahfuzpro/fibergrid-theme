<?php
/**
 * FiberGrid — CTA Conversion Band Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Cta_Band extends FG_Widget_Base {

    public function get_name() {
        return 'fg_cta_band';
    }

    public function get_title() {
        return __( 'CTA Conversion Band', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'CTA Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Accelerate Your Infrastructure',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Ready to Deploy Carrier-Grade Optical Bandwidth?',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Speak with a senior network engineer today. Receive custom BGP route testing, colocation rack pricing, and tailored multi-homed SLA guarantees.',
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => __( 'Primary Button Label', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Request Bandwidth Quote',
            )
        );

        $this->add_control(
            'btn1_link',
            array(
                'label'   => __( 'Primary Button Link', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '/contact/' ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => __( 'Secondary Button Label', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Emergency NOC Hotline',
            )
        );

        $this->add_control(
            'btn2_link',
            array(
                'label'   => __( 'Secondary Button Link', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'tel:+27110000000' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-cta-band-section' );
        ?>
        <div style="background:var(--fg-color-primary);border-radius:var(--fg-radius-xl);padding:64px 48px;color:#FFFFFF;position:relative;overflow:hidden;box-shadow:var(--fg-shadow-lg);">
            <div style="position:absolute;top:-40px;right:-40px;width:320px;height:320px;background:rgba(255,255,255,0.08);border-radius:50%;pointer-events:none;"></div>
            
            <div style="max-width:800px;margin:0 auto;text-align:center;position:relative;z-index:2;">
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span style="font-family:var(--fg-font-mono);font-size:12px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#BAE6FD;display:inline-block;margin-bottom:12px;">
                        <?php echo esc_html( $settings['eyebrow'] ); ?>
                    </span>
                <?php endif; ?>

                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 style="font-size:clamp(28px, 3.5vw, 44px);font-weight:800;line-height:1.2;color:#FFFFFF;margin-bottom:16px;">
                        <?php echo esc_html( $settings['title'] ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( ! empty( $settings['lede'] ) ) : ?>
                    <p style="font-size:17px;line-height:1.6;color:rgba(255,255,255,0.9);margin-bottom:36px;max-width:680px;margin-left:auto;margin-right:auto;">
                        <?php echo esc_html( $settings['lede'] ); ?>
                    </p>
                <?php endif; ?>

                <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;align-items:center;">
                    <?php if ( ! empty( $settings['btn1_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['btn1_link']['url'] ); ?>" class="fg-btn" style="background:#FFFFFF;color:var(--fg-color-primary) !important;font-weight:700;box-shadow:0 4px 14px rgba(0,0,0,0.15);">
                            <?php echo esc_html( $settings['btn1_text'] ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $settings['btn2_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['btn2_link']['url'] ); ?>" class="fg-btn fg-btn-on-dark">
                            📞 <?php echo esc_html( $settings['btn2_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
