<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['stripe_key_test_public']         = 'pk_test_VnzkWpUa6N5tZvq2iwAMcRxq';
$config['stripe_key_test_secret']         = 'sk_test_ebpkGoWTozX8hC23n6tIlHfT';
$config['stripe_key_live_public']         = '';
$config['stripe_key_live_secret']         = '';
$config['stripe_test_mode']               = (ENVIRONMENT == 'production') ? FALSE : TRUE;
$config['stripe_verify_ssl']              = FALSE;
$config['stripe_currency']                = 'usd';
$config['stripe_decode']                  = FALSE;

// Create the library object

// Run the required operations

/* End of file stripe.php */
/* Location: ./application/config/stripe.php */
