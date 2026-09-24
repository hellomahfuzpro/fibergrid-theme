<?php
/**
 * FiberGrid — Enterprise Contact & NOC Department Routing Widget
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager;

class FG_Widget_Contact_Routing extends FG_Widget_Base {

    public function get_name() {
        return 'fg_contact_routing';
    }

    public function get_title() {
        return __( 'Contact & NOC Department Router', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Contact Header', 'fibergrid' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'eyebrow',
            array(
                'label'   => __( 'Eyebrow', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '24/7 Operations & Escalation',
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'fibergrid' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Get in Touch with Our NOC & Engineering Teams',
            )
        );

        $this->add_control(
            'lede',
            array(
                'label'   => __( 'Description Lede', 'fibergrid' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Whether you require an immediate BGP capacity upgrade, private colocation cage tour, or emergency network assistance, our engineers are standing by 24/7/365.',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->render_section_open( 'fg-contact-section', 'quote' );
        ?>
        <div style="display:grid;grid-template-columns:1.2fr 0.8fr;gap:56px;align-items:flex-start;">
            <!-- Left: Asynchronous Form -->
            <div class="fg-card" style="padding:40px;">
                <?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
                    <span class="fg-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $settings['title'] ) ) : ?>
                    <h2 style="font-size:30px;font-weight:800;color:var(--fg-color-secondary);margin:6px 0 16px;"><?php echo esc_html( $settings['title'] ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $settings['lede'] ) ) : ?>
                    <p style="color:var(--fg-color-text-muted);font-size:15px;line-height:1.6;margin-bottom:28px;"><?php echo esc_html( $settings['lede'] ); ?></p>
                <?php endif; ?>

                <form class="fg-ajax-form" method="post" action="#">
                    <!-- Honeypot anti-spam -->
                    <input type="text" name="fg_company_website_hp" style="display:none !important;" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="form_type" value="contact">

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                        <div class="fg-input-box">
                            <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Full Name *', 'fibergrid' ); ?></label>
                            <input type="text" name="name" class="fg-input-control" required placeholder="e.g. Alex Morgan" style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);">
                        </div>
                        <div class="fg-input-box">
                            <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Work Email *', 'fibergrid' ); ?></label>
                            <input type="email" name="email" class="fg-input-control" required placeholder="alex@company.com" style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);">
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                        <div class="fg-input-box">
                            <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Company Name', 'fibergrid' ); ?></label>
                            <input type="text" name="company" class="fg-input-control" placeholder="Company / ISP / Autonomous System" style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);">
                        </div>
                        <div class="fg-input-box">
                            <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Department / Routing', 'fibergrid' ); ?></label>
                            <select name="service" class="fg-input-control" style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);">
                                <option value="IP Transit Sales"><?php esc_html_e( 'IP Transit & BGP Peering', 'fibergrid' ); ?></option>
                                <option value="Colocation Inquiries"><?php esc_html_e( 'Colocation Racks & Power', 'fibergrid' ); ?></option>
                                <option value="Virtual Cloud VDC"><?php esc_html_e( 'Virtual Data Center & Cloud', 'fibergrid' ); ?></option>
                                <option value="24/7 NOC Support"><?php esc_html_e( '24/7 NOC Emergency Support', 'fibergrid' ); ?></option>
                                <option value="Billing & Accounts"><?php esc_html_e( 'Billing & Contractual Accounts', 'fibergrid' ); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="fg-input-box" style="margin-bottom:16px;">
                        <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Capacity or Technical Requirements', 'fibergrid' ); ?></label>
                        <input type="text" name="requirement" class="fg-input-control" placeholder="e.g. 40G QSFP+ commit in JHB-01, or 2x 42U 6kVA Cages" style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);">
                    </div>

                    <div class="fg-input-box" style="margin-bottom:24px;">
                        <label style="font-family:var(--fg-font-mono);font-size:11px;font-weight:700;color:var(--fg-color-text-dim);text-transform:uppercase;"><?php esc_html_e( 'Message Narrative', 'fibergrid' ); ?></label>
                        <textarea name="message" rows="4" class="fg-input-control" placeholder="Provide additional details regarding delivery dates, IP routing, or facility access..." style="background:#fff;border-color:var(--fg-color-grid-line);color:var(--fg-color-text-main);resize:vertical;"></textarea>
                    </div>

                    <button type="submit" class="fg-btn fg-btn-primary" style="width:100%;padding:14px;">
                        <?php esc_html_e( 'Dispatch Inquiry to Engineering Team', 'fibergrid' ); ?>
                    </button>
                </form>
            </div>

            <!-- Right: Direct Escalation & NOC Hotlines -->
            <div style="display:flex;flex-direction:column;gap:24px;">
                <div class="fg-card" style="background:var(--fg-color-midnight);color:#FFFFFF;border-color:rgba(255,255,255,0.1);">
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px;">
                        <span class="fg-pulse-dot pulse"></span>
                        <span style="font-family:var(--fg-font-mono);font-size:12px;color:#A7F3D0;font-weight:700;">ACTIVE NOC WATCH</span>
                    </div>
                    <h3 style="color:#FFFFFF;font-size:22px;font-weight:800;margin:0 0 10px;"><?php esc_html_e( '24/7/365 Emergency Hotline', 'fibergrid' ); ?></h3>
                    <p style="color:#94A3B8;font-size:14px;line-height:1.6;margin-bottom:18px;">
                        <?php esc_html_e( 'Immediate priority phone escalation for carrier outages, BGP path anomalies, and emergency datacenter access.', 'fibergrid' ); ?>
                    </p>
                    <div style="font-family:var(--fg-font-mono);font-size:20px;font-weight:700;color:var(--fg-color-cyan-pulse);">
                        <a href="tel:+27110000000" style="color:inherit;text-decoration:none;">+27 (0) 11 000 0000</a>
                    </div>
                    <div style="font-size:13px;color:#94A3B8;margin-top:4px;">
                        noc@fibergrid.co.za &bull; PGP Fingerprint Available
                    </div>
                </div>

                <div class="fg-card">
                    <h4 style="font-size:18px;font-weight:700;margin:0 0 12px;color:var(--fg-color-secondary);"><?php esc_html_e( 'Primary Datacenter Facilities', 'fibergrid' ); ?></h4>
                    <div style="display:flex;flex-direction:column;gap:12px;font-size:14px;color:var(--fg-color-text-muted);">
                        <div>
                            <strong style="color:var(--fg-color-text-main);">Johannesburg JB1 Campus:</strong><br>
                            Teraco Isando, 5 Brewery St, Isando, Kempton Park
                        </div>
                        <div>
                            <strong style="color:var(--fg-color-text-main);">Cape Town CT1 Campus:</strong><br>
                            Teraco Great Westerford, Rondebosch, Cape Town
                        </div>
                        <div>
                            <strong style="color:var(--fg-color-text-main);">London Interconnect:</strong><br>
                            Telehouse North Two, 2 Coriander Ave, London E14 2AA
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->render_section_close();
    }
}
