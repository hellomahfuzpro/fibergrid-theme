<?php
/**
 * Widget: About Us - Section 6
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec6 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_6';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 6', 'fibergrid' );
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
                'default' => esc_html__( 'Executive Commitment', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => '"Engineers Talking to Engineers: Real Accountability, Zero Scripted Call Centers."',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'When a latency spike occurs or an automated upstream route degrades across an ocean segment, automated ticketing queues with twenty questions do not solve problems. What solves problems is direct, unencumbered access to senior BGP routing specialists who can verify routing tables and issue commands within minutes.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCeVm9ylHYoww_rRTNZygmaH_cpt0rK-CWuUbcCXNjIIk-Th8r7UvKozvrtXRfWYlRQIrPoKinKx6knHPqwf9keXPuodw1_bX0Upu7ohynCST3C9P0MSaEiMTDRzh2oUtM43HdnIT73p8j2B9aCruXiFFp5Nw7lIB50kAKlRk-l6DJj2w6zEsLrhPLurkb0LcpZnBPwsHJAPLgtFsB9t9mk8_NSIVfljVaDxJHrxN4b7h8XFnJKRRmS3A',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Executive Commitment';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : '"Engineers Talking to Engineers: Real Accountability, Zero Scripted Call Centers."';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'When a latency spike occurs or an automated upstream route degrades across an ocean segment, automated ticketing queues with twenty questions do not solve problems. What solves problems is direct, unencumbered access to senior BGP routing specialists who can verify routing tables and issue commands within minutes.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCeVm9ylHYoww_rRTNZygmaH_cpt0rK-CWuUbcCXNjIIk-Th8r7UvKozvrtXRfWYlRQIrPoKinKx6knHPqwf9keXPuodw1_bX0Upu7ohynCST3C9P0MSaEiMTDRzh2oUtM43HdnIT73p8j2B9aCruXiFFp5Nw7lIB50kAKlRk-l6DJj2w6zEsLrhPLurkb0LcpZnBPwsHJAPLgtFsB9t9mk8_NSIVfljVaDxJHrxN4b7h8XFnJKRRmS3A';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 lg:py-28" id="engineering-leadership">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left: Image of Technical Leadership / NOC Operations -->
<div class="lg:col-span-5 relative">
<div class="w-full rounded-2xl overflow-hidden shadow-2xl relative min-h-[400px] lg:min-h-[480px]">
<img class="absolute inset-0 w-full h-full object-cover" data-alt="Portrait of senior network systems infrastructure architect standing confidently in an enterprise server room bathed in dramatic cool blue optic lighting and data server rack arrays, wearing minimalist navy technical apparel, sharp gaze symbolizing unwavering operational excellence." src="<?php echo esc_url( $image_1 ); ?>">
<div class="absolute inset-0 bg-gradient-to-t from-deep-navy/80 via-transparent to-transparent"></div>
<div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-surface-container-lowest/90 backdrop-blur-md">
<div class="font-headline-sm text-headline-sm text-deep-navy">Marc van Niekerk</div>
<div class="font-label-mono text-label-mono text-primary font-semibold">Chief Technology Officer &amp; VP Network Engineering</div>
</div>
</div>
</div>
<!-- Right: The Operational Manifesto -->
<div class="lg:col-span-7 flex flex-col">
<span class="font-label-mono text-label-mono text-primary font-bold uppercase tracking-wider mb-3"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-lg lg:text-headline-xl text-on-surface mb-6">
            <?php echo wp_kses_post( $title ); ?>
          </h2>
<div class="space-y-4 font-body-md text-body-md text-on-surface-variant leading-relaxed mb-8">
<p class=""><?php echo esc_html( $desc ); ?></p>
<p class="">
              At FiberGrid, our Network Operations Center (NOC) operates under a continuous Level-3 escalation baseline. Whether you manage a singular bare-metal rack in Cape Town or thousands of multi-gigabit IP transit ports distributed across Europe and Asia, our operations crew is physically and digitally synchronized around the clock.
            </p>
</div>
<!-- Feature Grid with Icons -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4">
<div class="flex flex-col">
<span class="material-symbols-outlined text-optical-blue text-3xl mb-2">support_agent</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface mb-1">15-Minute Response</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Guaranteed SLA response times for Tier-1 network escalations.</span>
</div>
<div class="flex flex-col">
<span class="material-symbols-outlined text-optical-blue text-3xl mb-2">hardware</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface mb-1">Hands &amp; Feet NOC</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Physical hardware swaps, fiber loopbacks, and optic replacement on demand.</span>
</div>
<div class="flex flex-col">
<span class="material-symbols-outlined text-optical-blue text-3xl mb-2">policy</span>
<span class="font-label-ui text-label-ui font-bold text-on-surface mb-1">SLA Backing</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Contractual 100% uptime commitments backed by service fee credits.</span>
</div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
