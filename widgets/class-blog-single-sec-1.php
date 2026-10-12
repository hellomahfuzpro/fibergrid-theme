<?php
/**
 * Widget: Blog Single - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSingleSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_single_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Blog Single - Section 1', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-section';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Content Settings', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Home', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => '/',
                    'is_external' => false,
                    'nofollow'    => false,
                ),
            )
        );

        $this->add_control(
            'custom_css_classes',
            array(
                'label'       => esc_html__( 'Extra CSS Classes', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'placeholder' => 'custom-class',
            )
        );

        $this->end_controls_section();

        $this->add_style_controls();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $theme_uri = get_template_directory_uri();
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Home';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '/';
        ?>

        <section class="w-full bg-surface-container-lowest border-b border-grid-line pt-8 pb-12">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1240px] mx-auto flex flex-col gap-6">
                <!-- Breadcrumb & Tag -->
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <nav class="flex items-center gap-2 font-label-ui text-label-ui text-secondary">
                        <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                        <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Insights</a>
                        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                        <span class="text-on-surface font-semibold">Article</span>
                    </nav>
                </div>
                <!-- Main Title -->
                <h1 class="font-headline-xl text-headline-xl text-on-surface lg:text-[44px] lg:leading-[52px] font-extrabold tracking-tight max-w-[1080px]">
                    Expanding Global Optical Routes: New Direct Subsea Pathways Connecting Europe, Africa, and Asia
                </h1>
                <!-- Subtitle -->
                <p class="font-body-lg text-body-lg text-secondary max-w-[980px] leading-relaxed">
                    An in-depth review of FiberGrid's multi-terabit subsea cable upgrades, regional routing telemetry, and how autonomous BGP failover guarantees 99.999% uptime for global enterprises.
                </p>
                <!-- Author Metadata & Social Interaction Bar -->
                <div class="pt-4 border-t border-grid-line flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">FG</div>
                        <div class="flex flex-col">
                            <span class="font-headline-sm text-[16px] leading-tight text-on-surface font-bold">FiberGrid Engineering</span>
                            <div class="flex items-center gap-2 text-secondary font-label-ui text-label-ui pt-0.5">
                                <span>Network Architecture</span>
                                <span>•</span>
                                <span class="font-label-mono text-label-mono"><?php echo esc_html( date( 'M j, Y' ) ); ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Social Action Pills -->
                    <div class="flex items-center gap-2">
                        <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface font-label-ui text-label-ui transition-colors" onclick="navigator.clipboard?.writeText(window.location.href);">
                            <span class="material-symbols-outlined text-[16px]">link</span>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
