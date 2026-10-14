<?php
/**
 * 404 Page Template
 *
 * @package FiberGrid
 */

get_header();
?>
<div class="flex flex-col w-full">
<!-- 1. BREADCRUMBS & NETWORK DIAGNOSTIC HEADER -->

<!-- 2. TELECOM-THEMED 404 HERO SECTION WITH MTR TELEMETRY TRACEROUTE -->
<section class="w-full bg-gradient-to-b from-surface-container-lowest via-surface-ice/40 to-background py-16 lg:py-24 border-b border-surface-container-high/60 relative overflow-hidden">
<!-- Subtle decorative optical background grids -->
<div class="absolute inset-0 bg-[linear-gradient(to_right,#0066FF08_1px,transparent_1px),linear-gradient(to_bottom,#0066FF08_1px,transparent_1px)] bg-[size:32px_32px] pointer-events-none"></div>
<div class="absolute -top-40 right-1/4 w-96 h-96 bg-optical-blue/5 rounded-full blur-3xl pointer-events-none"></div>
<div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">
<!-- Hero Left: Code / Headline / Buttons / Search -->
<div class="lg:col-span-7 flex flex-col items-start">


<h1 class="font-headline-xl text-headline-xl text-deep-navy font-bold tracking-tight mb-4 max-w-2xl leading-tight">
Packet Dropped: The Requested Page Cannot Be Located
</h1>
<p class="font-body-lg text-body-lg text-secondary mb-8 max-w-xl leading-relaxed">
The route or endpoint you attempted to reach does not exist or has been withdrawn from our border gateway routing tables. Verify the URL or reroute to one of our core infrastructure services below.
</p>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-4 mb-8">
<a class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold shadow-md hover:bg-primary hover:shadow-lg transition-all" href="<?php echo esc_url( home_url( "/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">home</span>
Return to Homepage
</a>
<a class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-surface-container-lowest border border-surface-container-high text-deep-navy hover:text-optical-blue font-label-ui text-label-ui font-semibold hover:bg-surface-ice transition-all shadow-sm" href="/about-us#telemetry">
<span class="material-symbols-outlined text-[18px] text-optical-blue">monitoring</span>
View System Status
</a>
</div>
<!-- Quick Search Bar -->
<div class="w-full max-w-lg">
<form action="/search" class="relative flex items-center w-full" method="GET">
<span class="material-symbols-outlined absolute left-4 text-outline text-[20px] pointer-events-none">search</span>
<input class="w-full pl-11 pr-24 py-3 bg-surface-container-lowest border border-surface-container-high rounded-lg text-sm text-deep-navy placeholder:text-secondary/70 focus:outline-none focus:border-optical-blue focus:ring-2 focus:ring-optical-blue/20 transition-all shadow-sm" placeholder="Search documentation, route ASN, or endpoints..." type="text">
<button class="absolute right-2 px-3 py-1.5 rounded-md bg-deep-navy hover:bg-slate-surface text-white text-xs font-semibold font-label-ui transition-colors" type="submit">
Lookup
</button>
</form>
</div>
</div>
<!-- Hero Right: Network Diagnostics MTR Terminal Card -->
<div class="lg:col-span-5 w-full"><div class="w-full flex items-center justify-center"><div class="w-full max-w-md flex items-center justify-center transform transition-transform duration-500 hover:scale-[1.02]"><img src="<?php echo esc_url( get_template_directory_uri() . "/assets/images/404-disconnect.svg" ); ?>" alt="Bold 900 404 Route Disconnect Graphic Icon" class="w-full h-auto object-contain block"></div></div></div>
</div>
</div>
</section>
<!-- 3. LIVE BACKBONE STATUS RIBBON (CRITICAL) -->

<!-- 3. LIVE BACKBONE STATUS RIBBON (CRITICAL) -->
<section class="w-full bg-surface py-16 lg:py-20">
<div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
<div>
<span class="font-label-mono text-label-mono text-optical-blue font-bold tracking-wider uppercase">ROUTE REDIRECTION HUB</span>
<h2 class="font-headline-lg text-headline-lg text-deep-navy mt-1">Frequently Accessed Enterprise Infrastructure</h2>
</div>
<p class="font-body-md text-body-md text-secondary max-w-md">
Reroute directly to our core telecommunications portfolio, colocation suites, or engineering peering interfaces.
</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1: IP Transit -->
<a class="group bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between h-full border border-surface-container-high/60" href="<?php echo esc_url( home_url( "/ip-transit/" ) ); ?>">
<div>
<div class="w-12 h-12 rounded-lg bg-surface-ice text-optical-blue flex items-center justify-center mb-5 group-hover:bg-optical-blue group-hover:text-white transition-colors shadow-sm">
<span class="material-symbols-outlined text-[26px]">swap_calls</span>
</div>
<div class="font-label-mono text-label-mono text-optical-blue mb-1 uppercase font-semibold">Tier 1 Backbone</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy mb-2 group-hover:text-optical-blue transition-colors">High-Speed IP Transit</h3>
<p class="font-body-md text-body-md text-secondary mb-6 leading-relaxed">
Low-latency, multi-homed Tier 1 transit delivered via 1G, 10G, 40G, and 100G optical cross-connects with automated DDoS scrubbing.
</p>
</div>
<div class="flex items-center gap-1 font-label-ui text-label-ui text-optical-blue font-semibold group-hover:gap-2 transition-all">
<span class="">Explore IP Transit</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</a>
<!-- Card 2: Global Colocation -->
<a class="group bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between h-full border border-surface-container-high/60" href="<?php echo esc_url( home_url( "/colocation/" ) ); ?>">
<div>
<div class="w-12 h-12 rounded-lg bg-surface-ice text-optical-blue flex items-center justify-center mb-5 group-hover:bg-optical-blue group-hover:text-white transition-colors shadow-sm">
<span class="material-symbols-outlined text-[26px]">dns</span>
</div>
<div class="font-label-mono text-label-mono text-optical-blue mb-1 uppercase font-semibold">Facility Specs</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy mb-2 group-hover:text-optical-blue transition-colors">Global Colocation</h3>
<p class="font-body-md text-body-md text-secondary mb-6 leading-relaxed">
Tier III+ carrier-neutral secure environments, private suites, and customizable 42U-48U racks with 2N electrical redundancy.
</p>
</div>
<div class="flex items-center gap-1 font-label-ui text-label-ui text-optical-blue font-semibold group-hover:gap-2 transition-all">
<span class="">View Colocation Hubs</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</a>
<!-- Card 3: Network Peering & Looking Glass -->
<a class="group bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between h-full border border-surface-container-high/60" href="<?php echo esc_url( home_url( "/about-us/#telemetry" ) ); ?>">
<div>
<div class="w-12 h-12 rounded-lg bg-surface-ice text-optical-blue flex items-center justify-center mb-5 group-hover:bg-optical-blue group-hover:text-white transition-colors shadow-sm">
<span class="material-symbols-outlined text-[26px]">hub</span>
</div>
<div class="font-label-mono text-label-mono text-optical-blue mb-1 uppercase font-semibold">BGP Routing</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy mb-2 group-hover:text-optical-blue transition-colors">Peering &amp; Looking Glass</h3>
<p class="font-body-md text-body-md text-secondary mb-6 leading-relaxed">
Direct IXP peering sessions across NAPAfrica, JINX, and LINX with automated BGP community route propagation.
</p>
</div>
<div class="flex items-center gap-1 font-label-ui text-label-ui text-optical-blue font-semibold group-hover:gap-2 transition-all">
<span class="">View Peering Policy</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</a>
<!-- Card 4: Network Telemetry & Looking Glass -->
<a class="group bg-surface-container-lowest p-6 rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between h-full border border-surface-container-high/60" href="/about-us#telemetry">
<div>
<div class="w-12 h-12 rounded-lg bg-surface-ice text-optical-blue flex items-center justify-center mb-5 group-hover:bg-optical-blue group-hover:text-white transition-colors shadow-sm">
<span class="material-symbols-outlined text-[26px]">query_stats</span>
</div>
<div class="font-label-mono text-label-mono text-optical-blue mb-1 uppercase font-semibold">NOC Utilities</div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy mb-2 group-hover:text-optical-blue transition-colors">Telemetry &amp; Peering</h3>
<p class="font-body-md text-body-md text-secondary mb-6 leading-relaxed">
Interactive BGP looking glass, realtime latency graphs, ping/traceroute verification engines, and PeeringDB interconnection records.
</p>
</div>
<div class="flex items-center gap-1 font-label-ui text-label-ui text-optical-blue font-semibold group-hover:gap-2 transition-all">
<span class="">Access Looking Glass</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</div>
</a>
</div>
</div>
</section>
<!-- 4. ROUTE REDIRECTION HUB (4 HIGH-ELEVATION CARDS) -->
<section class="w-full bg-surface-container-lowest py-20 lg:py-24 border-t border-surface-container-high/60">
<div class="max-w-[1100px] mx-auto px-margin-mobile lg:px-margin-desktop">
<div class="text-center max-w-2xl mx-auto mb-16">
<h2 class="font-headline-xl text-[36px] lg:text-[42px] font-bold text-deep-navy tracking-tight mb-3">Have a question ? Look here ...</h2>
<p class="font-body-md text-secondary text-[15px]">Have another question ? <a class="text-optical-blue font-medium hover:underline" href="/blog">See our Knowledge Base</a></p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
<!-- Card 1: IP Transit -->
<div class="lg:col-span-3 flex flex-col space-y-7 pt-1">
<div class="relative flex items-center">
<div class="absolute -left-5 top-0 bottom-0 w-1 bg-optical-blue rounded-full"></div>
<button class="font-headline-sm text-[16px] font-bold text-deep-navy text-left hover:text-optical-blue transition-colors focus:outline-none" type="button">General</button>
</div>
<div class="flex items-center">
<button class="font-body-md text-[15px] font-medium text-secondary hover:text-deep-navy text-left transition-colors focus:outline-none" type="button">Route Diagnostics</button>
</div>
<div class="flex items-center">
<button class="font-body-md text-[15px] font-medium text-secondary hover:text-deep-navy text-left transition-colors focus:outline-none" type="button">Autonomous Routing</button>
</div>
<div class="flex items-center">
<button class="font-body-md text-[15px] font-medium text-secondary hover:text-deep-navy text-left transition-colors focus:outline-none" type="button">NOC &amp; Support</button>
</div>
</div>
<!-- Card 2: Global Colocation -->
<div class="lg:col-span-9 flex flex-col divide-y divide-[#E2E8F0]">
<!-- Item 1 (Expanded) -->
<div class="pb-8">
<div class="flex items-start gap-4 cursor-pointer">
<span class="text-optical-blue font-bold text-2xl leading-none select-none mt-0.5">—</span>
<h3 class="font-headline-sm text-[18px] lg:text-[20px] font-bold text-deep-navy leading-snug">What colocation rack footprints are available?</h3>
</div>
<p class="mt-3.5 pl-8 font-body-md text-[14px] leading-relaxed text-secondary">
We offer standardized Quarter Racks (10U Secured), Half Racks (21U Partitioned), and Full Racks (42U Private Locking Cabinets) with dedicated A+B power feeds and metered distribution. For hyperscale or custom workloads, we design dedicated high-density private cages and pods scaling from 10kW to 40kW+ with modular hot/cold aisle containment.
</p>
</div>
<!-- Item 2 -->
<div class="py-7">
<div class="flex items-center gap-4 cursor-pointer group">
<span class="text-optical-blue font-bold text-2xl leading-none select-none">+</span>
<h3 class="font-headline-sm text-[18px] lg:text-[20px] font-bold text-deep-navy group-hover:text-optical-blue transition-colors leading-snug">What facility redundancy standards do you meet?</h3>
</div>
</div>
<!-- Item 3 -->
<div class="py-7">
<div class="flex items-center gap-4 cursor-pointer group">
<span class="text-optical-blue font-bold text-2xl leading-none select-none">+</span>
<h3 class="font-headline-sm text-[18px] lg:text-[20px] font-bold text-deep-navy group-hover:text-optical-blue transition-colors leading-snug">Are remote hands and eyes services included?</h3>
</div>
</div>
<!-- Item 4 -->
<div class="py-7">
<div class="flex items-center gap-4 cursor-pointer group">
<span class="text-optical-blue font-bold text-2xl leading-none select-none">+</span>
<h3 class="font-headline-sm text-[18px] lg:text-[20px] font-bold text-deep-navy group-hover:text-optical-blue transition-colors leading-snug">How do I schedule an on-site facility audit or hardware delivery?</h3>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 5. TABBED FAQ SECTION (APPEARS ONLY ONCE) -->
<section class="w-full bg-surface-container-low py-12 border-t border-surface-container-high/60">
<div class="max-w-[1320px] mx-auto px-margin-mobile lg:px-margin-desktop flex flex-col md:flex-row items-center justify-between gap-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-optical-blue text-white flex items-center justify-center shadow-md shrink-0">
<span class="material-symbols-outlined text-[24px]">support_agent</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-deep-navy font-bold">Still unable to locate your required endpoint?</h3>
<p class="font-body-md text-body-md text-secondary">Our tier-3 engineering staff is staffed 24/7/365 to assist with route allocations.</p>
</div>
</div>
<div class="flex items-center gap-3 shrink-0">
<a class="bg-optical-blue text-on-primary font-label-ui text-label-ui font-semibold px-6 py-3 rounded-lg hover:bg-primary transition-colors shadow-sm" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
Contact Engineering Team
</a>
</div>
</div>
</section>
</div>
<?php
get_footer();
