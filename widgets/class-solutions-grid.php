<?php
/**
 * FiberGrid — Solutions & Service Tiers Grid Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Solutions_Grid extends FG_Widget_Base {

    public function get_name() {
        return 'fg_solutions_grid';
    }

    public function get_title() {
        return __( 'Solutions & Services Grid', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
                'default' => 'Core Capabilities',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Purpose-Built Telecommunications & Cloud Infrastructure',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tiers',
            array(
                'label' => __( 'Service Cards', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tier_title',
            array(
                'label'   => __( 'Service Title', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'High-Speed IP Transit',
            )
        );

        $repeater->add_control(
            'tier_desc',
            array(
                'label'   => __( 'Description', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Uncongested global BGP routing delivered directly over dense optical backbones.',
            )
        );

        $repeater->add_control(
            'is_featured',
            array(
                'label'   => __( 'Featured / Recommended Tag', 'fibergrid' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            )
        );

        $repeater->add_control(
            'spec_items',
            array(
                'label'       => __( 'Specs (one per line)', 'fibergrid' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => "Full BGP routing tables & communities\n10G, 40G, 100G & 400G port handoffs\nDirect peering across major global exchanges\n99.999% SLA availability guarantee",
                'description' => __( 'Enter each checklist item on a new line.', 'fibergrid' ),
            )
        );

        $repeater->add_control(
            'btn_text',
            array(
                'label'   => __( 'CTA Button Text', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Configure Transit',
            )
        );

        $repeater->add_control(
            'btn_link',
            array(
                'label'   => __( 'CTA Button Link', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '/ip-transit/' ),
            )
        );

        $this->add_control(
            'solutions_list',
            array(
                'label'   => __( 'Services List', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'tier_title'  => 'High-Speed IP Transit',
                        'tier_desc'   => 'Direct Tier 1 upstream routing with zero packet loss and low-jitter BGP performance.',
                        'is_featured' => 'yes',
                        'spec_items'  => "10G / 40G / 100G / 400G Port Options\nFull BGP Routing Table Supported\nDirect Tier 1 Global Upstream\n99.999% Core Uptime SLA",
                        'btn_text'    => 'Configure Transit',
                        'btn_link'    => array( 'url' => '/ip-transit/' ),
                    ),
                    array(
                        'tier_title'  => 'Global Colocation',
                        'tier_desc'   => 'Carrier-neutral datacenter cage and rack deployments with N+1 redundant power and cooling.',
                        'is_featured' => 'no',
                        'spec_items'  => "Quarter, Half & Full 42U Racks\nDual A+B High-Density Power Feeds\nBiometric Security & 24/7 Access\nDirect On-Site Cross-Connects",
                        'btn_text'    => 'Explore Colocation',
                        'btn_link'    => array( 'url' => '/colocation/' ),
                    ),
                    array(
                        'tier_title'  => 'Virtual Data Center & Cloud',
                        'tier_desc'   => 'Low-latency private compute clusters, instant NVMe storage provisioning, and direct cloud on-ramps.',
                        'is_featured' => 'no',
                        'spec_items'  => "Dedicated vCPU & DDR5 RAM\nEnterprise NVMe High-IOPS SAN\nPrivate VLAN & Interconnects\nAutomated Hourly Backups",
                        'btn_text'    => 'Deploy Cloud VDC',
                        'btn_link'    => array( 'url' => '/virtual-data-center/' ),
                    ),
                ),
                'title_field' => '{{{ tier_title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-solutions-section' );
        ?>
        <div style="text-align:center;max-width:760px;margin:0 auto 56px;">
            <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 class="fg-section-title" style="font-size:38px;font-weight:800;"><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $settings['solutions_list'] ) ) : ?>
            <div class="fg-solutions-grid">
                <?php foreach ( $settings['solutions_list'] as $tier ) : ?>
                    <?php
                    $is_feat = ( 'yes' === $tier['is_featured'] );
                    $card_class = 'fg-solution-card' . ( $is_feat ? ' featured' : '' );
                    $btn_class = 'fg-btn ' . ( $is_feat ? 'fg-btn-primary' : 'fg-btn-secondary' );
                    $specs = array_filter( array_map( 'trim', explode( "\n", $tier['spec_items'] ) ) );
                    ?>
                    <div class="<?php echo esc_attr( $card_class ); ?>">
                        <div>
                            <div class="fg-solution-icon">
                                <span class="dashicons dashicons-networking"></span>
                            </div>
                            <h3><?php echo esc_html( $tier['tier_title'] ); ?></h3>
                            <p><?php echo esc_html( $tier['tier_desc'] ); ?></p>

                            <?php if ( ! empty( $specs ) ) : ?>
                                <ul class="fg-solution-specs">
                                    <?php foreach ( $specs as $spec ) : ?>
                                        <li>
                                            <span class="check">✓</span>
                                            <span><?php echo esc_html( $spec ); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $tier['btn_text'] ) ) : ?>
                            <div>
                                <a href="<?php echo esc_url( $tier['btn_link']['url'] ); ?>" class="<?php echo esc_attr( $btn_class ); ?>" style="width:100%;">
                                    <?php echo esc_html( $tier['btn_text'] ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
        $this->render_section_close();
    }
}
