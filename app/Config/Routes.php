<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// CRUD RESTful Routes

$routes->get('users-list', 'UserCrud::index');
$routes->get('user-form', 'UserCrud::create');
$routes->post('submit-form', 'UserCrud::store');
$routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1');
$routes->post('edit-view/update', 'UserCrud::update');
$routes->get('delete/(:num)', 'UserCrud::delete/$1');

//Admin
$routes->get('admin/dashboard', 'UserCrud::index');
$routes->get('admin/user-list', 'UserCrud::index');
$routes->get('admin/verify-membership', 'UserCrud::index');
$routes->get('admin/edit-profile', 'UserCrud::index');

//User
// $routes->get('user/profile', 'UserCrud::profile');
$routes->get('edit-profile', 'UserController::editProfile');
$routes->post('submit-edit-profile', 'UserController::editProfileProcess');
$routes->get('profile', 'UserController::profile');
$routes->get('change-password', 'UserController::changePassword');
$routes->post('submit-change-password', 'UserController::changePasswordProcess');
$routes->get('saved-payment-cards', 'UserController::savedPaymentCard2');
$routes->post('/cards/delete/(:num)', 'UserController::deleteCard/$1');




//Signup-login
$routes->get('/', 'LoginController::index');
$routes->get('login', 'LoginController::login');
$routes->get('signup', 'LoginController::signup');
$routes->post('submit-login', 'LoginController::loginProcess');
$routes->post('submit-signup', 'LoginController::signupProcess');
$routes->get('logout', 'LoginController::logout');
$routes->get('check-login-status/(:any)', 'LoginController::checkLoginStatus/$1');
// $routes->get('check-login-status', 'LoginController::checkLoginStatus');


//Plans
$routes->get('plan/individual', 'PlanController::individual');
//Checkout
$routes->get('plan/checkout/promote', 'PlanController::checkoutForm');
$routes->post('plan/checkout/submit-checkout', 'PlanController::checkoutStore');







/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
