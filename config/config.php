<?php
// Logistics System Configuration

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'logistics_system');

// API Configuration
define('API_KEY', 'logistics_api_key_dev');
define('API_SECRET', 'secret_key_dev');
define('API_VERSION', '1.0');

// System Settings
define('TIMEZONE', 'UTC');
define('ENVIRONMENT', 'development');

// Auto-Tracking Settings
define('AUTO_TRACKING_ENABLED', true);
define('AUTO_TRACKING_INTERVAL', 300);
define('GPS_SIMULATION_ENABLED', true);
define('DEFAULT_SPEED_KPH', 80);

// Payment Integration
define('STRIPE_SECRET_KEY', 'sk_test_your_key_here');
define('PAYPAL_CLIENT_ID', 'your_paypal_id');

// Email/SMS Configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your_email@gmail.com');
define('SMTP_PASS', 'your_password');
define('TWILIO_ACCOUNT_SID', 'your_twilio_sid');
define('TWILIO_AUTH_TOKEN', 'your_twilio_token');

// Carrier APIs
define('FEDEX_API_KEY', 'your_fedex_key');
define('UPS_API_KEY', 'your_ups_key');
define('DHL_API_KEY', 'your_dhl_key');

// App Settings
define('DEBUG_MODE', true);
define('LOG_DIR', __DIR__ . '/../logs');

error_reporting(E_ALL);
ini_set('display_errors', DEBUG_MODE ? '1' : '0');
date_default_timezone_set(TIMEZONE);
?>
