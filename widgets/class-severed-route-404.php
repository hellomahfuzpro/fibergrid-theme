<?php
/**
 * FiberGrid — 404 Severed Route Diagnostic Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Severed_Route_404 extends FG_Widget_Base {

    public function get_name() {
        return 'fg_severed_route_404';
    }

    public function get_title() {
        return __( '404 Severed Route Diagnostic', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-alert';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( '404 Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'BGP ROUTE UNREACHABLE // ERROR 404',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Optical Path Severed: Destination Route Not Found',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'The optical wavelength or routing address you requested has experienced a packet drop or does not exist on our global fiber backbone.',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-404-section' );
        $svg_path = FG_URI . '/assets/images/80f65207fb4c438ab05f3cd8d2b1746e-bold_900_404_route_disconnect_graphic_icon__transparent_.svg';
        ?>
        <div style="max-width:760px;margin:0 auto;text-align:center;">
            <div class="fg-404-illustration">
                <img src="<?php echo esc_url( $svg_path ); ?>" alt="Severed Optical Cable 404 Error" style="max-width:320px;height:auto;margin:0 auto;">
            </div>

            <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                <span class="fg-eyebrow" style="color:var(--fg-color-route-orange);"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
            <?php endif; ?>

            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h1 style="font-size:clamp(32px, 4vw, 48px);font-weight:800;color:#FFFFFF;margin:12px 0 16px;"><?php echo esc_html( $settings['title'] ); ?></h1>
            <?php endif; ?>

            <?php if ( ! empty( $settings['lede'] ) ) : ?>
                <p style="color:#94A3B8;font-size:16px;line-height:1.6;margin-bottom:36px;max-width:600px;margin-left:auto;margin-right:auto;"><?php echo esc_html( $settings['lede'] ); ?></p>
            <?php endif; ?>

            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fg-btn fg-btn-primary">
                    <?php esc_html_e( 'Reroute to Homepage', 'fibergrid' ); ?>
                </a>
                <a href="/ip-transit/#looking-glass" class="fg-btn fg-btn-secondary" style="border-color:#334155;color:#FFFFFF !important;">
                    <?php esc_html_e( 'Inspect Looking Glass', 'fibergrid' ); ?>
                </a>
                <a href="/contact/" class="fg-btn fg-btn-on-dark">
                    <?php esc_html_e( 'Contact 24/7 NOC', 'fibergrid' ); ?>
                </a>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
