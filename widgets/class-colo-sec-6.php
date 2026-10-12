<?php
/**
 * Widget: Colocation - Section 6
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec6 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_6';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 6', 'fibergrid' );
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
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Complimentary Hardware Racking &amp; 24/7 Remote Hands &amp; Eyes',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Ship your pre-configured chassis or unpack factory-sealed servers on-site. Our certified field infrastructure engineers handle the entire mounting, patch labeling, and power mapping sequence at zero onboarding expense.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJbugE8DKw4jLq0lJ7eWXQoxx6tpHTmpRgsAaZIsOBP4_mdb36NmEm9zD2IEyhWgcihZDtdS5OiCfkRdxHjBKPZPdIh8F2U7XOFlRpZCHTQdONEfgNhEJfaLuvklGUmdsZk8SSN9XvmyvUTl2rkB9Xvmri9iy-xv_6lqCqDHs9B5hjfTr89AoxsDJlR023HJqER5HsD7v-LrIhirhUmyi6I1tjVbBFIlc5afIt3_J1xbz7SLGGo8iJSA',
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
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Complimentary Hardware Racking &amp; 24/7 Remote Hands &amp; Eyes';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Ship your pre-configured chassis or unpack factory-sealed servers on-site. Our certified field infrastructure engineers handle the entire mounting, patch labeling, and power mapping sequence at zero onboarding expense.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJbugE8DKw4jLq0lJ7eWXQoxx6tpHTmpRgsAaZIsOBP4_mdb36NmEm9zD2IEyhWgcihZDtdS5OiCfkRdxHjBKPZPdIh8F2U7XOFlRpZCHTQdONEfgNhEJfaLuvklGUmdsZk8SSN9XvmyvUTl2rkB9Xvmri9iy-xv_6lqCqDHs9B5hjfTr89AoxsDJlR023HJqER5HsD7v-LrIhirhUmyi6I1tjVbBFIlc5afIt3_J1xbz7SLGGo8iJSA';
        ?>

        <section class="w-full bg-surface-container-low py-20 lg:py-28">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch"><div class="lg:col-span-6 flex flex-col gap-6"><h2 class="font-headline-xl text-headline-xl text-deep-navy tracking-tight leading-snug"><?php echo wp_kses_post( $title ); ?></h2><p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed"><?php echo esc_html( $desc ); ?></p><div class="flex flex-col gap-4 pt-2"><div class="flex items-start gap-3.5 p-4 rounded-xl bg-surface-container-lowest shadow-sm"><div class="w-10 h-10 rounded-lg bg-surface-ice text-primary flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-[24px]">precision_manufacturing</span></div><div><h4 class="font-headline-sm text-body-lg font-bold text-deep-navy">Complimentary Hardware Racking &amp; Cabling</h4><p class="font-body-sm text-body-sm text-on-surface-variant pt-1">Includes rail assembly, torque-specified chassis bolting, color-coded Cat6A / SMF fiber patching, and comprehensive port validation documentation.</p></div></div><div class="flex items-start gap-3.5 p-4 rounded-xl bg-surface-container-lowest shadow-sm"><div class="w-10 h-10 rounded-lg bg-surface-ice text-optical-blue flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-[24px]">construction</span></div><div><h4 class="font-headline-sm text-body-lg font-bold text-deep-navy">Sub-15 Minute Ticket Response SLA</h4><p class="font-body-sm text-body-sm text-on-surface-variant pt-1">From emergency hard power cycling and hot-swap drive replacements to loopback diagnostic testing and optical OTDR fiber validation.</p></div></div><div class="flex items-start gap-3.5 p-4 rounded-xl bg-surface-container-lowest shadow-sm"><div class="w-10 h-10 rounded-lg bg-surface-ice text-route-orange flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-[24px]">inventory_2</span></div><div><h4 class="font-headline-sm text-body-lg font-bold text-deep-navy">Secure Staging &amp; Spare Parts Vault</h4><p class="font-body-sm text-body-sm text-on-surface-variant pt-1">Keep cold-spare power supplies, line cards, and transceivers in our climate-controlled on-site bonded vault ready for immediate hot insertion.</p></div></div></div></div><div class="lg:col-span-6 h-full flex flex-col"><div class="relative w-full flex-1 h-full min-h-[380px] rounded-2xl overflow-hidden shadow-xl border border-slate-200"><img src="<?php echo esc_url( $image_1 ); ?>" alt="Complimentary Hardware Racking and Deployment" class="w-full h-full object-cover rounded-2xl"></div></div></div>
</div>
</section>
        
        <?php
    }
}
