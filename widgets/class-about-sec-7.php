<?php
/**
 * Widget: About Us - Section 7 (Carrier Ecosystem & Industry Standards Bento)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec7 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_7';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 7 (Partners & Standards)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-inner-section';
    }

    protected function register_controls() {
        // 1. Header Section
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Header Content', 'fibergrid' ),
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Carrier Ecosystem', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Tier-1 Transit Partners &amp; Industry Standards',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We maintain direct peering relations and transit interconnects with the world’s leading Tier-1 carriers to guarantee the shortest AS-path hop count worldwide.', 'fibergrid' ),
            )
        );

        $this->end_controls_section();

        // 2. Carrier Partners Repeater (Completely Editable with text or optional logo)
        $this->start_controls_section(
            'section_partners',
            array(
                'label' => esc_html__( 'Carrier Partners & Logos', 'fibergrid' ),
            )
        );

        $repeater_partners = new \Elementor\Repeater();

        $repeater_partners->add_control(
            'partner_name',
            array(
                'label'       => esc_html__( 'Partner Name / Text', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'COGENT',
                'label_block' => true,
            )
        );

        $repeater_partners->add_control(
            'partner_logo',
            array(
                'label'       => esc_html__( 'Partner Logo Image (Optional)', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__( 'If uploaded, the image logo is displayed. If empty, the stylized text badge is displayed.', 'fibergrid' ),
            )
        );

        $repeater_partners->add_control(
            'partner_url',
            array(
                'label'       => esc_html__( 'Partner Link (Optional)', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://...',
            )
        );

        $this->add_control(
            'partners_list',
            array(
                'label'       => esc_html__( 'Partners List', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater_partners->get_controls(),
                'title_field' => '{{{ partner_name }}}',
                'default'     => array(
                    array(
                        'partner_name' => 'COGENT',
                    ),
                    array(
                        'partner_name' => 'ZAYO',
                    ),
                    array(
                        'partner_name' => 'NTT COMMS',
                    ),
                    array(
                        'partner_name' => 'TELIA / ARENION',
                    ),
                    array(
                        'partner_name' => 'HE.NET',
                    ),
                    array(
                        'partner_name' => 'TATA COMM',
                    ),
                ),
            )
        );

        $this->end_controls_section();

        // 3. Compliance & Standards Cards Repeater
        $this->start_controls_section(
            'section_standards',
            array(
                'label' => esc_html__( 'Standards & Compliance Bento', 'fibergrid' ),
            )
        );

        $repeater_standards = new \Elementor\Repeater();

        $repeater_standards->add_control(
            'title',
            array(
                'label'       => esc_html__( 'Standard Title', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'TIA-942 Tier III',
                'label_block' => true,
            )
        );

        $repeater_standards->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => 'Concurrently maintainable site infrastructure with dual independent power distributions and redundant precision chillers.',
            )
        );

        $repeater_standards->add_control(
            'icon',
            array(
                'label'   => esc_html__( 'Material Symbol Icon', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'verified',
            )
        );

        $repeater_standards->add_control(
            'icon_color',
            array(
                'label'   => esc_html__( 'Icon Accent Color', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'text-primary',
                'options' => array(
                    'text-primary'        => esc_html__( 'Primary Blue (#0050cb)', 'fibergrid' ),
                    'text-status-healthy' => esc_html__( 'Status Green (#10b981)', 'fibergrid' ),
                    'text-optical-blue'   => esc_html__( 'Optical Cyan (#0066ff)', 'fibergrid' ),
                    'text-route-orange'   => esc_html__( 'Route Orange (#ff5e14)', 'fibergrid' ),
                    'text-signal-amber'   => esc_html__( 'Signal Amber (#f59e0b)', 'fibergrid' ),
                ),
            )
        );

        $this->add_control(
            'standards_list',
            array(
                'label'       => esc_html__( 'Compliance Cards', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater_standards->get_controls(),
                'title_field' => '{{{ title }}}',
                'default'     => array(
                    array(
                        'icon'        => 'verified',
                        'icon_color'  => 'text-primary',
                        'title'       => 'TIA-942 Tier III',
                        'description' => 'Concurrently maintainable site infrastructure with dual independent power distributions and redundant precision chillers.',
                    ),
                    array(
                        'icon'        => 'lock',
                        'icon_color'  => 'text-status-healthy',
                        'title'       => 'ISO/IEC 27001',
                        'description' => 'Enterprise information security management governing physical access controls, perimeter surveillance, and cage containment.',
                    ),
                    array(
                        'icon'        => 'route',
                        'icon_color'  => 'text-optical-blue',
                        'title'       => 'BGP4 & IPv6 Ready',
                        'description' => 'Full dual-stack IPv4/IPv6 allocation across all POPs with granular BGP community control for custom route engineering.',
                    ),
                ),
            )
        );

        $this->end_controls_section();

        // Extra CSS
        $this->start_controls_section(
            'section_extra',
            array(
                'label' => esc_html__( 'Extra Settings', 'fibergrid' ),
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

        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Carrier Ecosystem';
        $title   = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Tier-1 Transit Partners &amp; Industry Standards';
        $desc    = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'We maintain direct peering relations and transit interconnects with the world’s leading Tier-1 carriers to guarantee the shortest AS-path hop count worldwide.';

        $partners = ! empty( $settings['partners_list'] ) ? $settings['partners_list'] : array(
            array( 'partner_name' => 'COGENT' ),
            array( 'partner_name' => 'ZAYO' ),
            array( 'partner_name' => 'NTT COMMS' ),
            array( 'partner_name' => 'TELIA / ARENION' ),
            array( 'partner_name' => 'HE.NET' ),
            array( 'partner_name' => 'TATA COMM' ),
        );

        $standards = ! empty( $settings['standards_list'] ) ? $settings['standards_list'] : array(
            array(
                'icon'        => 'verified',
                'icon_color'  => 'text-primary',
                'title'       => 'TIA-942 Tier III',
                'description' => 'Concurrently maintainable site infrastructure with dual independent power distributions and redundant precision chillers.',
            ),
            array(
                'icon'        => 'lock',
                'icon_color'  => 'text-status-healthy',
                'title'       => 'ISO/IEC 27001',
                'description' => 'Enterprise information security management governing physical access controls, perimeter surveillance, and cage containment.',
            ),
            array(
                'icon'        => 'route',
                'icon_color'  => 'text-optical-blue',
                'title'       => 'BGP4 & IPv6 Ready',
                'description' => 'Full dual-stack IPv4/IPv6 allocation across all POPs with granular BGP community control for custom route engineering.',
            ),
        );
        ?>
        <section class="w-full bg-surface-container-low py-16 lg:py-24 <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-14">
                    <?php if ( ! empty( $eyebrow ) ) : ?>
                        <span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $eyebrow ); ?></span>
                    <?php endif; ?>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4"><?php echo wp_kses_post( $title ); ?></h2>
                    <?php if ( ! empty( $desc ) ) : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $desc ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Carrier Partners Ribbon -->
                <?php if ( ! empty( $partners ) && is_array( $partners ) ) : ?>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-items-center mb-16">
                        <?php foreach ( $partners as $item ) : 
                            $name       = ! empty( $item['partner_name'] ) ? $item['partner_name'] : '';
                            // Remove any remaining ASN numbers just in case
                            $clean_name = preg_replace( '/\s*\(AS\d+\)/i', '', $name );
                            $logo_url   = ! empty( $item['partner_logo']['url'] ) ? $item['partner_logo']['url'] : '';
                            $item_url   = ! empty( $item['partner_url']['url'] ) ? $item['partner_url']['url'] : '';
                            $target     = ! empty( $item['partner_url']['is_external'] ) ? ' target="_blank"' : '';
                            $nofollow   = ! empty( $item['partner_url']['nofollow'] ) ? ' rel="nofollow"' : '';
                            
                            $tag  = ! empty( $item_url ) ? 'a' : 'div';
                            $href = ! empty( $item_url ) ? ' href="' . esc_url( $item_url ) . '"' . $target . $nofollow : '';
                        ?>
                            <<?php echo $tag . $href; ?> class="h-16 w-full flex items-center justify-center p-4 bg-surface-container-lowest rounded-xl shadow-sm text-on-surface font-headline-sm font-black tracking-widest opacity-80 hover:opacity-100 hover:text-optical-blue transition-all text-center">
                                <?php if ( ! empty( $logo_url ) ) : ?>
                                    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $clean_name ); ?>" class="max-h-8 max-w-[120px] object-contain">
                                <?php else : ?>
                                    <span><?php echo esc_html( $clean_name ); ?></span>
                                <?php endif; ?>
                            </<?php echo $tag; ?>>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Compliance & Standard Badges Bento -->
                <?php if ( ! empty( $standards ) && is_array( $standards ) ) : ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php foreach ( $standards as $card ) : 
                            $card_icon  = ! empty( $card['icon'] ) ? $card['icon'] : 'verified';
                            $card_color = ! empty( $card['icon_color'] ) ? $card['icon_color'] : 'text-primary';
                            $card_title = ! empty( $card['title'] ) ? $card['title'] : '';
                            $card_desc  = ! empty( $card['description'] ) ? $card['description'] : '';
                        ?>
                            <div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex items-start gap-4">
                                <div class="p-3 rounded-lg bg-surface-container-low <?php echo esc_attr( $card_color ); ?> shrink-0">
                                    <span class="material-symbols-outlined text-2xl"><?php echo esc_html( $card_icon ); ?></span>
                                </div>
                                <div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1"><?php echo esc_html( $card_title ); ?></h3>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php echo esc_html( $card_desc ); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
