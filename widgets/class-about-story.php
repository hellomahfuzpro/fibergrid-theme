<?php
/**
 * FiberGrid — About & Infrastructure Story Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_About_Story extends FG_Widget_Base {

    public function get_name() {
        return 'fg_about_story';
    }

    public function get_title() {
        return __( 'About & Infrastructure Heritage', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-history';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'About Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Our Core Mission',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Connecting Africa, Europe, and Global Telecom Exchanges',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Founded by seasoned network engineers and datacenter architects, FiberGrid was engineered to bypass traditional telecom congestion. We operate privately-routed optical paths across 15 nations with guaranteed low latency and dedicated 24/7/365 NOC engineering.',
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'milestone_year',
            array(
                'label'   => __( 'Year / Phase', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '2020',
            )
        );

        $repeater->add_control(
            'milestone_title',
            array(
                'label'   => __( 'Milestone Title', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Terrestrial Backbone Launch',
            )
        );

        $repeater->add_control(
            'milestone_desc',
            array(
                'label'   => __( 'Details', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Deployment of 100G DWDM optical ring connecting major financial and enterprise hubs.',
            )
        );

        $this->add_control(
            'milestones',
            array(
                'label'   => __( 'Milestone Timeline', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'milestone_year'  => '2019',
                        'milestone_title' => 'Carrier-Neutral Foundation',
                        'milestone_desc'  => 'Incorporation and establishment of first Tier III private cage in Teraco Johannesburg.',
                    ),
                    array(
                        'milestone_year'  => '2022',
                        'milestone_title' => 'Direct Subsea Cable Interconnect',
                        'milestone_desc'  => 'Activation of multi-terabit subsea cable capacity connecting directly to London & Frankfurt.',
                    ),
                    array(
                        'milestone_year'  => '2024',
                        'milestone_title' => '400G Core Backbone Upgrade',
                        'milestone_desc'  => 'Full deployment of 400G QSFP-DD routing fabric supporting AI clusters and cloud providers.',
                    ),
                ),
                'title_field' => '{{{ milestone_year }}} — {{{ milestone_title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-about-section' );
        ?>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
            <div>
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 style="font-size:36px;font-weight:800;color:var(--fg-color-secondary);margin:8px 0 18px;"><?php echo esc_html( $settings['title'] ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $settings['lede'] ) ) : ?>
                    <p style="color:var(--fg-color-text-muted);font-size:16px;line-height:1.7;margin-bottom:32px;"><?php echo esc_html( $settings['lede'] ); ?></p>
                <?php endif; ?>

                <div style="display:flex;gap:24px;border-top:1px solid var(--fg-color-grid-line);padding-top:24px;">
                    <div>
                        <div style="font-family:var(--fg-font-mono);font-size:32px;font-weight:700;color:var(--fg-color-primary);">15+</div>
                        <div style="font-size:13px;color:var(--fg-color-text-muted);"><?php esc_html_e( 'Countries Connected', 'fibergrid' ); ?></div>
                    </div>
                    <div style="border-left:1px solid var(--fg-color-grid-line);padding-left:24px;">
                        <div style="font-family:var(--fg-font-mono);font-size:32px;font-weight:700;color:var(--fg-color-primary);">10+ Tbps</div>
                        <div style="font-size:13px;color:var(--fg-color-text-muted);"><?php esc_html_e( 'Backbone Capacity', 'fibergrid' ); ?></div>
                    </div>
                    <div style="border-left:1px solid var(--fg-color-grid-line);padding-left:24px;">
                        <div style="font-family:var(--fg-font-mono);font-size:32px;font-weight:700;color:var(--fg-color-primary);">0%</div>
                        <div style="font-size:13px;color:var(--fg-color-text-muted);"><?php esc_html_e( 'Packet Loss SLA', 'fibergrid' ); ?></div>
                    </div>
                </div>
            </div>

            <?php if ( ! empty( $settings['milestones'] ) ) : ?>
                <div style="display:flex;flex-direction:column;gap:24px;">
                    <?php foreach ( $settings['milestones'] as $m ) : ?>
                        <div class="fg-card" style="display:flex;gap:20px;align-items:flex-start;">
                            <span class="fg-badge fg-badge-blue" style="font-size:13px;padding:6px 12px;">
                                <?php echo esc_html( $m['milestone_year'] ); ?>
                            </span>
                            <div>
                                <h3 style="font-size:18px;font-weight:700;color:var(--fg-color-secondary);margin:0 0 6px;">
                                    <?php echo esc_html( $m['milestone_title'] ); ?>
                                </h3>
                                <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.5;margin:0;">
                                    <?php echo esc_html( $m['milestone_desc'] ); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $this->render_section_close();
    }
}
