<?php
/**
 * FiberGrid — Telemetry Metrics & Cards Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Telemetry_Cards extends FG_Widget_Base {

    public function get_name() {
        return 'fg_telemetry_cards';
    }

    public function get_title() {
        return __( 'Telemetry & SLA Metrics', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Section Header', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '{ Capacity And Availability }',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'A Platform You Can Rely On.',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Engineered for mission-critical IT infrastructure today, with the operational flexibility to expand into next-generation high-compute clusters.',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cards',
            array(
                'label' => __( 'Telemetry Cards', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'metric_val',
            array(
                'label'   => __( 'Metric Value', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '99.999%',
            )
        );

        $repeater->add_control(
            'metric_label',
            array(
                'label'   => __( 'Metric Subtitle', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Verified Core SLA',
            )
        );

        $repeater->add_control(
            'sparkline_status',
            array(
                'label'   => __( 'Sub-label / Status', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '100% Real-Time',
            )
        );

        $this->add_control(
            'metrics_list',
            array(
                'label'   => __( 'Telemetry Items', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'metric_val'       => '99.999%',
                        'metric_label'     => 'Verified Core SLA',
                        'sparkline_status' => '100% Real-Time',
                    ),
                    array(
                        'metric_val'       => '24/7/365',
                        'metric_label'     => 'NOC Operations & Monitoring',
                        'sparkline_status' => 'Dual Active Feeds',
                    ),
                    array(
                        'metric_val'       => '< 1.5ms',
                        'metric_label'     => 'Regional PoP Latency',
                        'sparkline_status' => 'Low Jitter Routing',
                    ),
                    array(
                        'metric_val'       => 'Tier III',
                        'metric_label'     => 'Carrier-Neutral Datacenter',
                        'sparkline_status' => 'N+1 Resilient Specs',
                    ),
                ),
                'title_field' => '{{{ metric_val }}} — {{{ metric_label }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-telemetry-section' );
        ?>
        <div class="fg-telemetry-header">
            <div>
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 class="fg-section-title" style="font-size:36px;font-weight:800;margin-top:4px;"><?php echo esc_html( $settings['title'] ); ?></h2>
                <?php endif; ?>
            </div>
            <?php if ( ! empty( $settings['lede'] ) ) : ?>
                <p class="fg-section-lede" style="max-width:440px;color:var(--fg-color-text-muted);font-size:15px;"><?php echo esc_html( $settings['lede'] ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $settings['metrics_list'] ) ) : ?>
            <div class="fg-telemetry-grid">
                <?php foreach ( $settings['metrics_list'] as $idx => $item ) : ?>
                    <div class="fg-telemetry-card">
                        <div class="card-top">
                            <div>
                                <div class="metric-val"><?php echo esc_html( $item['metric_val'] ); ?></div>
                                <div class="metric-label"><?php echo esc_html( $item['metric_label'] ); ?></div>
                            </div>
                            <span class="card-index"><?php echo esc_html( str_pad( ( $idx + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                        </div>
                        <div class="fg-sparkline-row">
                            <span class="fg-sparkline-bar" style="height: 40%;"></span>
                            <span class="fg-sparkline-bar" style="height: 60%;"></span>
                            <span class="fg-sparkline-bar" style="height: 55%;"></span>
                            <span class="fg-sparkline-bar" style="height: 80%;"></span>
                            <span class="fg-sparkline-bar" style="height: 70%;"></span>
                            <span class="fg-sparkline-bar" style="height: 90%;"></span>
                            <span class="fg-sparkline-bar" style="height: 100%;background:var(--fg-color-status-healthy);"></span>
                        </div>
                        <div style="display:flex;justify-content:space-between;font-family:var(--fg-font-mono);font-size:11px;color:var(--fg-color-text-dim);margin-top:8px;">
                            <span>STATUS</span>
                            <span style="color:var(--fg-color-status-healthy);font-weight:bold;"><?php echo esc_html( $item['sparkline_status'] ); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
        $this->render_section_close();
    }
}
