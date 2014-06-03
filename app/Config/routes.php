<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */



/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

Router::connect('/', array('controller' => 'pages', 'action' => 'index'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

Router::connect('/admin', array('admin' => true, 'controller' => 'admins', 'action' => 'login'));

/* My Project Routing */
Router::connect('/my-project/*', array('controller' => 'projects', 'action' => 'my_project'));

/* My Workromm Routing */
Router::connect('/my-workroom/*', array('controller' => 'users', 'action' => 'my_workroom'));

/* My Profile edit Routing */
Router::connect('/profile-edit/*', array('controller' => 'users', 'action' => 'edit_profile'));

/* registration Routing */
Router::connect('/register/*', array('controller' => 'users', 'action' => 'register'));

/* login Routing */
Router::connect('/login/*', array('controller' => 'users', 'action' => 'login'));

/* forget password Routing */
Router::connect('/forgot-password/*', array('controller' => 'users', 'action' => 'forgot_password'));

/* reset password Routing */
Router::connect('/reset-password/*', array('controller' => 'users', 'action' => 'reset_password'));





/* $x = array_keys($_REQUEST);
 pr($x); die; */

//Router::connect('/:action/*', array('controller' => 'users', 'action' => ':action'));


Router::connect('/feedback/*', array('controller' => 'feedbacks', 'action' => 'feedback'));

Router::connect('/:static', array('controller' => 'pages', 'action' => 'view','static'=>':static'));

Router::parseExtensions('rss','xml', 'csv');

Router::parseExtensions();
/*public profile portfolio*/
/* Router::connect('/port/view/*', array('controller' => 'portfolios', 'action' => 'public_portfolio')); */

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
