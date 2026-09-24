<?php
/**
 * FiberGrid — Technical Engineering Posts Grid Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Posts_Grid extends FG_Widget_Base {

    public function get_name() {
        return 'fg_posts_grid';
    }

    public function get_title() {
        return __( 'Engineering Articles Grid', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Blog Section Header', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Engineering Briefs & Telemetry Insights',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Technical Infrastructure & Subsea Network Analysis',
            )
        );

        $this->add_control(
            'posts_count',
            array(
                'label'   => __( 'Number of Posts', 'fibergrid' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 20,
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-posts-section' );

        $count = ! empty( $settings['posts_count'] ) ? absint( $settings['posts_count'] ) : 6;
        $query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => $count,
            'post_status'    => 'publish',
        ) );
        ?>
        <div style="text-align:center;max-width:760px;margin:0 auto 48px;">
            <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 style="font-size:36px;font-weight:800;color:var(--fg-color-secondary);margin-top:6px;"><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php endif; ?>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:32px;">
            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <article class="fg-card" style="display:flex;flex-direction:column;justify-content:space-between;padding:0;overflow:hidden;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div style="height:200px;overflow:hidden;background:#f3f4f6;">
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                            </div>
                        <?php endif; ?>
                        <div style="padding:28px;flex:1;display:flex;flex-direction:column;justify-content:space-between;">
                            <div>
                                <div style="font-family:var(--fg-font-mono);font-size:11px;color:var(--fg-color-primary);font-weight:700;margin-bottom:8px;">
                                    <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                                </div>
                                <h3 style="font-size:20px;font-weight:800;margin:0 0 10px;line-height:1.3;">
                                    <a href="<?php the_permalink(); ?>" style="color:var(--fg-color-secondary);text-decoration:none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.6;margin:0 0 18px;">
                                    <?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?>
                                </p>
                            </div>
                            <div>
                                <a href="<?php the_permalink(); ?>" class="fg-btn fg-btn-secondary" style="font-size:13px;padding:8px 16px;">
                                    <?php esc_html_e( 'Read Analysis &rarr;', 'fibergrid' ); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback Technical Brief Sample Cards -->
                <article class="fg-card" style="padding:32px;">
                    <span class="fg-badge fg-badge-cyan" style="margin-bottom:12px;">SUBSEA CABLE EXPANSION</span>
                    <h3 style="font-size:20px;font-weight:800;color:var(--fg-color-secondary);margin:0 0 10px;">Subsea Cable Expansion 2024: Activating Direct African to European Optical Rings</h3>
                    <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.6;margin-bottom:20px;">
                        Technical overview of our newly deployed transoceanic fiber wavelengths cutting latency to under 98ms round-trip to London.
                    </p>
                    <a href="#" class="fg-btn fg-btn-secondary" style="font-size:13px;padding:8px 16px;">Read Whitepaper &rarr;</a>
                </article>

                <article class="fg-card" style="padding:32px;">
                    <span class="fg-badge fg-badge-blue" style="margin-bottom:12px;">BGP ROUTING OPTIMIZATION</span>
                    <h3 style="font-size:20px;font-weight:800;color:var(--fg-color-secondary);margin:0 0 10px;">BGP Optimization at Scale: Zero Packet Loss Under Terabit DDoS Events</h3>
                    <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.6;margin-bottom:20px;">
                        How FiberGrid combines Anycast routing scrubbers with upstream peering community signals to suppress volumetric attacks.
                    </p>
                    <a href="#" class="fg-btn fg-btn-secondary" style="font-size:13px;padding:8px 16px;">Read Whitepaper &rarr;</a>
                </article>

                <article class="fg-card" style="padding:32px;">
                    <span class="fg-badge fg-badge-amber" style="margin-bottom:12px;">CLOUD & VDC ARCHITECTURE</span>
                    <h3 style="font-size:20px;font-weight:800;color:var(--fg-color-secondary);margin:0 0 10px;">Private Cloud VDC: Designing Multi-Tier Storage with NVMe Over Fabrics</h3>
                    <p style="font-size:14px;color:var(--fg-color-text-muted);line-height:1.6;margin-bottom:20px;">
                        Architectural walkthrough of low-latency storage topologies delivering over 1.2M IOPS per rack cluster.
                    </p>
                    <a href="#" class="fg-btn fg-btn-secondary" style="font-size:13px;padding:8px 16px;">Read Whitepaper &rarr;</a>
                </article>
            <?php endif; ?>
        </div>
        <?php
        $this->render_section_close();
    }
}
