<?php
/**
 * FiberGrid — Carrier & Trust Ribbon Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Repeater;

class FG_Widget_Carrier_Ribbon extends FG_Widget_Base {

    public function get_name() {
        return 'fg_carrier_ribbon';
    }

    public function get_title() {
        return __( 'Carrier Ribbon & Trust Logos', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Trust Metrics & Partners', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'stat_number',
            array(
                'label'   => __( 'Stat Number', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '100+',
            )
        );

        $this->add_control(
            'stat_label',
            array(
                'label'   => __( 'Stat Label', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'TRUSTED BY FAST-GROWING ENTERPRISES WORLDWIDE',
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'carrier_name',
            array(
                'label'   => __( 'Carrier / Media Name', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'NTT COMMUNICATIONS',
            )
        );

        $repeater->add_control(
            'carrier_url',
            array(
                'label'   => __( 'Link URL (Optional)', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '#' ),
            )
        );

        $this->add_control(
            'carriers_list',
            array(
                'label'       => __( 'Upstream Carriers & Trust Marks', 'fibergrid' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array( 'carrier_name' => 'NTT' ),
                    array( 'carrier_name' => 'COGENT' ),
                    array( 'carrier_name' => 'TELSTRA' ),
                    array( 'carrier_name' => 'HE.NET' ),
                    array( 'carrier_name' => 'ZAYO' ),
                    array( 'carrier_name' => 'DE-CIX' ),
                ),
                'title_field' => '{{{ carrier_name }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-carrier-ribbon' );
        ?>
        <div class="fg-carrier-inner">
            <div class="fg-carrier-title-box">
                <?php if ( ! empty( $settings['stat_number'] ) ) : ?>
                    <span class="fg-carrier-stat"><?php echo esc_html( $settings['stat_number'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $settings['stat_label'] ) ) : ?>
                    <span class="fg-carrier-title"><?php echo esc_html( $settings['stat_label'] ); ?></span>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $settings['carriers_list'] ) ) : ?>
                <div class="fg-carrier-logos">
                    <?php foreach ( $settings['carriers_list'] as $carrier ) : ?>
                        <?php
                        $url = ! empty( $carrier['carrier_url']['url'] ) ? esc_url( $carrier['carrier_url']['url'] ) : '#';
                        ?>
                        <a href="<?php echo $url; ?>" class="fg-carrier-logo-item">
                            <?php echo esc_html( $carrier['carrier_name'] ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $this->render_section_close();
    }
}
