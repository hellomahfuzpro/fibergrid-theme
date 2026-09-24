<?php
/**
 * FiberGrid — Hero Telemetry Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Utils;

class FG_Widget_Hero_Telemetry extends FG_Widget_Base {

    public function get_name() {
        return 'fg_hero_telemetry';
    }

    public function get_title() {
        return __( 'Hero & Network Telemetry', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Hero Content', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow Category', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Bare Metal & IP Transit',
            )
        );

        $this->add_control(
            'title_prefix',
            array(
                'label'   => __( 'Title Prefix', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Ultra Low-Latency',
            )
        );

        $this->add_control(
            'title_highlight',
            array(
                'label'   => __( 'Title Highlight (Blue)', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'IP Transit',
            )
        );

        $this->add_control(
            'title_suffix',
            array(
                'label'   => __( 'Title Suffix', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '& Global Data Center Infrastructure.',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => 'Powering mission-critical connectivity, enterprise colocation, and virtual data centers across 15 countries and 4 continents with direct Tier 1 backbone routing.',
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => __( 'Primary CTA Label', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Explore Infrastructure',
            )
        );

        $this->add_control(
            'btn1_link',
            array(
                'label'   => __( 'Primary CTA URL', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '#pricing-matrix' ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => __( 'Secondary CTA Label', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Request Quote',
            )
        );

        $this->add_control(
            'btn2_link',
            array(
                'label'   => __( 'Secondary CTA URL', 'fibergrid' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '/contact/' ),
            )
        );

        $this->add_control(
            'telemetry_ping',
            array(
                'label'   => __( 'Telemetry Latency Indicator', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '< 1.5ms Core Latency',
            )
        );

        $this->add_control(
            'map_image',
            array(
                'label'   => __( 'Network Map Graphic', 'fibergrid' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-hero-section' );
        ?>
        <div class="fg-hero-grid">
            <div class="fg-hero-content">
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                <?php endif; ?>

                <h1 class="fg-hero-title">
                    <?php echo esc_html( $settings['title_prefix'] ); ?>
                    <?php if ( ! empty( $settings['title_highlight'] ) ) : ?>
                        <span class="highlight"><?php echo esc_html( $settings['title_highlight'] ); ?></span>
                    <?php endif; ?>
                    <?php echo esc_html( $settings['title_suffix'] ); ?>
                </h1>

                <?php if ( ! empty( $settings['lede'] ) ) : ?>
                    <p class="fg-hero-lede"><?php echo esc_html( $settings['lede'] ); ?></p>
                <?php endif; ?>

                <div class="fg-hero-actions">
                    <?php if ( ! empty( $settings['btn1_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['btn1_link']['url'] ); ?>" class="fg-btn fg-btn-primary">
                            <?php echo esc_html( $settings['btn1_text'] ); ?>
                            <span class="dashicons dashicons-arrow-right-alt2" style="font-size:16px;width:16px;height:16px;"></span>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $settings['btn2_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['btn2_link']['url'] ); ?>" class="fg-btn fg-btn-secondary">
                            <?php echo esc_html( $settings['btn2_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $settings['telemetry_ping'] ) ) : ?>
                    <div class="fg-hero-telemetry-box">
                        <div class="item">
                            <span class="fg-pulse-dot pulse"></span>
                            <span><?php echo esc_html( $settings['telemetry_ping'] ); ?></span>
                        </div>
                        <div class="item" style="color:var(--fg-color-text-dim);">
                            <span>| 100G/400G BGP Active</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="fg-hero-map-wrapper">
                <div class="fg-hero-map-canvas">
                    <?php if ( ! empty( $settings['map_image']['url'] ) ) : ?>
                        <img src="<?php echo esc_url( $settings['map_image']['url'] ); ?>" alt="FiberGrid Global Optical Network Map">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
