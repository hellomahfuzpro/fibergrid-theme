<?php
/**
 * FiberGrid — Virtual Data Center & Compute Tiers Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Compute_Tiers extends FG_Widget_Base {

    public function get_name() {
        return 'fg_compute_tiers';
    }

    public function get_title() {
        return __( 'VDC Compute & Cloud Tiers', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-cloud-check';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'VDC Header', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'High-Performance Private Cloud',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Instant-Provision Virtual Data Center Resources',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Enterprise VMware and KVM virtual infrastructure with non-oversubscribed CPU cores, enterprise NVMe storage arrays, and low-latency private connectivity.',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tiers',
            array(
                'label' => __( 'VDC Resource Tiers', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tier_name',
            array(
                'label'   => __( 'Compute Tier Name', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'VDC General Purpose',
            )
        );

        $repeater->add_control(
            'tier_price',
            array(
                'label'   => __( 'Pricing', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '$199 / mo',
            )
        );

        $repeater->add_control(
            'tier_specs',
            array(
                'label'       => __( 'Specs (one per line)', 'fibergrid' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => "8 Dedicated vCPU Cores\n32 GB DDR5 ECC Registered RAM\n500 GB High-IOPS NVMe SAN\n10 Gbps Unmetered Private VLAN\nHourly Snapshots & Backup",
            )
        );

        $this->add_control(
            'tiers_list',
            array(
                'label'   => __( 'Tiers List', 'fibergrid' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'tier_name'  => 'VDC Starter Cluster',
                        'tier_price' => '$149 / mo',
                        'tier_specs' => "4 Dedicated vCPU Cores\n16 GB DDR5 ECC RAM\n250 GB Enterprise NVMe\n5 Gbps Redundant Uplink\nFull Root / Hypervisor API",
                    ),
                    array(
                        'tier_name'  => 'VDC Enterprise Pro',
                        'tier_price' => '$329 / mo',
                        'tier_specs' => "16 Dedicated vCPU Cores\n64 GB DDR5 ECC RAM\n1 TB Ultra-High IOPS NVMe\n10 Gbps Direct Cloud On-Ramp\nHA Failover Clustering",
                    ),
                    array(
                        'tier_name'  => 'VDC High-Compute AI Cluster',
                        'tier_price' => '$699 / mo',
                        'tier_specs' => "32 Dedicated vCPU Cores\n128 GB DDR5 ECC RAM\n2 TB NVMe RAID-10 SAN\nDual 25 Gbps Cross-Connects\nDedicated VPC & Compliance",
                    ),
                ),
                'title_field' => '{{{ tier_name }}} — {{{ tier_price }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-vdc-section' );
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

        <?php if ( ! empty( $settings['tiers_list'] ) ) : ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:28px;">
                <?php foreach ( $settings['tiers_list'] as $tier ) : ?>
                    <?php
                    $specs = array_filter( array_map( 'trim', explode( "\n", $tier['tier_specs'] ) ) );
                    ?>
                    <div class="fg-card" style="display:flex;flex-direction:column;justify-content:space-between;">
                        <div>
                            <span class="fg-badge fg-badge-cyan" style="margin-bottom:12px;">PRIVATE CLOUD NODE</span>
                            <h3 style="font-size:22px;font-weight:800;color:var(--fg-color-secondary);margin:0 0 10px;"><?php echo esc_html( $tier['tier_name'] ); ?></h3>
                            <div style="font-family:var(--fg-font-mono);font-size:30px;font-weight:700;color:var(--fg-color-primary);margin-bottom:20px;">
                                <?php echo esc_html( $tier['tier_price'] ); ?>
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
                            <a href="/contact/?service=cloud_vdc&tier=<?php echo urlencode( $tier['tier_name'] ); ?>" class="fg-btn fg-btn-primary" style="width:100%;">
                                <?php esc_html_e( 'Deploy Resource Pool', 'fibergrid' ); ?>
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
