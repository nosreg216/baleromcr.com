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
$route['video/(:num)'] = 'Video/view_video/$1';
$route['video/(:num)/(:any)'] = 'Video/view_video/$1';

/* Search */
$route['search/?'] = 'Search/index';

/* Shopping Cart*/
$route['cart'] = 'Cart/display';
$route['cart/clean'] = 'Cart/clean';
$route['cart/delete/(:any)'] = 'Cart/delete/$1';

$route['cart/add/album/(:num)'] = 'Cart/add_album/$1';
$route['cart/add/track/(:num)'] = 'Cart/add_track/$1';
$route['cart/add/single/(:num)'] ='Cart/add_single/$1';
$route['cart/add/video/(:num)'] = 'Cart/add_video/$1';
$route['cart/add/bundle/(:num)'] = 'Cart/add_bundle/$1';

/* Order */
$route['checkout'] = 'Order/checkout';
$route['order/checkout'] = 'Order/checkout';
$route['order/update/(:any)'] = 'Order/complete/$1';
$route['order/cancel/(:any)'] = 'Order/cancel/$1';

/* Download */
$route['order/(:any)'] = 'Order/display/$1'; // Accesed from the email link.
$route['order/download'] = 'Order/download'; // Accesed from the display view.

/* ========================= Admin Dashboard ======================== */
	
	// Account Methods
$route['admin/login'] = 'Account/login';
$route['admin/logout'] = 'Account/logout';

	// Display Methods
$route['admin'] = 'Display/dashboard'; // Handles the authentificaction.
$route['admin/(:any)'] = 'Display/dashboard/$1'; // Displays the Dashboard views.

	// Insert Methods (Class controllers)
$route['admin/albums/add'] = 'Album/insert/';
$route['admin/singles/add'] = 'Song/insert';
$route['admin/videos/add'] = 'Video/insert';
#$route['admin/bundles/add'] = 'Bundle/insert';
$route['admin/albums/add_track'] = 'Album/insert_track/';
#$route['admin/bundles/add_track'] = 'Bundle/insert_track';

	// Update Methods (Class controllers)
$route['admin/albums/update/(:num)'] = 'Album/update/$1';
$route['admin/singles/update/(:num)'] = 'Song/update/$1';
$route['admin/videos/update/(:num)'] = 'Video/update/$1';
#$route['admin/bundles/update/(:num)'] = 'Bundle/update/$1';

	// Delete Methods (Class controllers)
$route['admin/albums/delete/(:num)'] = 'Album/delete/$1';
$route['admin/singles/delete/(:num)'] = 'Song/delete/$1';
$route['admin/videos/delete/(:num)'] = 'Video/delete/$1';
#$route['admin/bundles/delete/(:num)'] = 'Bundle/delete/$1';

	// Edit Methods
$route['admin/albums/edit/(:num)'] = 'Display/album_editor/$1';
$route['admin/singles/edit/(:num)'] = 'Display/song_editor/$1';
$route['admin/videos/edit/(:num)'] = 'Display/video_editor/$1';
#$route['admin/bundle/edit/(:num)'] = 'Display/bundle_editor/$1';

	// General Page Administration
$route['admin/banners/add'] = 'Page/add_banner';
$route['admin/banners/delete/(:num)'] = 'Page/delete_banner/$1';

/*Debugging*/
$route['test'] = 'Test';
$route['test/(:any)'] = 'Test/$1';

/*Defaults*/
$route['default_controller'] = 'Display/page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;