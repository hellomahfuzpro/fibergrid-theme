<?php
/**
 * FiberGrid — Bandwidth & Commitment Pricing Matrix Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Pricing_Matrix extends FG_Widget_Base {

    public function get_name() {
        return 'fg_pricing_matrix';
    }

    public function get_title() {
        return __( 'Bandwidth & Pricing Matrix', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Matrix Header', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Capacity Tiers',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Predictable, High-Capacity IP Transit Commitments',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'From dedicated 10 Gbps uplinks for cloud providers to full-rate 400 Gbps cross-connects for global carriers, choose flexible 95th percentile burstable or flat-rate billing.',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_plans',
            array(
                'label' => __( 'Commitment Plans', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'plan_port',
            array(
                'label'   => __( 'Port Speed', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '10 Gbps SFP+',
            )
        );

        $repeater->add_control(
            'plan_rate',
            array(
                'label'   => __( 'Commitment Bandwidth', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '1 Gbps Committed (Burst to 10G)',
            )
        );

        $repeater->add_control(
            'plan_price',
            array(
                'label'   => __( 'Starting Price', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '$0.45 / Mbps',
            )
        );

        $repeater->add_control(
            'is_recommended',
            array(
                'label'   => __( 'Recommended Badge', 'fibergrid' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            )
        );

        $repeater->add_control(
            'plan_specs',
            array(
                'label'   => __( 'Features (one per line)', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => "95th Percentile Billing\nFull BGP Community Routing\nDual Port Physical Redundancy\n24/7 Priority NOC Support",
            )
        );

        $this->add_control(
            'plans_list',
            array(
                'label'   => __( 'Plans List', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'plan_port'      => '10 Gbps SFP+',
                        'plan_rate'      => '1G - 10G Commit',
                        'plan_price'     => '$0.40 / Mbps',
                        'is_recommended' => 'no',
                        'plan_specs'     => "Full BGP Routing Table\n95th Percentile Burstable\nSLA: 99.999% Guaranteed\n24/7 Enterprise NOC",
                    ),
                    array(
                        'plan_port'      => '40 Gbps QSFP+',
                        'plan_rate'      => '10G - 40G Commit',
                        'plan_price'     => '$0.28 / Mbps',
                        'is_recommended' => 'yes',
                        'plan_specs'     => "Multi-Chassis LAG Handoff\nCustom BGP Communities\nDedicated Account Engineer\nDirect Cloud Cross-Connect",
                    ),
                    array(
                        'plan_port'      => '100 Gbps QSFP28',
                        'plan_rate'      => '40G - 100G Commit',
                        'plan_price'     => '$0.18 / Mbps',
                        'is_recommended' => 'no',
                        'plan_specs'     => "Subsea Cable Direct Route\nZero-Packet Loss SLA\nNOC War Room Escalation\nCustom Capacity Terms",
                    ),
                    array(
                        'plan_port'      => '400 Gbps QSFP-DD',
                        'plan_rate'      => 'Wholesale Carrier',
                        'plan_price'     => 'Custom Quote',
                        'is_recommended' => 'no',
                        'plan_specs'     => "Ultra Dense Optical Wave\nGlobal Terrestrial Backhaul\nCustom PoP Provisioning\nDedicated Account Director",
                    ),
                ),
                'title_field' => '{{{ plan_port }}} — {{{ plan_price }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-pricing-section', 'pricing-matrix' );
        ?>
        <div style="text-align:center;max-width:760px;margin:0 auto 56px;">
            <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 style="font-size:38px;font-weight:800;color:var(--fg-color-secondary);margin-top:6px;"><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php endif; ?>
            <?php if ( ! empty( $settings['lede'] ) ) : ?>
                <p style="color:var(--fg-color-text-muted);font-size:16px;line-height:1.6;"><?php echo esc_html( $settings['lede'] ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $settings['plans_list'] ) ) : ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:24px;">
                <?php foreach ( $settings['plans_list'] as $plan ) : ?>
                    <?php
                    $is_rec = ( 'yes' === $plan['is_recommended'] );
                    $card_border = $is_rec ? '2px solid var(--fg-color-primary)' : '1px solid var(--fg-color-grid-line)';
                    $specs = array_filter( array_map( 'trim', explode( "\n", $plan['plan_specs'] ) ) );
                    ?>
                    <div class="fg-card" style="border:<?php echo esc_attr( $card_border ); ?>;display:flex;flex-direction:column;justify-content:space-between;position:relative;">
                        <?php if ( $is_rec ) : ?>
                            <span class="fg-badge fg-badge-amber" style="position:absolute;top:-12px;left:24px;">
                                RECOMMENDED TIER
                            </span>
                        <?php endif; ?>
                        
                        <div>
                            <div style="font-family:var(--fg-font-mono);font-size:12px;color:var(--fg-color-text-dim);font-weight:700;text-transform:uppercase;">
                                <?php echo esc_html( $plan['plan_rate'] ); ?>
                            </div>
                            <h3 style="font-size:24px;font-weight:800;color:var(--fg-color-secondary);margin:6px 0 16px;">
                                <?php echo esc_html( $plan['plan_port'] ); ?>
                            </h3>

                            <div style="font-family:var(--fg-font-mono);font-size:28px;font-weight:700;color:var(--fg-color-primary);margin-bottom:24px;">
                                <?php echo esc_html( $plan['plan_price'] ); ?>
                            </div>

                            <ul class="fg-solution-specs">
                                <?php foreach ( $specs as $spec ) : ?>
                                    <li>
                                        <span class="check" style="color:var(--fg-color-status-healthy);">✓</span>
                                        <span><?php echo esc_html( $spec ); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div style="margin-top:24px;">
                            <a href="/contact/?plan=<?php echo urlencode( $plan['plan_port'] ); ?>" class="fg-btn <?php echo $is_rec ? 'fg-btn-primary' : 'fg-btn-secondary'; ?>" style="width:100%;">
                                <?php esc_html_e( 'Request Capacity Quote', 'fibergrid' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
        $this->render_section_close();
    }
}
