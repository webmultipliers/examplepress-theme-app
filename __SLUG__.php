<?php
/**
 * Plugin Name: __NAME__
 * Description: __DESC__
 * Version: 0.1.0
 * Theme: examplepress-theme
 * Troy: __TROY__
 * Requires at least: 6.9
 * Requires PHP: 8.4
 * Author: ExamplePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── Route Origin Registration ────────────────────────────────────
// Declare which routes this plugin handles. The theme evaluates all
// registered origins by priority and dispatches to the first match.
// Multiple companion plugins can coexist — each only claims the
// routes it owns.
//
// Priority is read from examplepress.json → routing.priority (default 10).
// Lower number = evaluated first.
//
// Example:
//
//   examplepress_register_route_origin( '__SLUG__', [
//       'front'  => fn() => is_front_page() || is_home(),
//       'single' => fn() => is_singular(),
//       '404'    => fn() => is_404(),
//   ], $__ep_priority );

if ( function_exists( 'examplepress_register_route_origin' ) ) {
	$__ep_config   = json_decode( file_get_contents( __DIR__ . '/examplepress.json' ), true ) ?: [];
	$__ep_priority = (int) ( $__ep_config['routing']['priority'] ?? 10 );

	examplepress_register_route_origin( '__SLUG__', [
		// Add your route conditions here.
	], $__ep_priority );

	unset( $__ep_config, $__ep_priority );
}

// ── Blockstudio Init ──────────────────────────────────────────────

add_action( 'init', function () {
	if ( ! class_exists( 'Blockstudio\\Build' ) ) {
		return;
	}

	Blockstudio\Build::init( [
		'dir' => plugin_dir_path( __FILE__ ) . 'app',
	] );
} );
