/**
 * Theme Customizer Live Preview
 *
 * Real-time dynamic updates in the Customizer preview pane.
 */
(function ($) {
    if (!wp || !wp.customize) return;

    // Helper to set root CSS variable
    function setCssVar(varName, value) {
        document.documentElement.style.setProperty(varName, value);
    }

    // Colors
    wp.customize('fg_color_primary', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-primary', newVal);
            $('.text-optical-blue, .text-primary').css('color', newVal);
            $('.bg-optical-blue, .bg-primary, .bg-primary-container').css('background-color', newVal);
            $('.border-optical-blue, .border-primary').css('border-color', newVal);
        });
    });

    wp.customize('fg_color_primary_hover', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-primary-dark', newVal);
        });
    });

    wp.customize('fg_color_navy', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-navy', newVal);
            $('.text-deep-navy, .text-on-surface, h1, h2, h3, h4, h5, h6').css('color', newVal);
        });
    });

    wp.customize('fg_color_secondary', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-secondary', newVal);
            $('.text-secondary, .text-on-surface-variant').css('color', newVal);
        });
    });

    wp.customize('fg_color_border', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-border', newVal);
            $('.border-grid-line').css('border-color', newVal);
        });
    });

    wp.customize('fg_color_surface_ice', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-surface-ice', newVal);
            $('.bg-surface-ice').css('background-color', newVal);
        });
    });

    // Typography
    wp.customize('fg_font_heading', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-font-heading', "'" + newVal + "', sans-serif");
            $('h1, h2, h3, h4, h5, h6, [class*="font-headline"], [class*="font-display"]').css('font-family', "'" + newVal + "', sans-serif");
        });
    });

    wp.customize('fg_font_body', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-font-body', "'" + newVal + "', sans-serif");
            $('body, p, li, input, select, textarea, button, [class*="font-body"]').css('font-family', "'" + newVal + "', sans-serif");
        });
    });

    wp.customize('fg_font_mono', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-font-mono', "'" + newVal + "', monospace");
            $('[class*="font-tech-metric"], [class*="font-mono"], code, pre').css('font-family', "'" + newVal + "', monospace");
        });
    });

    wp.customize('fg_font_body_size', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-body-size', newVal);
            $('body, p, li, [class*="font-body-md"]').css('font-size', newVal);
        });
    });

    wp.customize('fg_faq_question_size', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-faq-size', newVal);
            $('.fg-faq-question, #faq h3, .fg-faq-item h3').css('font-size', newVal);
        });
    });

    // Header Controls
    wp.customize('fg_header_client_portal_text', function (value) {
        value.bind(function (newVal) {
            $('.fg-client-portal-btn').text(newVal);
        });
    });

    wp.customize('fg_header_quote_btn_text', function (value) {
        value.bind(function (newVal) {
            $('.fg-quote-btn').text(newVal);
        });
    });

    // Logo & Branding Controls
    wp.customize('fg_header_logo', function (value) {
        value.bind(function (newVal) {
            if (newVal) {
                $('.fg-header-logo').attr('src', newVal);
            }
        });
    });

    wp.customize('fg_header_logo_height', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-header-logo-height', newVal + 'px');
            $('.fg-header-logo').css('height', newVal + 'px');
        });
    });

    wp.customize('fg_footer_logo', function (value) {
        value.bind(function (newVal) {
            if (newVal) {
                $('.fg-footer-logo').attr('src', newVal);
            }
        });
    });

    wp.customize('fg_footer_logo_height', function (value) {
        value.bind(function (newVal) {
            setCssVar('--fg-footer-logo-height', newVal + 'px');
            $('.fg-footer-logo').css('height', newVal + 'px');
        });
    });

    // Footer Tagline & Copyright
    wp.customize('fg_footer_tagline', function (value) {
        value.bind(function (newVal) {
            $('.fg-footer-tagline').text(newVal);
        });
    });

    wp.customize('fg_footer_copyright', function (value) {
        value.bind(function (newVal) {
            $('.fg-footer-copyright').text(newVal);
        });
    });

    wp.customize('fg_footer_subtext', function (value) {
        value.bind(function (newVal) {
            $('.fg-footer-subtext').text(newVal);
        });
    });

})(jQuery);
