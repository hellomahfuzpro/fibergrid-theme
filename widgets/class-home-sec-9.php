<?php
/**
 * Widget: Home - Section 9 (FAQ with Exact 7 Network Operator Questions & Dynamic Elementor Repeater)
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_HomeSec9 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_home_sec_9';
    }

    public function get_title() {
        return esc_html__( 'Home - Section 9 (FAQ)', 'fibergrid' );
    }

    public function get_icon() {
        return 'eicon-help-o';
    }

    protected function register_controls() {
        // Section Header
        $this->start_controls_section(
            'section_faq_header',
            array(
                'label' => esc_html__( 'FAQ Header', 'fibergrid' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Have a question ? Look here ...',
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => esc_html__( 'Subtitle', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Common questions regarding our network operator scope and infrastructure services',
            )
        );

        $this->end_controls_section();

        // FAQ Items Repeater
        $this->start_controls_section(
            'section_faq_items',
            array(
                'label' => esc_html__( 'Questions & Answers', 'fibergrid' ),
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'question',
            array(
                'label'       => esc_html__( 'Question', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Are you a web hosting company?',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'answer',
            array(
                'label'   => esc_html__( 'Answer', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'No. We provide IP transit and colocation only.',
            )
        );

        $this->add_control(
            'faq_list',
            array(
                'label'       => esc_html__( 'FAQ List', 'fibergrid' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'question' => 'Are you a web hosting company?',
                        'answer'   => 'No. We provide IP transit and colocation only.',
                    ),
                    array(
                        'question' => 'Can you host my website, email, or VPS?',
                        'answer'   => 'No. We don’t sell hosting or rent servers.',
                    ),
                    array(
                        'question' => 'Do you offer dedicated servers?',
                        'answer'   => 'No. For colocation, you bring your own hardware and we provide rack space, power, and connectivity.',
                    ),
                    array(
                        'question' => 'What’s the difference between IP transit and hosting?',
                        'answer'   => 'Transit is BGP-based internet connectivity delivered to your network. Hosting is renting a server to run services.',
                    ),
                    array(
                        'question' => 'Who are your customers?',
                        'answer'   => 'ISPs, content providers, hosting companies, and enterprises with their own ASN or IP space.',
                    ),
                    array(
                        'question' => 'Do I need my own ASN?',
                        'answer'   => 'Yes for BGP transit.',
                    ),
                    array(
                        'question' => 'Where do I get hosting?',
                        'answer'   => 'We’re not the right fit. Look for a web or server hosting provider.',
                    ),
                ),
                'title_field' => '{{{ question }}}',
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

        $title    = ! empty( $settings['title'] ) ? $settings['title'] : 'Have a question ? Look here ...';
        $subtitle = ! empty( $settings['subtitle'] ) ? $settings['subtitle'] : 'Common questions regarding our network operator scope and infrastructure services';

        $faq_list = ! empty( $settings['faq_list'] ) ? $settings['faq_list'] : array(
            array(
                'question' => 'Are you a web hosting company?',
                'answer'   => 'No. We provide IP transit and colocation only.',
            ),
            array(
                'question' => 'Can you host my website, email, or VPS?',
                'answer'   => 'No. We don’t sell hosting or rent servers.',
            ),
            array(
                'question' => 'Do you offer dedicated servers?',
                'answer'   => 'No. For colocation, you bring your own hardware and we provide rack space, power, and connectivity.',
            ),
            array(
                'question' => 'What’s the difference between IP transit and hosting?',
                'answer'   => 'Transit is BGP-based internet connectivity delivered to your network. Hosting is renting a server to run services.',
            ),
            array(
                'question' => 'Who are your customers?',
                'answer'   => 'ISPs, content providers, hosting companies, and enterprises with their own ASN or IP space.',
            ),
            array(
                'question' => 'Do I need my own ASN?',
                'answer'   => 'Yes for BGP transit.',
            ),
            array(
                'question' => 'Where do I get hosting?',
                'answer'   => 'We’re not the right fit. Look for a web or server hosting provider.',
            ),
        );
        ?>
        <section class="w-full py-16 lg:py-24 bg-white border-t border-[#e2e8f0] fg-faq-section <?php echo esc_attr( $settings['custom_css_classes'] ?? '' ); ?>" id="faq">
            <div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1000px] mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12 lg:mb-16">
                    <h2 class="text-3xl sm:text-4xl font-black text-[#0b1c30] tracking-tight"><?php echo esc_html( $title ); ?></h2>
                    <p class="text-sm text-on-surface-variant mt-2 font-medium">
                        <?php echo esc_html( $subtitle ); ?> — <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-[#0066ff] underline hover:text-[#0050cb] transition-colors">Contact Our Engineering Team</a>
                    </p>
                </div>

                <!-- Clean Accordion List -->
                <div class="flex flex-col divide-y divide-[#e2e8f0] border-y border-[#e2e8f0]">
                    <?php foreach ( $faq_list as $index => $item ) : ?>
                        <?php $is_first = ( 0 === $index ); ?>
                        <div class="fg-faq-item py-5">
                            <div data-faq-trigger class="flex items-start gap-4 cursor-pointer group select-none">
                                <span data-faq-icon class="text-[#0066ff] font-bold text-2xl leading-none select-none w-5 shrink-0 mt-0.5"><?php echo $is_first ? '—' : '+'; ?></span>
                                <h3 class="fg-faq-question text-[16px] sm:text-[18px] font-semibold text-[#0b1c30] leading-snug group-hover:text-[#0066ff] transition-colors flex-1">
                                    <?php echo esc_html( $item['question'] ); ?>
                                </h3>
                            </div>
                            <div data-faq-answer class="pl-9 pt-3 text-sm sm:text-base text-on-surface-variant leading-relaxed max-w-3xl <?php echo $is_first ? '' : 'hidden'; ?>">
                                <p><?php echo esc_html( $item['answer'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
