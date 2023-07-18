<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['add-product'] = 'products/add_product';
$route['manage-product'] = 'products/manage_product';
$route['change-product-status/(.+)/(:any)'] = 'products/change_product_status/$1/$2';
$route['edit-product/(.+)'] = 'products/edit_product/$1';
$route['update-product'] = 'products/update_product';

$route['edit-category/(.+)'] = 'categories/edit_category/$1';
$route['change-category-status/(.+)/(:any)'] = 'categories/change_category_status/$1/$2';
$route['all-category'] = 'categories/show_all_categories';
$route['add-category'] = 'categories/show_add_category_form';
$route['register-admin'] = 'admin/show_admin_register_form';
$route['admin-logout'] = 'admin_login/check_admin_logout';
$route['admin-dashboard'] = 'admin/show_dashboard';
$route['admin-login'] = 'admin_login/check_admin_login';
$route['admin'] = 'admin_login';



$route['home-page'] = 'welcome';
$route['product-details/(.+)'] = 'welcome/product_details/$1';

/*
    Start Cart
*/

$route['add-to-cart'] = 'carts/add_to_cart';
$route['delete-to-cart/(.+)'] = 'carts/delete_to_cart/$1';
$route['show-cart'] = 'carts/show_cart';
$route['update-cart-product-qty'] = 'carts/update_cart_product_qty';


/*
    End Cart
*/

/*
    Start Checkout
*/

$route['checkout'] = 'checkouts/index';
$route['customer-registration'] = 'checkouts/customer_registration';
$route['billing'] = 'checkouts/billing';
$route['update-billing'] = 'checkouts/update_billing';
$route['shipping'] = 'checkouts/shipping';
$route['payment'] = 'checkouts/payment';
$route['place-order'] = 'checkouts/place_order';




/*
    End Checkout
*/



$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
