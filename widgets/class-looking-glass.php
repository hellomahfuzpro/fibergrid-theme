<?php
/**
 * FiberGrid — Looking Glass Diagnostic Tool Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Looking_Glass extends FG_Widget_Base {

    public function get_name() {
        return 'fg_looking_glass';
    }

    public function get_title() {
        return __( 'Looking Glass Diagnostic HUD', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Looking Glass Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Real-Time Network Telemetry',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Live Looking Glass & Routing Test',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Execute ICMP ping tests, trace global BGP AS paths, and verify low-latency route propagation directly from our Johannesburg, London, and Frankfurt core routers.',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-looking-glass-section' );
        ?>
        <div class="fg-looking-glass-widget">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:20px;">
                <div>
                    <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                        <span class="fg-eyebrow" style="color:var(--fg-color-cyan-pulse);"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['title'] ) ) : ?>
                        <h2 style="color:#FFFFFF;font-size:32px;font-weight:800;margin-top:4px;"><?php echo esc_html( $settings['title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['lede'] ) ) : ?>
                        <p style="color:#94A3B8;max-width:640px;font-size:15px;line-height:1.6;"><?php echo esc_html( $settings['lede'] ); ?></p>
                    <?php endif; ?>
                </div>
                <div style="display:flex;align-items:center;gap:10px;background:rgba(255,255,255,0.05);padding:8px 16px;border-radius:var(--fg-radius-md);border:1px solid rgba(255,255,255,0.1);">
                    <span class="fg-pulse-dot pulse"></span>
                    <span style="font-family:var(--fg-font-mono);font-size:12px;color:#A7F3D0;">BGP AS37457 ONLINE</span>
                </div>
            </div>

            <form class="fg-looking-glass-form" action="#" method="get">
                <div class="fg-input-box">
                    <label><?php esc_html_e( 'Core Node Location', 'fibergrid' ); ?></label>
                    <select name="node_location" class="fg-input-control">
                        <option value="jhb"><?php esc_html_e( 'Johannesburg Core (JHB-01)', 'fibergrid' ); ?></option>
                        <option value="cpt"><?php esc_html_e( 'Cape Town Teraco (CPT-02)', 'fibergrid' ); ?></option>
                        <option value="lon"><?php esc_html_e( 'London Telehouse (LON-01)', 'fibergrid' ); ?></option>
                        <option value="fra"><?php esc_html_e( 'Frankfurt Equinix (FRA-01)', 'fibergrid' ); ?></option>
                    </select>
                </div>

                <div class="fg-input-box">
                    <label><?php esc_html_e( 'Query Protocol', 'fibergrid' ); ?></label>
                    <select name="query_type" class="fg-input-control">
                        <option value="ping"><?php esc_html_e( 'ICMP Ping (Latency & Jitter)', 'fibergrid' ); ?></option>
                        <option value="traceroute"><?php esc_html_e( 'Traceroute (Hop Path)', 'fibergrid' ); ?></option>
                        <option value="bgp_route"><?php esc_html_e( 'BGP AS-Path Lookup', 'fibergrid' ); ?></option>
                    </select>
                </div>

                <div class="fg-input-box">
                    <label><?php esc_html_e( 'Target IPv4 / IPv6 / Hostname', 'fibergrid' ); ?></label>
                    <input type="text" name="target_ip" class="fg-input-control" value="1.1.1.1" placeholder="e.g. 1.1.1.1 or example.com">
                </div>

                <div class="fg-input-box" style="justify-content: flex-end;">
                    <button type="submit" class="fg-btn fg-btn-primary" style="height: 44px; padding: 0 24px;">
                        <?php esc_html_e( 'Execute Query', 'fibergrid' ); ?>
                    </button>
                </div>
            </form>

            <div class="fg-terminal-output">
                <pre style="margin:0;font-family:inherit;color:inherit;white-space:pre-wrap;">[BGP-LOOKING-GLASS-READY] Ready to query routing tables across AS37457 backbone. Enter target IP above.</pre>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
