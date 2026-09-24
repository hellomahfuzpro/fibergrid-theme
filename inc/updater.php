<?php
/**
 * FiberGrid — GitHub Over-The-Air (OTA) Theme Updater
 *
 * Powered by YahnisElsts Plugin Update Checker v5.4
 *
 * @package FiberGrid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fg_bootstrap_updater() {
    $lib = FG_DIR . '/lib/plugin-update-checker/plugin-update-checker.php';
    if ( ! file_exists( $lib ) ) {
        return;
    }
    require_once $lib;

    if ( class_exists( '\YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
        $fg_update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
            'https://github.com/hellomahfuzpro/fibergrid-theme/',
            FG_DIR . '/style.css',
            'fibergrid-theme'
        );

        if ( $fg_update_checker && method_exists( $fg_update_checker->getVcsApi(), 'enableReleaseAssets' ) ) {
            $fg_update_checker->getVcsApi()->enableReleaseAssets();
        }
    }
}
add_action( 'after_setup_theme', 'fg_bootstrap_updater' );
