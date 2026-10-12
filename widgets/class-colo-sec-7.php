<?php
/**
 * Widget: Colocation - Section 7
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec7 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_7';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 7', 'fibergrid' );
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
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'PHYSICAL INSPECTION', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Schedule an On-Site Facility Audit or Escorted Walkthrough',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Verify our physical safeguards firsthand. Our senior facilities director will escort your technical team through the generator yard, UPS battery galleries, Meet-Me-Rooms, and designated rack suites.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_text',
            array(
                'label'   => esc_html__( 'Action Link Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Contact Operations Desk', 'fibergrid' ),
            )
        );

        $this->add_control(
            'btn1_url',
            array(
                'label'   => esc_html__( 'Action Link URL', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url'         => home_url( '/contact/' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'PHYSICAL INSPECTION';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Schedule an On-Site Facility Audit or Escorted Walkthrough';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Verify our physical safeguards firsthand. Our senior facilities director will escort your technical team through the generator yard, UPS battery galleries, Meet-Me-Rooms, and designated rack suites.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Contact Operations Desk';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : home_url( '/contact/' );
        ?>

        <section class="w-full bg-surface-container-lowest py-20 lg:py-28" id="facility-booking">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="rounded-3xl bg-surface-ice p-8 lg:p-14 shadow-xl">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
<!-- Booking Overview Left -->
<div class="lg:col-span-5 flex flex-col gap-6">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high text-primary w-fit">
<span class="material-symbols-outlined text-[16px]">visibility</span>
<span class="font-label-mono text-label-mono font-bold uppercase"><?php echo esc_html( $eyebrow ); ?></span>
</div>
<h2 class="font-headline-xl text-headline-xl text-deep-navy tracking-tight leading-snug">
              <?php echo wp_kses_post( $title ); ?>
            </h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed"><?php echo esc_html( $desc ); ?></p>
<div class="flex flex-col gap-3 pt-2 font-body-sm">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-optical-blue text-[20px]">badge</span>
<span class="text-deep-navy font-medium">Valid Government ID required for mantrap access pass</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-optical-blue text-[20px]">electric_bolt</span>
<span class="text-deep-navy font-medium">Substation and transformer room walkthrough included</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-optical-blue text-[20px]">videocam_off</span>
<span class="text-deep-navy font-medium">Strict NDA security protocol observed inside customer suites</span>
</div>
</div>
<!-- Direct Contact Box -->
<div class="mt-4 p-5 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-1">
<span class="font-label-mono text-[11px] uppercase text-secondary font-bold">Direct NOC Operations Desk</span>
<a class="font-tech-metric-md text-deep-navy hover:text-primary transition-colors" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_text ); ?></a>
<span class="text-on-surface-variant text-xs">Mon-Sun 24/7 Rapid Response</span>
</div>
</div>
<!-- Interactive Booking Form Right -->
<div class="lg:col-span-7">
<div class="rounded-2xl bg-surface-container-lowest p-8 lg:p-10 shadow-md">
<h3 class="font-headline-md text-headline-md text-deep-navy font-bold pb-2">Request Facility Access Clearance</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pb-8">Fill in your corporate credentials to receive your visitor authorization code.</p>
<form class="fg-facility-form" class="flex flex-col gap-5" id="inspection-form" onsubmit="event.preventDefault(); document.getElementById('form-feedback').classList.remove('hidden');">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Full Name *</label>
<input class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="e.g. Alex Morgan" required="" type="text">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Corporate Email *</label>
<input class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="alex@enterprise.com" required="" type="email">
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Company / Organization *</label>
<input class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="Organization Ltd" required="" type="text">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Data Center Location *</label>
<select class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all">
<option>Johannesburg DC-1 (South Africa)</option>
<option>Cape Town Waterfront DC-2 (South Africa)</option>
<option>London Docklands Tier III (UK)</option>
<option>Frankfurt Main Fiber Hub (Germany)</option>
<option>Singapore Equinix SG1 Linked (APAC)</option>
</select>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Footprint Requirement *</label>
<select class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all">
<option>Full Rack (42U) - Recommended</option>
<option>Half Rack (21U)</option>
<option>Quarter Rack (10U)</option>
<option>High Density Cage / Pod (10kW - 40kW)</option>
<option>Custom Colocation Suite</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Preferred Inspection Date *</label>
<input class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all" required="" type="date">
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-ui text-label-ui font-semibold text-deep-navy">Power &amp; Connectivity Notes (Optional)</label>
<textarea class="w-full px-4 py-3 rounded-lg bg-surface-ice text-deep-navy text-body-sm focus:outline-none focus:bg-surface-container-lowest transition-all" placeholder="Specify voltage (e.g. 230V / 400V), estimated kW draw, or specific carrier cross-connect demands..." rows="3"></textarea>
</div>
<button class="w-full py-4 px-6 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-bold hover:bg-primary shadow-lg hover:shadow-optical-blue/30 transition-all flex items-center justify-center gap-2 mt-2" type="submit">
<span class="material-symbols-outlined text-[20px]">badge</span>
                  Submit Facility Access Request
                </button>
<!-- Feedback Toast -->
<div class="hidden p-4 rounded-lg bg-status-healthy/10 text-status-healthy font-body-sm flex items-center gap-3" id="form-feedback">
<span class="material-symbols-outlined">check_circle</span>
<span class="">Your visit request has been recorded. Our facility operations security team will email your entrance QR pass and visitor protocol within 2 hours.</span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
