/* FiberGrid Admin Submissions JS Handler */
(function($) {
    'use strict';

    $(document).ready(function() {
        var currentActiveId = null;

        // 1. Open Modal with Details
        $('.fg-view-btn').on('click', function(e) {
            e.preventDefault();
            var rawData = $(this).attr('data-json');
            if (!rawData) return;

            try {
                var data = JSON.parse(rawData);
                currentActiveId = data.id;

                $('#fg-modal-title').text('Inquiry #' + data.id + ' — ' + (data.name ? data.name : data.email));
                
                var html = '';
                html += '<div class="fg-detail-row"><strong>Category & Date</strong><span class="fg-pill-type">' + data.form_type + '</span> &bull; ' + data.created_at + '</div>';
                html += '<div class="fg-detail-row"><strong>Submitter Information</strong>' + (data.name ? data.name : 'N/A') + ' &lt;' + data.email + '&gt;<br>' + (data.phone ? 'Phone: ' + data.phone + '<br>' : '') + (data.company ? 'Company: ' + data.company : '') + '</div>';
                if (data.service) {
                    html += '<div class="fg-detail-row"><strong>Requested Service / Plan</strong>' + data.service + '</div>';
                }
                if (data.requirement) {
                    html += '<div class="fg-detail-row"><strong>Technical Requirements / Specs</strong><pre style="background:#f3f4f6;padding:10px;border-radius:4px;white-space:pre-wrap;">' + data.requirement + '</pre></div>';
                }
                if (data.message) {
                    html += '<div class="fg-detail-row"><strong>Message Narrative</strong><div style="background:#f9fafb;padding:12px;border:1px solid #e5e7eb;border-radius:6px;white-space:pre-wrap;">' + data.message + '</div></div>';
                }
                html += '<div class="fg-detail-row" style="font-size:12px;color:#9ca3af;"><strong>Telemetry Metadata</strong>IP: ' + (data.ip_address || 'Unknown') + '</div>';

                $('#fg-modal-body').html(html);
                $('#fg-modal').fadeIn(150);
            } catch (err) {
                console.error(err);
            }
        });

        // 2. Close Modal
        $('.fg-modal-close, .fg-modal-overlay').on('click', function(e) {
            if (e.target === this) {
                $('#fg-modal').fadeOut(150);
            }
        });

        // 3. Mark as Replied
        $('.fg-mark-replied-btn').on('click', function() {
            if (!currentActiveId) return;
            var $btn = $(this);
            $btn.prop('disabled', true);

            $.post(fgAdminVars.ajax_url, {
                action: 'fg_update_submission_status',
                security: fgAdminVars.nonce,
                id: currentActiveId,
                sub_action: 'mark_replied'
            }, function(res) {
                if (res.success) {
                    $('#fg-row-' + currentActiveId + ' .fg-status-badge')
                        .removeClass('fg-badge-new fg-badge-read')
                        .addClass('fg-badge-replied')
                        .text('REPLIED');
                    $('#fg-modal').fadeOut(150);
                }
                $btn.prop('disabled', false);
            });
        });

        // 4. Toggle Read/Unread Status
        $('.fg-action-btn').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var $badge = $('#fg-row-' + id + ' .fg-status-badge');

            $.post(fgAdminVars.ajax_url, {
                action: 'fg_update_submission_status',
                security: fgAdminVars.nonce,
                id: id,
                sub_action: 'toggle_read'
            }, function(res) {
                if (res.success && res.data.status) {
                    $badge.removeClass('fg-badge-new fg-badge-read fg-badge-replied')
                          .addClass('fg-badge-' + res.data.status)
                          .text(res.data.status.toUpperCase());
                }
            });
        });

        // 5. Delete Submission
        $('.fg-delete-btn').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure you want to delete this submission record?')) return;
            var id = $(this).data('id');
            var $row = $('#fg-row-' + id);

            $.post(fgAdminVars.ajax_url, {
                action: 'fg_update_submission_status',
                security: fgAdminVars.nonce,
                id: id,
                sub_action: 'delete'
            }, function(res) {
                if (res.success) {
                    $row.fadeOut(300, function() { $(this).remove(); });
                }
            });
        });
    });
})(jQuery);
