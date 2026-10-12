/**
 * FiberGrid Theme Client-Side Interactions
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Menu Toggle
    const menuBtn = document.getElementById('fg-mobile-menu-btn');
    const mobileMenu = document.getElementById('fg-mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 2. Interactive FAQ Tabs & Accordions
    function initFaqSections() {
        const faqSections = document.querySelectorAll('#faq, .fg-faq-section, .fg-faq-container');
        faqSections.forEach(section => {
            // A. Category Tab Switching
            const tabs = section.querySelectorAll('[data-faq-tab]');
            const panels = section.querySelectorAll('[data-faq-panel]');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetCategory = this.getAttribute('data-faq-tab');
                    if (!targetCategory) return;

                    // Update Tab active classes
                    tabs.forEach(t => {
                        t.classList.remove('font-bold', 'text-[#0b1c30]', 'text-deep-navy', 'text-on-surface');
                        t.classList.add('font-medium', 'text-secondary', 'text-on-surface-variant', 'text-outline');
                        const ind = t.querySelector('.faq-tab-indicator');
                        if (ind) ind.classList.add('hidden');
                    });

                    this.classList.remove('font-medium', 'text-secondary', 'text-on-surface-variant', 'text-outline');
                    this.classList.add('font-bold', 'text-[#0b1c30]', 'text-deep-navy', 'text-on-surface');
                    const activeInd = this.querySelector('.faq-tab-indicator');
                    if (activeInd) activeInd.classList.remove('hidden');

                    // Switch Panels
                    panels.forEach(panel => {
                        const panelCat = panel.getAttribute('data-faq-panel');
                        if (panelCat === targetCategory) {
                            panel.classList.remove('hidden');
                            panel.style.display = 'flex';
                        } else {
                            panel.classList.add('hidden');
                            panel.style.display = 'none';
                        }
                    });
                });
            });

            // B. Accordion Expand/Collapse
            const triggers = section.querySelectorAll('[data-faq-trigger]');
            triggers.forEach(trigger => {
                trigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    const item = this.closest('.fg-faq-item') || this.parentElement;
                    if (!item) return;

                    const answer = item.querySelector('[data-faq-answer]');
                    const icon = this.querySelector('[data-faq-icon]');

                    if (answer) {
                        const isHidden = answer.classList.contains('hidden') || answer.style.display === 'none';
                        if (isHidden) {
                            answer.classList.remove('hidden');
                            answer.style.display = 'block';
                            if (icon) icon.textContent = '—';
                        } else {
                            answer.classList.add('hidden');
                            answer.style.display = 'none';
                            if (icon) icon.textContent = '+';
                        }
                    }
                });
            });
        });
    }
    initFaqSections();
    if (window.jQuery) {
        window.jQuery(document).on('elementor/popup/show', initFaqSections);
    }

    // 3. Contact Inquiry Form AJAX Submission
    const inquiryForms = document.querySelectorAll('form.fg-inquiry-form');
    inquiryForms.forEach(form => {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Transmitting...</span>';
            }

            const formData = new FormData(form);
            formData.append('action', 'fg_submit_inquiry');
            if (window.fgData && window.fgData.nonce) {
                formData.append('nonce', window.fgData.nonce);
            }
            // Fallback for field values by id/selector
            if (!formData.get('name')) {
                const el = form.querySelector('#userName') || form.querySelector('input[name="name"]');
                if (el) formData.set('name', el.value);
            }
            if (!formData.get('email')) {
                const el = form.querySelector('#userEmail') || form.querySelector('input[name="email"]');
                if (el) formData.set('email', el.value);
            }
            if (!formData.get('phone')) {
                const el = form.querySelector('#userPhone') || form.querySelector('input[name="phone"]');
                if (el) formData.set('phone', el.value);
            }
            if (!formData.get('company')) {
                const el = form.querySelector('#userCompany') || form.querySelector('input[name="company"]');
                if (el) formData.set('company', el.value);
            }
            if (!formData.get('department')) {
                const el = form.querySelector('#department') || form.querySelector('select[name="department"]');
                if (el) formData.set('department', el.value);
            }
            if (!formData.get('requirement')) {
                const el = form.querySelector('input[name="requirement"]:checked') || form.querySelector('input[name="reqType"]:checked');
                if (el) formData.set('requirement', el.value);
            }
            if (!formData.get('message')) {
                const el = form.querySelector('#userMessage') || form.querySelector('textarea[name="message"]');
                if (el) formData.set('message', el.value);
            }

            try {
                const ajaxUrl = (window.fgData && window.fgData.ajaxUrl) ? window.fgData.ajaxUrl : '/wp-admin/admin-ajax.php';
                const res = await fetch(ajaxUrl, {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.success) {
                    form.innerHTML = '<div class="p-6 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 font-medium text-center"><div class="text-2xl mb-2">⚡</div><h4 class="font-bold text-lg mb-1">Inquiry Dispatched</h4><p class="text-sm">' + (data.data.message || 'Ticket logged. Direct NOC SLA: < 15 minutes.') + '</p></div>';
                } else {
                    alert(data.data.message || 'Error sending inquiry. Please retry.');
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                }
            } catch (err) {
                console.error(err);
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            }
        });
    });

    // 4. Facility Tour Form AJAX Submission
    const facilityForms = document.querySelectorAll('form.fg-facility-form');
    facilityForms.forEach(form => {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Processing Access Request...</span>';
            }

            const formData = new FormData(form);
            formData.append('action', 'fg_submit_facility_tour');
            if (window.fgData && window.fgData.nonce) {
                formData.append('nonce', window.fgData.nonce);
            }

            try {
                const res = await fetch(window.fgData ? window.fgData.ajaxUrl : '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.success) {
                    form.innerHTML = '<div class="p-6 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 font-medium text-center"><div class="text-2xl mb-2">🏢</div><h4 class="font-bold text-lg mb-1">Clearance Protocol Dispatched</h4><p class="text-sm">' + (data.data.message || 'Access clearance requested. Our facilities team will review your credentials.') + '</p></div>';
                } else {
                    alert(data.data.message || 'Submission error.');
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                }
            } catch (err) {
                console.error(err);
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            }
        });
    });
});
