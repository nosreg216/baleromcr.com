<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Single */
$route['song/(:num)'] = 'Song/index/$1';
$route['song/(:num)/(:any)'] = 'Song/index/$1';

/* Album */
$route['album/(:num)'] = 'Album/index/$1';
$route['album/(:num)/(:any)'] = 'Album/index/$1';

/* Artist (All content) */
$route['balerom'] = 'Artist';

/* Videos */
$route['video/(:num)'] = 'Video/index/$1';
$route['video/(:num)/(:any)'] = 'Video/index/$1';

/* Search */
$route['search/?'] = 'Search/index';

/*Shopping Cart*/
$route['cart'] = 'Cart/display';
$route['cart/clean'] = 'Cart/clean';
$route['cart/add/album/(:num)'] = 'Cart/add_album/$1';
$route['cart/add/single/(:num)'] ='Cart/add_single/$1';
$route['cart/add/video/(:num)'] = 'Cart/add_videp/$1';
$route['cart/add/bundle/(:num)'] = 'Cart/add_bundle/$1';
$route['cart/delete/(:any)'] = 'Cart/delete/$1';

/* Order */
$route['checkout'] = 'Order/checkout';
$route['order/update/(:any)'] = 'Order/update/$1';
$route['order/cancel/(:any)'] = 'Order/update/$1';
$route['order/(:any)'] = 'Order/display/$1';

/* Download */
$route['order/download'] = 'Order/download';

/*Debugging*/
$route['test'] = 'Test';
$route['test/(:any)'] = 'Test/$1';

/*Defaults*/
$route['default_controller'] = 'Display';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
