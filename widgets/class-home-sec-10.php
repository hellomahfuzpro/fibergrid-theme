<?php
/**
 * Widget: Home - Section 10 (Closing CTA with Dark Enterprise Card & Full Controls)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec10 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_10';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 10 (Closing CTA)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'CTA Content', 'fibergrid' ),
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'INTERCONNECT YOUR NETWORK',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ready to interconnect your network?',
            )
        );

        $this->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Connect directly to Tier-1 upstream transit and carrier-neutral colocation facilities worldwide. Contact our engineering team for custom commits and rapid cross-connect provisioning.',
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Primary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Request Transit Quote',
            )
        );

        $this->add_control(
            'btn1_icon',
            array(
                'label'   => esc_html__( 'Primary Button Icon (Material Symbol)', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'contact_mail',
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Primary Button URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/contact/' ) ),
            )
        );

        $this->add_control(
            'btn2_text',
            array(
                'label'   => esc_html__( 'Secondary Button Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            )
        );

        $this->add_control(
            'btn2_url',
            array(
                'label'   => esc_html__( 'Secondary Button URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => home_url( '/colocation/' ) ),
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

        $eyebrow  = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'INTERCONNECT YOUR NETWORK';
        $title    = ! empty( $settings['title'] ) ? $settings['title'] : 'Ready to interconnect your network?';
        $desc     = ! empty( $settings['description'] ) ? $settings['description'] : 'Connect directly to Tier-1 upstream transit and carrier-neutral colocation facilities worldwide. Contact our engineering team for custom commits and rapid cross-connect provisioning.';
        $b1_text  = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Request Transit Quote';
        $b1_icon  = ! empty( $settings['btn1_icon'] ) ? $settings['btn1_icon'] : 'contact_mail';
        $b1_url   = ! empty( $settings['btn1_url'] ) ? $settings['btn1_url'] : array( 'url' => home_url( '/contact/' ) );
        $b2_text  = ! empty( $settings['btn2_text'] ) ? $settings['btn2_text'] : '';
        $b2_url   = ! empty( $settings['btn2_url'] ) ? $settings['btn2_url'] : array( 'url' => home_url( '/colocation/' ) );

        $b1_url_val = ! empty( $b1_url['url'] ) ? $b1_url['url'] : '#';
        $b1_target  = ! empty( $b1_url['is_external'] ) ? ' target="_blank"' : '';
        $b1_rel     = ! empty( $b1_url['nofollow'] ) ? ' rel="nofollow"' : '';
        ?>
        <section class="w-full bg-[#f8f9ff] py-14 sm:py-18 lg:py-20 <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto">
                <div class="rounded-2xl lg:rounded-3xl bg-midnight-bg text-on-primary p-8 sm:p-10 lg:p-12 shadow-2xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8 border border-white/10">
                    <!-- Ambient Glow Accents matching high-density pod card -->
                    <div class="absolute -right-20 -bottom-20 w-[450px] h-[450px] bg-gradient-to-br from-[#0066ff]/40 to-[#0050cb]/90 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-[#0050cb]/40 via-[#0050cb]/15 to-transparent pointer-events-none"></div>
                    <div class="absolute top-0 right-1/4 w-72 h-72 bg-cyan-400/10 rounded-full blur-2xl pointer-events-none"></div>

                    <!-- Content -->
                    <div class="flex flex-col gap-2.5 max-w-2xl relative z-10 text-left">
                        <?php if ( ! empty( $eyebrow ) ) : ?>
                            <div class="inline-flex items-center gap-2 text-cyan-pulse font-mono text-xs sm:text-sm uppercase tracking-wider font-bold">
                                <span class="text-base font-black leading-none">+</span>
                                <span><?php echo esc_html( $eyebrow ); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="text-2xl sm:text-3xl lg:text-[38px] font-extrabold text-white tracking-tight leading-tight">
                            <?php echo esc_html( $title ); ?>
                        </h2>
                        
                        <?php if ( ! empty( $desc ) ) : ?>
                            <p class="font-body-md text-sm sm:text-base text-white/70 leading-relaxed max-w-xl">
                                <?php echo esc_html( $desc ); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Actions -->
                    <div class="relative z-10 flex-shrink-0 flex items-center gap-4 flex-wrap justify-center lg:justify-end">
                        <a href="<?php echo esc_url( $b1_url_val ); ?>"<?php echo $b1_target . $b1_rel; ?> class="inline-flex items-center gap-2.5 px-6 py-3.5 sm:px-7 sm:py-4 rounded-xl bg-white text-deep-navy font-bold text-sm sm:text-base hover:bg-surface-ice transition-all shadow-lg hover:shadow-xl group">
                            <?php if ( ! empty( $b1_icon ) ) : ?>
                                <span class="material-symbols-outlined text-[20px] text-optical-blue group-hover:scale-110 transition-transform"><?php echo esc_html( $b1_icon ); ?></span>
                            <?php endif; ?>
                            <span><?php echo esc_html( $b1_text ); ?></span>
                        </a>

                        <?php if ( ! empty( $b2_text ) ) : 
                            $b2_url_val = ! empty( $b2_url['url'] ) ? $b2_url['url'] : '#';
                            $b2_target  = ! empty( $b2_url['is_external'] ) ? ' target="_blank"' : '';
                            $b2_rel     = ! empty( $b2_url['nofollow'] ) ? ' rel="nofollow"' : '';
                        ?>
                            <a href="<?php echo esc_url( $b2_url_val ); ?>"<?php echo $b2_target . $b2_rel; ?> class="inline-flex items-center gap-2 px-6 py-3.5 sm:px-7 sm:py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-sm sm:text-base transition-all">
                                <span><?php echo esc_html( $b2_text ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
