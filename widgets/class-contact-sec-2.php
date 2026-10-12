<?php
/**
 * Widget: Contact - Section 2 (Inquiry Dispatch Form & Direct Engineering Dispatch Card)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ContactSec2 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_contact_sec_2';
    }

    public function get_title() {
        return esc_html__( 'Contact - Section 2 (Inquiry Form)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    protected function register_controls() {
        // Left Column Content
        $this->start_controls_section(
            'section_left_content',
            array(
                'label' => esc_html__( 'Overview & Portal Settings', 'fibergrid' ),
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => esc_html__( 'Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Direct Engineering Dispatch',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Contact Us',
            )
        );

        $this->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Technical support is always free of charge. Our primary goal is to get your IP transit, colocation, or optical cross-connect active quickly with zero friction, keeping your network operating at peak performance 24/7/365.',
            )
        );

        $this->add_control(
            'portal_card_title',
            array(
                'label'   => esc_html__( 'Support Card Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Direct Engineering Dispatch',
            )
        );

        $this->add_control(
            'portal_card_text',
            array(
                'label'   => esc_html__( 'Support Card Text', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Our network operations center monitors BGP routes, optical wavelengths, and physical infrastructure around the clock. Inquiries submitted via this form are routed directly to on-call network engineers.',
            )
        );

        $this->add_control(
            'portal_card_link',
            array(
                'label'   => esc_html__( 'Support Card Link', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array( 'url' => '#contactForm' ),
            )
        );

        $this->end_controls_section();

        // Right Column Form
        $this->start_controls_section(
            'section_form_content',
            array(
                'label' => esc_html__( 'Form Header', 'fibergrid' ),
            )
        );

        $this->add_control(
            'form_eyebrow',
            array(
                'label'   => esc_html__( 'Form Eyebrow', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Inquiry Dispatch',
            )
        );

        $this->add_control(
            'form_title',
            array(
                'label'   => esc_html__( 'Form Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Send a Message or Request Engineering Quote',
            )
        );

        $this->add_control(
            'form_description',
            array(
                'label'   => esc_html__( 'Form Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Complete the fields below. Incoming requests are routed straight to our regional NOC and account managers.',
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

        $eyebrow     = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'Direct Engineering Dispatch';
        $title       = ! empty( $settings['title'] ) ? $settings['title'] : 'Contact Us';
        $desc        = ! empty( $settings['description'] ) ? $settings['description'] : 'Technical support is always free of charge. Our primary goal is to get your IP transit, colocation, or optical cross-connect active quickly with zero friction, keeping your network operating at peak performance 24/7/365.';
        $p_title     = ! empty( $settings['portal_card_title'] ) ? $settings['portal_card_title'] : 'Direct Engineering Dispatch';
        $p_text      = ! empty( $settings['portal_card_text'] ) ? $settings['portal_card_text'] : 'Our network operations center monitors BGP routes, optical wavelengths, and physical infrastructure around the clock. Inquiries submitted via this form are routed directly to on-call network engineers.';
        $p_url       = ! empty( $settings['portal_card_link']['url'] ) ? $settings['portal_card_link']['url'] : '#contactForm';

        $form_eyebrow = ! empty( $settings['form_eyebrow'] ) ? $settings['form_eyebrow'] : 'Inquiry Dispatch';
        $form_title   = ! empty( $settings['form_title'] ) ? $settings['form_title'] : 'Send a Message or Request Engineering Quote';
        $form_desc    = ! empty( $settings['form_description'] ) ? $settings['form_description'] : 'Complete the fields below. Incoming requests are routed straight to our regional NOC and account managers.';
        ?>
        <section class="w-full py-12 lg:py-16 <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>">
            <div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    <!-- Left Column: Context, Value Proposition & NOC Support Card -->
                    <div class="lg:col-span-5 flex flex-col gap-8">
                        <div class="flex flex-col gap-4">
                            <div class="inline-flex items-center gap-1.5 font-label-mono text-label-mono text-optical-blue tracking-wide uppercase font-semibold">
                                <span class="material-symbols-outlined text-sm">hub</span>
                                <?php echo esc_html( $eyebrow ); ?>
                            </div>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface">
                                <?php echo esc_html( $title ); ?>
                            </h2>
                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                <?php echo esc_html( $desc ); ?>
                            </p>
                        </div>

                        <!-- Value Checklist -->
                        <div class="flex flex-col gap-3.5">
                            <span class="font-label-ui text-label-ui uppercase tracking-wider text-on-surface font-bold">
                                Our engineering team can help you:
                            </span>
                            <div class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-optical-blue/10 text-optical-blue flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <span class="font-body-md text-body-md text-on-surface">Answer technical questions regarding IP transit routes, BGP communities, and dual-stack IPv4/IPv6 allocation.</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-optical-blue/10 text-optical-blue flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <span class="font-body-md text-body-md text-on-surface">Access custom bandwidth pricing, commit burst levels, and multi-cabinet colocation volume discounts.</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-optical-blue/10 text-optical-blue flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <span class="font-body-md text-body-md text-on-surface">Get started on FiberGrid faster with complimentary remote racking, patch cross-connects, and seamless migration assistance.</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-optical-blue/10 text-optical-blue flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <span class="font-body-md text-body-md text-on-surface">Design tailored high-availability multi-homed transit topologies to meet your SLA.</span>
                            </div>
                        </div>

                        <!-- Direct Engineering Dispatch Card -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden flex flex-col gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-surface-container-high text-optical-blue flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">terminal</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">
                                        <?php echo esc_html( $p_title ); ?>
                                    </h3>
                                    <span class="font-label-mono text-xs text-status-healthy font-semibold flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-status-healthy"></span> 24/7/365 NOC On-Call
                                    </span>
                                </div>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                <?php echo esc_html( $p_text ); ?>
                            </p>
                            <a class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-lg bg-surface-container text-deep-navy font-label-ui text-label-ui font-semibold hover:bg-surface-container-high transition-colors self-start" href="<?php echo esc_url( $p_url ); ?>">
                                <span>Submit Direct Dispatch</span>
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Interactive Dispatch & Quote Form -->
                    <div class="lg:col-span-7">
                        <div class="bg-surface-container-lowest p-8 lg:p-10 rounded-xl shadow-md flex flex-col gap-6">
                            <div class="flex flex-col gap-1">
                                <span class="font-label-mono text-label-mono uppercase tracking-wider text-optical-blue font-bold"><?php echo esc_html( $form_eyebrow ); ?></span>
                                <h3 class="font-headline-md text-headline-md text-on-surface font-bold">
                                    <?php echo esc_html( $form_title ); ?>
                                </h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    <?php echo esc_html( $form_desc ); ?>
                                </p>
                            </div>
                            <form class="fg-inquiry-form flex flex-col gap-5" id="contactForm">
                                <!-- Department Select -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="font-label-ui text-label-ui text-on-surface font-medium" for="department">Select Department</label>
                                    <div class="relative">
                                        <select class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 appearance-none focus:outline-none focus:bg-surface-container-lowest shadow-sm pr-10" id="department" name="department" required="">
                                            <option value="support">Technical Support &amp; NOC (24/7 Priority)</option>
                                            <option value="sales">Enterprise Sales &amp; Custom Transit Quotes</option>
                                            <option value="colocation">Colocation &amp; Facility Access</option>
                                            <option value="peering">Peering, Looking Glass &amp; BGP Policies</option>
                                            <option value="billing">Billing &amp; Invoicing Accounts</option>
                                        </select>
                                        <span class="material-symbols-outlined absolute right-3 top-3.5 text-on-surface-variant pointer-events-none">expand_more</span>
                                    </div>
                                </div>
                                <!-- Two Column Fields: Name & Phone -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="font-label-ui text-label-ui text-on-surface font-medium" for="userName">Your Name</label>
                                        <input class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 focus:outline-none focus:bg-surface-container-lowest shadow-sm placeholder:text-outline" id="userName" name="name" placeholder="Alexander Vance" required="" type="text">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="font-label-ui text-label-ui text-on-surface font-medium" for="userPhone">Your Phone Number</label>
                                        <input class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 focus:outline-none focus:bg-surface-container-lowest shadow-sm placeholder:text-outline" id="userPhone" name="phone" placeholder="+1 / +44 / +27 ..." type="tel">
                                    </div>
                                </div>
                                <!-- Two Column Fields: Email & Company -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="font-label-ui text-label-ui text-on-surface font-medium" for="userEmail">Your Business Email Address</label>
                                        <input class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 focus:outline-none focus:bg-surface-container-lowest shadow-sm placeholder:text-outline" id="userEmail" name="email" placeholder="alex@company.com" required="" type="email">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="font-label-ui text-label-ui text-on-surface font-medium" for="userCompany">Company or ASN</label>
                                        <input class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 focus:outline-none focus:bg-surface-container-lowest shadow-sm placeholder:text-outline" id="userCompany" name="company" placeholder="Acme Telecom / AS65001" type="text">
                                    </div>
                                </div>
                                <!-- Service Requirements (Only IP Transit, Colocation, Peering) -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="font-label-ui text-label-ui text-on-surface font-medium">Primary Requirement</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                        <label class="cursor-pointer">
                                            <input checked="" class="peer sr-only" name="requirement" type="radio" value="IP Transit">
                                            <div class="px-3 py-2.5 rounded-lg bg-surface-ice text-on-surface-variant font-label-ui text-xs text-center peer-checked:bg-optical-blue peer-checked:text-on-primary transition-colors font-medium">
                                                IP Transit
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input class="peer sr-only" name="requirement" type="radio" value="Colocation">
                                            <div class="px-3 py-2.5 rounded-lg bg-surface-ice text-on-surface-variant font-label-ui text-xs text-center peer-checked:bg-optical-blue peer-checked:text-on-primary transition-colors font-medium">
                                                Colocation
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input class="peer sr-only" name="requirement" type="radio" value="BGP Peering">
                                            <div class="px-3 py-2.5 rounded-lg bg-surface-ice text-on-surface-variant font-label-ui text-xs text-center peer-checked:bg-optical-blue peer-checked:text-on-primary transition-colors font-medium">
                                                BGP Peering / IXP
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <!-- Message Area -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="font-label-ui text-label-ui text-on-surface font-medium" for="userMessage">Your Message / Specifications</label>
                                    <textarea class="w-full bg-surface-ice text-on-surface font-body-md text-body-md rounded-lg px-4 py-3 focus:outline-none focus:bg-surface-container-lowest shadow-sm placeholder:text-outline resize-none" id="userMessage" name="message" placeholder="Please describe your bandwidth volume (e.g. 10G commit), preferred colocation facility, or peering request..." required="" rows="4"></textarea>
                                </div>
                                <!-- Form Submission button -->
                                <div class="flex items-center justify-between pt-2">
                                    <div class="flex items-center gap-2 text-on-surface-variant text-xs font-body-sm">
                                        <span class="material-symbols-outlined text-status-healthy text-sm">lock</span>
                                        Encrypted TLS 1.3 submission
                                    </div>
                                    <button class="px-8 py-3 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary transition-all flex items-center gap-2" type="submit">
                                        <span>Send Message</span>
                                        <span class="material-symbols-outlined text-sm">send</span>
                                    </button>
                                </div>
                                <div id="fg-form-feedback" class="hidden mt-2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
