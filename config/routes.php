<?php
/**
* Routes configuration
*
* In this file, you set up routes to your controllers and their actions.
* Routes are very important mechanism that allows you to freely connect
* different URLs to chosen controllers and their actions (functions).
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
* The default class to use for all routes
*
* The following route classes are supplied with CakePHP and are appropriate
* to set as the default:
*
* - Route
* - InflectedRoute
* - DashedRoute
*
* If no call is made to `Router::defaultRouteClass()`, the class used is
* `Route` (`Cake\Routing\Route\Route`)
*
* Note that `Route` does not do any inflections on URLs which will result in
* inconsistently cased URLs when used with `:plugin`, `:controller` and
* `:action` markers.
*
*/
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
   /**
   * Here, we are connecting '/' (base path) to a controller called 'Pages',
   * its action called 'display', and we pass a param to select the view file
   * to use (in this case, src/Template/Pages/home.ctp)...
   */

   //extentions
   $routes->extensions(['json']);

   $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

   $routes->connect('/legal', ['controller' => 'App', 'action' => 'acceptLegal']);



   //redirect old site
   $routes->connect('/annonces/:id-:slug', ['controller' => 'Announces', 'action' => 'oldView'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
   $routes->connect('/annonces-gratuites/:id-:slug', ['controller' => 'Announces', 'action' => 'oldFreeView'], ['pass' =>['id', 'slug'], 'id' => '[0-9]+']);
   $routes->connect('/posts/view/:id/:slug', ['controller' => 'Posts', 'action' => 'oldView'], ['pass' =>['id', 'slug'], 'id' => '[0-9]+']);

   //handled by htaccess
   //$routes->redirect('/libertines', '/escort-girl-paris', ['status' => 301]);
   //$routes->redirect('/home.php', '/', ['status' => 301]);
   //$routes->redirect('/BDSM', '/bdsm', ['status' => 301]);
   //$routes->redirect('/libertins', '/escort-gay-hetero', ['status' => 301]);
   //$routes->redirect('/transgenres', '/escort-trans-paris', ['status' => 301]);
   //$routes->redirect('/recherche-libertine-ville', '/escort-girl-paris', ['status' => 301]);
   //$routes->redirect('/escort-girl-paris.php*', '/escort-girl-paris', ['status' => 301]);
   //$routes->redirect('/escort-girl-paris/escort-girl-paris', '/escort-girl-paris', ['status' => 301]);

   /*$routes->redirect(
        '/escort-girl-paris.php*',
        ['controller' => 'Announces', 'action' => 'index', 'escort-girl-paris'],
        ['persist' => false]
        // Or ['persist'=>['id']] for default routing where the
        // view action expects $id as an argument.
    );

    $routes->redirect(
         '/escort-girl-paris.php',
         ['controller' => 'Announces', 'action' => 'index', 'escort-girl-parisx'],
         ['persist' => false]
         // Or ['persist'=>['id']] for default routing where the
         // view action expects $id as an argument.
     );*/


   //$routes->redirect('/annonces/index/1/*', '/escort-girl-paris', ['status' => 301]);
   //$routes->redirect('/annonces/index/2/*', '/escort-gay-hetero', ['status' => 301]);
   //$routes->redirect('/annonces/index/3/*', '/bdsm', ['status' => 301]);
   //$routes->redirect('/annonces/index/4/*', '/escort-trans-paris', ['status' => 301]);

   /*$routes->redirect('/posts/index/page:2', '/post-libres?page=2', ['status' => 301]);
   $routes->redirect('/posts/index/page:3', '/post-libres?page=3', ['status' => 301]);
   $routes->redirect('/posts/index/page:4', '/post-libres?page=4', ['status' => 301]);
   $routes->redirect('/posts/index/page:5', '/post-libres?page=5', ['status' => 301]);
   $routes->redirect('/posts/index/page:6', '/post-libres?page=6', ['status' => 301]);
   $routes->redirect('/posts/index/page:7', '/post-libres?page=7', ['status' => 301]);*/
   //$routes->redirect('/recherche-libertine-ville/167-01er-arrondissement-de-Paris', '/escort-girl-paris/1', ['status' => 301]);
   /*$routes->redirect('/recherche-libertine-ville/167-01er-arrondissement-de-Paris', '/escort-girl-paris/1', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/168-02e-arrondissement-de-Paris', '/escort-girl-paris/2', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/169-03e-arrondissement-de-Paris', '/escort-girl-paris/3', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/170-04e-arrondissement-de-Paris', '/escort-girl-paris/4', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/171-05e-arrondissement-de-Paris', '/escort-girl-paris/5', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/172-06e-arrondissement-de-Paris', '/escort-girl-paris/6', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/173-07e-arrondissement-de-Paris', '/escort-girl-paris/7', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/174-08e-arrondissement-de-Paris', '/escort-girl-paris/8', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/175-09e-arrondissement-de-Paris', '/escort-girl-paris/9', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/176-10e-arrondissement-de-Paris', '/escort-girl-paris/10', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/177-11e-arrondissement-de-Paris', '/escort-girl-paris/11', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/178-12e-arrondissement-de-Paris', '/escort-girl-paris/12', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/179-13e-arrondissement-de-Paris', '/escort-girl-paris/13', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/180-14e-arrondissement-de-Paris', '/escort-girl-paris/14', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/181-15e-arrondissement-de-Paris', '/escort-girl-paris/15', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/182-16e-arrondissement-de-Paris', '/escort-girl-paris/16', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/183-17e-arrondissement-de-Paris', '/escort-girl-paris/17', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/184-18e-arrondissement-de-Paris', '/escort-girl-paris/18', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/185-19e-arrondissement-de-Paris', '/escort-girl-paris/19', ['status' => 301]);
   $routes->redirect('/recherche-libertine-ville/186-20e-arrondissement-de-Paris', '/escort-girl-paris/20', ['status' => 301]);

   $routes->redirect('/pub.php', '/', ['status' => 301]);
   $routes->redirect('/mlegal.php', '/avis-legal', ['status' => 301]);
   $routes->redirect('/toplist-lovesita', '/toplist', ['status' => 301]);*/

   /**
   *
   * new redirect 12/2017
   *
   **/
   //$routes->redirect('/escort-girl-paris.php', '/escort-girl-paris', ['status' => 301]);


   $routes->connect('/:cat', ['controller' => 'Announces', 'action' => 'index'], ['pass' => ['cat']]);
   $routes->connect('/:cat/:state_slug', ['controller' => 'Announces', 'action' => 'index'],['pass' => ['cat','state_slug']]);
   $routes->connect('/:cat/:state_slug/:city_slug', ['controller' => 'Announces', 'action' => 'index'],['pass' => ['cat','state_slug', 'city_slug']]);
   $routes->connect('/escort/:slug', ['controller' => 'Announces', 'action' => 'view'],['pass' => ['slug']]);



   $routes->connect('/annonces-gratuites', ['controller' => 'Announces', 'action' => 'freeIndex']);
   $routes->connect('/annonces-gratuites/:slug', ['controller' => 'Announces', 'action' => 'freeView'],['pass' => ['slug']]);

   $routes->connect('/post-libres', ['controller' => 'Posts', 'action' => 'index']);
   $routes->connect('/post-libres/:slug',['controller' => 'Posts', 'action' => 'view'],['pass' => ['slug']]);

   $routes->connect('/toplist', ['controller' => 'Toplists', 'action' => 'index']);
   $routes->connect('/toplists/out/:id', ['controller' => 'Toplists', 'action' => 'out'],['pass' => ['id']]);
   $routes->connect('/toplists/in/:id', ['controller' => 'Toplists', 'action' => 'in'],['pass' => ['id']]);

   $routes->connect('/contact', ['controller' => 'Contacts', 'action' => 'add']);


   $routes->connect('/getCities/:state_id', ['controller' => 'Announces', 'action' => 'getCities'], ['pass' => ['state_id']]);


   /**
   * ...and connect the rest of 'Pages' controller's URLs.
   */
   $routes->connect('/faqs',  ['controller'=>'Pages', 'action'=>'display', 'faqs']);
   $routes->connect('/site-de-rencontre', ['controller' => 'Pages', 'action' => 'display', 'site_de_rencontre']);
   $routes->connect('/echange-de-liens',  ['controller'=>'Pages', 'action'=>'display', 'echange_de_liens']);
   $routes->connect('/avis-legal',  ['controller'=>'Pages', 'action'=>'display', 'avis_legal']);
   $routes->connect('/aviso-legal',  ['controller'=>'Pages', 'action'=>'display', 'aviso_legal']);
   $routes->connect('/sites-remarquables',  ['controller'=>'Pages', 'action'=>'display', 'sites_remarquables']);


   $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
   $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

   $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

   $routes->connect('/publier-une-annonce',  ['controller'=>'Announces', 'action'=>'add']);
   $routes->connect('/mon-annonce', ['controller' => 'Announces', 'action' => 'myAnnounce']);
   $routes->connect('/editer-mon-annonce', ['controller' => 'Announces', 'action' => 'editMyAnnounce']);
   $routes->connect('/premium',  ['controller'=>'Announces', 'action'=>'addPremium']);
   $routes->connect('/preview', ['controller' => 'Announces', 'action' => 'preview']);
   $routes->connect('/annonce/online', ['controller' => 'Announces', 'action' => 'beOnline']);


   $routes->connect('/mes-images', ['controller' => 'Pics', 'action' => 'myPics']);
   $routes->connect('/editer-mes-images', ['controller' => 'Pics', 'action' => 'editMyPics']);
   $routes->connect('/effacer-image/:id', ['controller' => 'Pics', 'action' => 'delete'],['pass' => ['id']]);
   $routes->connect('/remplacer-image/:id', ['controller' => 'Pics', 'action' => 'replace'],['pass' => ['id']]);
   $routes->connect('/ajouter-image/:id', ['controller' => 'Pics', 'action' => 'add'],['pass' => ['id']]);
   $routes->connect('/change-password', ['controller' => 'Users', 'action' => 'changePassword']);
   $routes->connect('/recover', ['controller' => 'Users', 'action' => 'recover']);




   /**
   * Connect catchall routes for all controllers.
   *
   * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
   *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
   *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
   *
   * Any route class can be used with this method, such as:
   * - DashedRoute
   * - InflectedRoute
   * - Route
   * - Or your own route class
   *
   * You can remove these routes once you've connected the
   * routes you want in your application.
   */
   //$routes->fallbacks(DashedRoute::class);
});



Router::prefix('admin', function ($routes) {
   // Toutes les routes ici seront préfixées avec `/admin` et auront
   // l'élément de route prefix => admin ajouté.
   //extentions
   $routes->extensions(['json']);
   $routes->connect('/', ['controller' => 'dashboard', 'action' => 'index']);
   $routes->fallbacks(DashedRoute::class);
});


/**
* Load all plugin routes.  See the Plugin documentation on
* how to customize the loading of plugin routes.
*/
Plugin::routes();
