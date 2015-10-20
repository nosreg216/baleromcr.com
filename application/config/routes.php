<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Album */
$route['albums'] = 'Album/view_list';
$route['album/(:num)'] = 'Album/view_album/$1';
$route['album/(:num)/(:any)'] = 'Album/view_album/$1';

/* Single */
$route['song/(:num)'] = 'Song/view_song/$1';
$route['song/(:num)/(:any)'] = 'Song/view_song/$1';

/* Videos */
$route['video/(:num)'] = 'Video/index/$1';
$route['video/(:num)/(:any)'] = 'Video/index/$1';

/* Search */
$route['search/?'] = 'Search/index';

/*Shopping Cart*/
$route['cart'] = 'Cart/display';
$route['cart/clean'] = 'Cart/clean';
$route['cart/delete/(:any)'] = 'Cart/delete/$1';

$route['cart/add/album/(:num)'] = 'Cart/add_album/$1';
$route['cart/add/track/(:num)'] = 'Cart/add_track/$1';
$route['cart/add/single/(:num)'] ='Cart/add_single/$1';
$route['cart/add/video/(:num)'] = 'Cart/add_videp/$1';
$route['cart/add/bundle/(:num)'] = 'Cart/add_bundle/$1';


/* Order */
$route['checkout'] = 'Order/checkout';
$route['email'] = 'Order/email_notify';

$route['order/update/(:any)'] = 'Order/complete/$1';
$route['order/cancel/(:any)'] = 'Order/complete/$1';

/* Download */
$route['order/(:any)'] = 'Order/display/$1';
$route['order/download'] = 'Order/download';

/* Admin Dashboard */
$route['admin'] = 'Display/dashboard';
$route['admin/login'] = 'Display/login';
$route['admin/logout'] = 'Display/logout';
$route['admin/(:any)'] = 'Display/dashboard/$1';
$route['admin/(:any)/(:any)'] = 'Display/dashboard/$1/$2';

/*Debugging*/
$route['test'] = 'Test';
$route['test/(:any)'] = 'Test/$1';

/*Defaults*/
$route['default_controller'] = 'Display';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
