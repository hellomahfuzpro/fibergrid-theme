<?php
/**
 * FiberGrid — Tier Compliance & Reliability Standards Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Tier_Compliance extends FG_Widget_Base {

    public function get_name() {
        return 'fg_tier_compliance';
    }

    public function get_title() {
        return __( 'Tier Compliance & Standards', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-shield-check';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Compliance Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Zero-Compromise Security',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Certified Compliance & Critical Infrastructure Security',
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'badge_name',
            array(
                'label'   => __( 'Standard / Certification', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Tier III Certified',
            )
        );

        $repeater->add_control(
            'badge_desc',
            array(
                'label'   => __( 'Scope & Details', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Concurrently maintainable site infrastructure with 99.982% uptime SLA and dual A+B power feeds.',
            )
        );

        $this->add_control(
            'badges_list',
            array(
                'label'   => __( 'Certifications & Standards', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'badge_name' => 'Tier III Design & Facility',
                        'badge_desc' => 'Dual independent distribution paths, N+1 chillers, rotary UPS, and on-site diesel fuel reserves.',
                    ),
                    array(
                        'badge_name' => 'ISO/IEC 27001 & 22301',
                        'badge_desc' => 'Strict operational data security controls, comprehensive risk mitigation, and disaster recovery.',
                    ),
                    array(
                        'badge_name' => 'SOC 2 Type II Audited',
                        'badge_desc' => 'Independently verified physical security, biometric mantrap access, and 24/7 continuous surveillance.',
                    ),
                    array(
                        'badge_name' => 'PCI-DSS Compliant',
                        'badge_desc' => 'Hardened network architecture designed to host mission-critical payment gateways and financial services.',
                    ),
                ),
                'title_field' => '{{{ badge_name }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-compliance-section' );
        ?>
        <div style="text-align:center;max-width:760px;margin:0 auto 48px;">
            <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 style="font-size:36px;font-weight:800;color:var(--fg-color-secondary);margin-top:6px;"><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $settings['badges_list'] ) ) : ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:24px;">
                <?php foreach ( $settings['badges_list'] as $badge ) : ?>
                    <div class="fg-card" style="border-left:4px solid var(--fg-color-primary);">
                        <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px;">
                            <span class="dashicons dashicons-shield" style="color:var(--fg-color-primary);font-size:24px;width:24px;height:24px;"></span>
                            <h3 style="font-size:18px;font-weight:700;color:var(--fg-color-secondary);margin:0;">
                                <?php echo esc_html( $badge['badge_name'] ); ?>
                            </h3>
                        </div>
                        <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.6;margin:0;">
                            <?php echo esc_html( $badge['badge_desc'] ); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
        $this->render_section_close();
    }
}
