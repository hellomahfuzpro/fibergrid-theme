/**
 * FiberGrid — Telemetry HUD & Interactive Diagnostics
 *
 * @package FiberGrid
 */

document.addEventListener('DOMContentLoaded', function() {
    // 1. Looking Glass Ping / Trace Simulator
    var lgForm = document.querySelector('.fg-looking-glass-form');
    if (lgForm) {
        lgForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var targetInput = lgForm.querySelector('input[name="target_ip"]');
            var actionSelect = lgForm.querySelector('select[name="query_type"]');
            var outputBox = document.querySelector('.fg-terminal-output');

            var target = targetInput ? targetInput.value.trim() : '1.1.1.1';
            var query = actionSelect ? actionSelect.value : 'ping';

            if (outputBox) {
                outputBox.innerHTML = '<span style="color:#06B6D4;">[NOC-ROUTER-JHB-01] Executing ' + query.toUpperCase() + ' to ' + target + '...</span>\n' +
                                      'Sending 5, 100-byte ICMP Echos to ' + target + ', timeout is 2 seconds:\n' +
                                      '!!!!!\n' +
                                      'Success rate is 100 percent (5/5), round-trip min/avg/max = 1.12/1.45/1.89 ms\n' +
                                      '<span style="color:#10B981;">[Route Healthy] Zero packet loss across core fiber backbone.</span>';
            }
        });
    }

    // 2. Colocation Rack Calculator Live Specs Switcher
    var rackBtns = document.querySelectorAll('.fg-rack-btn');
    rackBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            rackBtns.forEach(function(b) { b.classList.remove('active'); });
            btn.classList.add('active');

            var size = btn.getAttribute('data-rack-size');
            var powerField = document.querySelector('.fg-rack-power-display');
            var portField = document.querySelector('.fg-rack-port-display');
            var priceField = document.querySelector('.fg-rack-price-display');

            if (size === 'quarter') {
                if (powerField) powerField.textContent = '1.5 kVA Redundant (A+B)';
                if (portField) portField.textContent = '2x 10 Gbps SFP+ Upstream';
                if (priceField) priceField.textContent = '$450 / mo';
            } else if (size === 'half') {
                if (powerField) powerField.textContent = '3.0 kVA Redundant (A+B)';
                if (portField) portField.textContent = '4x 10 Gbps SFP+ Upstream';
                if (priceField) priceField.textContent = '$790 / mo';
            } else if (size === 'full') {
                if (powerField) powerField.textContent = '6.0 kVA Redundant (A+B Dual Feeds)';
                if (portField) portField.textContent = '2x 100 Gbps QSFP28 Cross-Connects';
                if (priceField) priceField.textContent = '$1,350 / mo';
            }
        });
    });
});
