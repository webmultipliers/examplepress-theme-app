<?php
/**
 * Plugin Name: __NAME__
 * Description: __DESC__
 * Version: 0.0.0
 * Theme: examplepress-theme
 * Requires at least: 6.9
 * Requires PHP: 8.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── 1. Set the Route Topology (Origin Registration) ───────────────
// Uncomment this block to register your app's routing cascade and claim the namespace.
/*
if ( function_exists( 'examplepress_register_route_origin' ) ) {
	$__ep_config   = json_decode( file_get_contents( __DIR__ . '/examplepress.json' ), true ) ?: [];
	$__ep_priority = (int) ( $__ep_config['routing']['priority'] ?? 10 );

	examplepress_register_route_origin( '__SLUG__', [
		'front'   => fn() => is_front_page() || is_home(),
		'single'  => fn() => is_singular(),
		'archive' => fn() => is_archive(),
		'search'  => fn() => is_search(),
		'404'     => fn() => is_404(),
	], $__ep_priority );

	unset( $__ep_config, $__ep_priority );
}
*/

// ── 2. Rewrite the Template Prefix (Example) ──────────────────────
// By default, ExamplePress expects template blocks to be prefixed
// with "template-" (e.g., __SLUG__/template-front).
/*
add_filter( 'examplepress_template_prefix', function( $prefix ) {
	return 'view'; // Changes expectation to __SLUG__/view-front
} );
*/

// ── 3. Override the Resolved Origin / Namespace (Example) ─────────
// Intercepts the router *after* it evaluates all origins but *before* dispatch.
/*
add_filter( 'examplepress_resolved_origin', function( $origin ) {
	// Force a specific namespace under certain conditions
	if ( is_singular('custom_type') ) {
		$origin['namespace'] = 'my-custom-namespace';
	}
	return $origin;
} );
*/

// ── 4. Fully Override the Template Block Name (Example) ───────────
// Gives you absolute control over the final block name dispatched.
/*
add_filter( 'examplepress_template_block_name', function( $block_name, $slug, $prefix, $namespace ) {
	// If the slug is 'front', load a highly specific block
	if ( $slug === 'front' ) {
		return '__SLUG__/custom-homepage-block';
	}
	return $block_name;
}, 10, 4 );
*/

// ── 5. Blockstudio Initialization ─────────────────────────────────
// This must remain active so Blockstudio boots properly.
add_action( 'init', function () {
	if ( ! class_exists( 'Blockstudio\\Build' ) ) {
		return;
	}

	Blockstudio\Build::init( [
		'dir' => plugin_dir_path( __FILE__ ) . 'app',
	] );
} );
