<?php
/**
 * Load test dependencies and classes.
 *
 * This file is included in the application request flow if/when
 * $_GET['wp_orbit_tests'] or $_POST['wp_orbit_tests'] is present.
 */

// WP Orbit - Ajax
require_once __DIR__ . '/../ajax/tests/bootstrap.php';