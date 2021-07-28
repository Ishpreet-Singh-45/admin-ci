<?php

namespace Config;




// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// -------------------- LOGIN and SIGNUP -----------------------------

$routes -> addRedirect('/', '/login');
$routes -> addRedirect('/dashboard', '/admin/dashboard');

// --------------------- PROJECTS --------------------------------
// 				add, edit, create, delete

$routes -> addRedirect("/admin", "/admin/projects");
$routes -> add('/admin/dashboard', "Admin::index", ['as' => 'index_page']); // show all projects

$routes -> add('/admin/project/create', "Admin::create", ['as' => 'create_page']);  // create a new one

$routes -> add('/admin/project/view/(:num)', "Admin::view/$1", ['as' => 'view_page']); // view the existing

$routes -> get('/admin/project/edit/(:num)', "Admin::edit/$1", ['as' => 'edit_page']); // show the existing to edit
$routes -> post('/admin/project/edit/(:num)', "Admin::edit/$1"); // save the newly edited

$routes -> add('/admin/project/fileupload/(:num)', 'Admin::FileUpload/$1', ['as' => 'upload_page']); // upload some files
$routes -> add('/admin/project/file/uploads/(:segment)', 'Admin::fileView/$1'); // view any file

$routes -> add('/admin/project/delete/(:any)&(:num)', 'Admin::deleteProject/$1/$2', ['as' => 'delete_page']); // delete the whole project
$routes -> add('/admin/delete/file/d=(:num)/n=(:alphanum)', 'Admin::deleteFiles/$2/$1/true'); // delete a particular file




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
