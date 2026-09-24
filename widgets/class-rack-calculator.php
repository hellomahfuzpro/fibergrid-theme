<?php
/**
 * FiberGrid — Colocation Rack Calculator Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Rack_Calculator extends FG_Widget_Base {

    public function get_name() {
        return 'fg_rack_calculator';
    }

    public function get_title() {
        return __( 'Colocation Rack Calculator', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-server';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Rack Calculator Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Datacenter Facilities',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Configure Your Colocation Enclosure & Power Load',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Deploy enterprise servers within secure biometric cages across our Tier III carrier-neutral facilities with redundant N+1 UPS power and direct optical cross-connects.',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-rack-calc-section' );
        ?>
        <div class="fg-rack-calc-card">
            <div>
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 style="font-size:32px;font-weight:800;color:var(--fg-color-secondary);margin:8px 0 16px;"><?php echo esc_html( $settings['title'] ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $settings['lede'] ) ) : ?>
                    <p style="color:var(--fg-color-text-muted);font-size:15px;line-height:1.6;margin-bottom:28px;"><?php echo esc_html( $settings['lede'] ); ?></p>
                <?php endif; ?>

                <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;text-transform:uppercase;color:var(--fg-color-text-dim);display:block;margin-bottom:12px;">
                    <?php esc_html_e( 'Select Enclosure Size:', 'fibergrid' ); ?>
                </label>
                <div class="fg-rack-selector-btns">
                    <button type="button" class="fg-rack-btn" data-rack-size="quarter">10U (1/4 Rack)</button>
                    <button type="button" class="fg-rack-btn" data-rack-size="half">21U (1/2 Rack)</button>
                    <button type="button" class="fg-rack-btn active" data-rack-size="full">42U (Full Rack)</button>
                </div>
            </div>

            <div style="background:var(--fg-color-surface-ice);border:1px solid var(--fg-color-grid-line);border-radius:var(--fg-radius-lg);padding:32px;display:flex;flex-direction:column;justify-content:space-between;">
                <div>
                    <span class="fg-badge fg-badge-blue" style="margin-bottom:12px;">TIER III FACILITY INCLUDED</span>
                    <h3 style="font-size:22px;font-weight:800;margin-bottom:20px;color:var(--fg-color-secondary);"><?php esc_html_e( 'Enclosure Specification', 'fibergrid' ); ?></h3>

                    <div style="display:flex;flex-direction:column;gap:14px;font-size:14px;">
                        <div style="display:flex;justify-content:space-between;border-bottom:1px solid var(--fg-color-grid-line);padding-bottom:10px;">
                            <span style="color:var(--fg-color-text-muted);"><?php esc_html_e( 'Power Allocation:', 'fibergrid' ); ?></span>
                            <strong class="fg-rack-power-display" style="font-family:var(--fg-font-mono);">6.0 kVA Redundant (A+B Dual Feeds)</strong>
                        </div>
                        <div style="display:flex;justify-content:space-between;border-bottom:1px solid var(--fg-color-grid-line);padding-bottom:10px;">
                            <span style="color:var(--fg-color-text-muted);"><?php esc_html_e( 'Default Network Handoff:', 'fibergrid' ); ?></span>
                            <strong class="fg-rack-port-display" style="font-family:var(--fg-font-mono);">2x 100 Gbps QSFP28 Cross-Connects</strong>
                        </div>
                        <div style="display:flex;justify-content:space-between;border-bottom:1px solid var(--fg-color-grid-line);padding-bottom:10px;">
                            <span style="color:var(--fg-color-text-muted);"><?php esc_html_e( 'Physical Security:', 'fibergrid' ); ?></span>
                            <strong>Biometric + Keycard RFID Cages</strong>
                        </div>
                        <div style="display:flex;justify-content:space-between;padding-bottom:6px;">
                            <span style="color:var(--fg-color-text-muted);"><?php esc_html_e( 'Estimated Baseline Cost:', 'fibergrid' ); ?></span>
                            <strong class="fg-rack-price-display" style="font-family:var(--fg-font-mono);font-size:20px;color:var(--fg-color-primary);">$1,350 / mo</strong>
                        </div>
                    </div>
                </div>

                <div style="margin-top:28px;">
                    <a href="/contact/?service=colocation" class="fg-btn fg-btn-primary" style="width:100%;">
                        <?php esc_html_e( 'Request Datacenter Facility Tour', 'fibergrid' ); ?>
                    </a>
                </div>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
