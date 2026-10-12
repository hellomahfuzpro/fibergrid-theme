<?php
/**
 * Widget: About Us - Section 5
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_AboutSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_about_sec_5';
    }

    public function get_title() {
        return esc_html__( 'About Us - Section 5', 'fibergrid' );
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
                'default' => esc_html__( '✦ TIER-1 GLOBAL BACKBONE PRESENCE', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Connected Across 15 Countries &amp; 4 Continents',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Strategically deployed in major optical peering hubs connecting EMEA, Americas, and APAC with direct subsea cable routes and zero-transit bottlenecks.', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_image',
            array(
                'label'   => esc_html__( 'Section Image', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA3O9rV1OSV1Rj4JO2X3fhLnZqykCxDP5bKQOUpMU9-85e2EH9qILzAMoNiKd28qdQBB58T5c8aJL9ICXOXxChj5uBZefnd9II1JWdXKET89Fit7HSPT540ZbcTZdriHVbACa8byUyq4BF_rqKZf3v_MkwXoVuXGqZ6d4fJVhmZrbOtLiOrCc24iDD7Y3Smd2fVO7UtqKkhBpdtqMK1qvgOCYGpO6xADz2FydwQKg5TCTxVAkK370Os9A',
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : '✦ TIER-1 GLOBAL BACKBONE PRESENCE';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Connected Across 15 Countries &amp; 4 Continents';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Strategically deployed in major optical peering hubs connecting EMEA, Americas, and APAC with direct subsea cable routes and zero-transit bottlenecks.';
        $image_1 = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuA3O9rV1OSV1Rj4JO2X3fhLnZqykCxDP5bKQOUpMU9-85e2EH9qILzAMoNiKd28qdQBB58T5c8aJL9ICXOXxChj5uBZefnd9II1JWdXKET89Fit7HSPT540ZbcTZdriHVbACa8byUyq4BF_rqKZf3v_MkwXoVuXGqZ6d4fJVhmZrbOtLiOrCc24iDD7Y3Smd2fVO7UtqKkhBpdtqMK1qvgOCYGpO6xADz2FydwQKg5TCTxVAkK370Os9A';
        ?>

        <section class="w-full py-20 bg-slate-50 border-y border-slate-200 relative overflow-hidden" id="network-reach">
  <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop relative z-10">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
      <div>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold tracking-wider uppercase mb-3"><?php echo esc_html( $eyebrow ); ?></span>
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo wp_kses_post( $title ); ?></h2>
      </div>
      <p class="text-slate-600 max-w-md text-sm leading-relaxed"><?php echo esc_html( $desc ); ?></p>
    </div>
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden p-6 md:p-10">
      <img src="<?php echo esc_url( $image_1 ); ?>" alt="FiberGrid 15 Countries Peering Map" class="w-full h-auto object-contain max-h-[520px] mx-auto mb-8 rounded-xl">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-6 border-t border-slate-100 mb-6">
        <div class="flex flex-col">
          <span class="text-xs font-mono uppercase tracking-wider text-slate-500 mb-1">Coverage</span>
          <span class="text-2xl lg:text-3xl font-bold text-slate-900">15+ Countries</span>
          <span class="text-xs text-slate-500 mt-1">Connected globally</span>
        </div>
        <div class="flex flex-col">
          <span class="text-xs font-mono uppercase tracking-wider text-slate-500 mb-1">Reach</span>
          <span class="text-2xl lg:text-3xl font-bold text-slate-900">4 Continents</span>
          <span class="text-xs text-slate-500 mt-1">Spanned across EMEA, APAC &amp; US</span>
        </div>
        <div class="flex flex-col">
          <span class="text-xs font-mono uppercase tracking-wider text-slate-500 mb-1">Interconnects</span>
          <span class="text-2xl lg:text-3xl font-bold text-slate-900">50+ Hubs</span>
          <span class="text-xs text-slate-500 mt-1">Direct IX Peering Hubs</span>
        </div>
        <div class="flex flex-col">
          <span class="text-xs font-mono uppercase tracking-wider text-slate-500 mb-1">Performance</span>
          <span class="text-2xl lg:text-3xl font-bold text-blue-600">&lt; 15ms</span>
          <span class="text-xs text-slate-500 mt-1">Regional Metro Latency</span>
        </div>
      </div>
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/60 text-xs font-mono text-slate-600">
        <div class="flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          <span class="">ACTIVE TRANSIT TELEMETRY: BGP Multi-homed Routing</span>
        </div>
        <div class="flex items-center gap-2 flex-wrap text-slate-500">
          <span class="">JNB → LHR: 138ms</span>
          <span class="">•</span>
          <span class="">CPT → FRA: 142ms</span>
          <span class="">•</span>
          <span class="">LHR → NYC: 66ms</span>
          <span class="">•</span>
          <span class="text-emerald-600 font-semibold">100% Stability</span>
        </div>
      </div>
    </div>
  </div>
</section>
        
        <?php
    }
}
