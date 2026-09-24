/**
 * FiberGrid — Front-end Asynchronous Form Submissions Handler
 *
 * Provides instant feedback, CSRF nonce protection, and loading states.
 * @package FiberGrid
 */

document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('.fg-ajax-form');

    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            var originalBtnText = submitBtn ? submitBtn.innerHTML : 'Submit';
            var alertBox = form.querySelector('.fg-form-alert');

            if (!alertBox) {
                alertBox = document.createElement('div');
                alertBox.className = 'fg-form-alert';
                form.prepend(alertBox);
            }

            alertBox.style.display = 'none';
            alertBox.innerHTML = '';
            alertBox.className = 'fg-form-alert';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="fg-spinner"></span> Routing Request...';
            }

            var formData = new FormData(form);
            formData.append('action', 'fg_submit_form');
            if (window.fg_vars && window.fg_vars.nonce) {
                formData.append('security', window.fg_vars.nonce);
            }

            var ajaxUrl = (window.fg_vars && window.fg_vars.ajax_url) ? window.fg_vars.ajax_url : '/wp-admin/admin-ajax.php';

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                if (data.success) {
                    alertBox.className = 'fg-form-alert fg-alert-success';
                    alertBox.style.display = 'block';
                    alertBox.style.padding = '14px 18px';
                    alertBox.style.marginBottom = '20px';
                    alertBox.style.borderRadius = '8px';
                    alertBox.style.background = '#ECFDF5';
                    alertBox.style.color = '#065F46';
                    alertBox.style.border = '1px solid #A7F3D0';
                    alertBox.style.fontFamily = 'var(--fg-font-body, inherit)';
                    alertBox.style.fontSize = '14px';
                    alertBox.innerHTML = '<strong>Success:</strong> ' + (data.data.message || 'Your inquiry has been submitted.');
                    form.reset();
                } else {
                    alertBox.className = 'fg-form-alert fg-alert-error';
                    alertBox.style.display = 'block';
                    alertBox.style.padding = '14px 18px';
                    alertBox.style.marginBottom = '20px';
                    alertBox.style.borderRadius = '8px';
                    alertBox.style.background = '#FEF2F2';
                    alertBox.style.color = '#991B1B';
                    alertBox.style.border = '1px solid #FECACA';
                    alertBox.style.fontFamily = 'var(--fg-font-body, inherit)';
                    alertBox.style.fontSize = '14px';
                    alertBox.innerHTML = '<strong>Error:</strong> ' + ((data.data && data.data.message) ? data.data.message : 'Please check your inputs and try again.');
                }
            })
            .catch(function(err) {
                console.error(err);
                alertBox.className = 'fg-form-alert fg-alert-error';
                alertBox.style.display = 'block';
                alertBox.style.padding = '14px 18px';
                alertBox.style.marginBottom = '20px';
                alertBox.style.borderRadius = '8px';
                alertBox.style.background = '#FEF2F2';
                alertBox.style.color = '#991B1B';
                alertBox.style.border = '1px solid #FECACA';
                alertBox.innerHTML = '<strong>Network Error:</strong> Unable to dispatch inquiry. Please reach out to our 24/7 NOC directly.';
            })
            .finally(function() {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        });
    });
});
