<?php
/**
 * Widget: Blog - Section 1
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_BlogSec1 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_blog_sec_1';
    }

    public function get_title() {
        return esc_html__( 'Blog - Section 1', 'fibergrid' );
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
                'default' => esc_html__( '{ FIBERGRID PERSPECTIVES &amp; TECH UPDATES }', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Network Engineering, Cloud Architecture &amp; Telecom Insights',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Deep dives, network infrastructure reports, and technical architectural announcements directly from the FiberGrid NOC and global backbone architects.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '{ FIBERGRID PERSPECTIVES &amp; TECH UPDATES }';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Network Engineering, Cloud Architecture &amp; Telecom Insights';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Deep dives, network infrastructure reports, and technical architectural announcements directly from the FiberGrid NOC and global backbone architects.';
        $btn1_text = ! empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : 'Home';
        $btn1_url  = ! empty( $settings['btn1_url']['url'] ) ? $settings['btn1_url']['url'] : '/';
        ?>

        <section class="w-full bg-background relative overflow-hidden py-12 lg:py-16">
<div class="w-full px-margin-mobile lg:px-margin-desktop max-w-[1360px] mx-auto relative z-10 flex flex-col">
<!-- Breadcrumb & Status Pill -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
<nav class="flex items-center gap-2 font-label-ui text-label-ui text-secondary">
<a class="hover:text-primary transition-colors" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_text ); ?></a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-on-surface font-semibold">Insights &amp; Engineering Blog</span>
</nav>

</div>
<!-- Overline Eyebrow -->
<div class="inline-flex items-center gap-2 mb-3">
<span class="text-primary font-label-mono text-label-mono uppercase tracking-wider font-semibold"><?php echo esc_html( $eyebrow ); ?></span>
</div>
<!-- Main Headline & Subtitle -->
<div class="max-w-4xl mb-8">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight mb-4">
          <?php echo wp_kses_post( $title ); ?>
        </h1>
<p class="font-body-lg text-body-lg text-secondary max-w-3xl"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- Search & Filters Container -->
<div class="w-full flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4 pt-4 border-t border-grid-line">
<!-- Category Filters -->
<div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none" id="category-pills">
<button class="filter-pill active whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-semibold bg-optical-blue text-on-primary transition-all shadow-sm">
            All Articles
          </button>
<button class="filter-pill whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-medium bg-surface-container-lowest text-secondary hover:text-on-surface hover:bg-surface-container transition-all">
            Subsea &amp; Backbone
          </button>
<button class="filter-pill whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-medium bg-surface-container-lowest text-secondary hover:text-on-surface hover:bg-surface-container transition-all">
            BGP &amp; Peering
          </button>
<button class="filter-pill whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-medium bg-surface-container-lowest text-secondary hover:text-on-surface hover:bg-surface-container transition-all">
            Data Center &amp; Colocation
          </button>
<button class="filter-pill whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-medium bg-surface-container-lowest text-secondary hover:text-on-surface hover:bg-surface-container transition-all">
            Cloud Compute &amp; NVMe
          </button>
<button class="filter-pill whitespace-nowrap px-4 py-2 rounded-lg font-label-ui text-label-ui font-medium bg-surface-container-lowest text-secondary hover:text-on-surface hover:bg-surface-container transition-all">
            Company News
          </button>
</div>
<!-- Search Bar -->
<div class="relative min-w-[280px] lg:min-w-[320px]">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-secondary text-[20px]">search</span>
<input class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-sm placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest shadow-sm" placeholder="Search ASN, architecture, latency..." type="text">
</div>
</div>
</div>
</section>
        
        <?php
    }
}
