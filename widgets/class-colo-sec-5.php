<?php
/**
 * Widget: Colocation - Section 5
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FiberGrid_Widget_ColoSec5 extends FiberGrid_Base_Widget {

    public function get_name() {
        return 'fg_colo_sec_5';
    }

    public function get_title() {
        return esc_html__( 'Colocation - Section 5', 'fibergrid' );
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
                'default' => esc_html__( 'FACILITY ENGINEERING', 'fibergrid' ),
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__( 'Section Title', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => 'Engineered for Ultra-High Performance &amp; Zero Downtime',
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'   => esc_html__( 'Description', 'fibergrid' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Strict adherence to ANSI/TIA-942 Rated 3 design criteria ensures redundant delivery paths across electrical, thermal, and fiber routing backbones.', 'fibergrid' ),
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
        $eyebrow = ! empty( $settings['eyebrow'] ) ? $settings['eyebrow'] : 'FACILITY ENGINEERING';
        $title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Engineered for Ultra-High Performance &amp; Zero Downtime';
        $desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : 'Strict adherence to ANSI/TIA-942 Rated 3 design criteria ensures redundant delivery paths across electrical, thermal, and fiber routing backbones.';
        ?>

        <section class="w-full bg-surface-container-lowest py-20 lg:py-28">
<div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="flex flex-col items-center text-center gap-3 max-w-3xl mx-auto mb-16">
<span class="font-label-mono text-label-mono font-bold tracking-widest text-primary uppercase"><?php echo esc_html( $eyebrow ); ?></span>
<h2 class="font-headline-xl text-headline-xl text-deep-navy tracking-tight">
          <?php echo wp_kses_post( $title ); ?>
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $desc ); ?></p>
</div>
<!-- 4 Pillars Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Pillar 1: Power Architecture -->
<div class="p-8 rounded-2xl bg-surface-ice hover:bg-surface-container-low transition-all duration-300 shadow-sm flex flex-col gap-4">
<div class="w-14 h-14 rounded-xl bg-surface-container-lowest text-route-orange flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[32px]">bolt</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">Power Architecture</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Dual independent high-voltage utility feeds backed by Schneider Electric Galaxy N+1 UPS systems with isolated lithium-ion cabinets and Cummins industrial generators with 72-hour on-site fuel reserve.
          </p>
<div class="pt-4 border-t border-grid-line/60 flex flex-col gap-2 font-label-mono text-label-mono text-deep-navy font-semibold">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Dual Active Substations
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              True 2N Bus Distribution
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Automated STS Switches
            </div>
</div>
</div>
<!-- Pillar 2: Climate Control -->
<div class="p-8 rounded-2xl bg-surface-ice hover:bg-surface-container-low transition-all duration-300 shadow-sm flex flex-col gap-4">
<div class="w-14 h-14 rounded-xl bg-surface-container-lowest text-cyan-pulse flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[32px]">mode_fan</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">Precision Cooling</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Engineered hot and cold aisle containment pairs with variable-speed downflow CRAC units operating in N+1 configuration. Strict environmental compliance adhering to ASHRAE TC 9.9 thermal envelopes.
          </p>
<div class="pt-4 border-t border-grid-line/60 flex flex-col gap-2 font-label-mono text-label-mono text-deep-navy font-semibold">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Closed-Loop Containment
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Ultrasonic Humidification
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              18°C - 24°C Cold Aisle
            </div>
</div>
</div>
<!-- Pillar 3: Physical Security -->
<div class="p-8 rounded-2xl bg-surface-ice hover:bg-surface-container-low transition-all duration-300 shadow-sm flex flex-col gap-4">
<div class="w-14 h-14 rounded-xl bg-surface-container-lowest text-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[32px]">security</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">5-Layer Physical Security</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Perimeter anti-ram barriers, multi-factor mantrap entryways with dual biometric iris and palm scanners, continuous on-site security guards, and 4K digital CCTV with 90-day retention policies.
          </p>
<div class="pt-4 border-t border-grid-line/60 flex flex-col gap-2 font-label-mono text-label-mono text-deep-navy font-semibold">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Biometric Iris Authentication
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Anti-Passback Mantrap Portals
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              SOC 2 Type II Audited
            </div>
</div>
</div>
<!-- Pillar 4: Interconnects -->
<div class="p-8 rounded-2xl bg-surface-ice hover:bg-surface-container-low transition-all duration-300 shadow-sm flex flex-col gap-4">
<div class="w-14 h-14 rounded-xl bg-surface-container-lowest text-optical-blue flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[32px]">cable</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">Carrier-Neutral Mesh</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Direct single-mode optical fiber cross-connects to over 50 telecommunications carriers, cloud direct connects (AWS, Azure, Google Cloud), and dark fiber metro rings terminating inside dual Meet-Me-Rooms (MMR).
          </p>
<div class="pt-4 border-t border-grid-line/60 flex flex-col gap-2 font-label-mono text-label-mono text-deep-navy font-semibold">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Dual Redundant MMRs
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              100G Direct Cross Connects
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-healthy text-[18px]">check_circle</span>
              Direct Cloud On-Ramp
            </div>
</div>
</div>
</div>
</div>
</section>
        
        <?php
    }
}
