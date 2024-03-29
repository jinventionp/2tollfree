<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $currentUser = [];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Permissions');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => false,
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'],
                    'finder' => 'auth'
                ]
            ],
            'unauthorizedRedirect' => $this->referer(),
            'storage' => 'Session'
        ]);
        
        $this->Auth->allow(['logout']);
        //$this->Auth->allow();

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $role = $this->Auth->user('role');
        $profiles = $this->Auth->user('role.profiles');
        $params = $this->request->getAttribute('params');

        $permissionsModule = $this->Permissions->getPermissionsModule($profiles, $params['controller']);
        //pr($permissionsModule);
        if(empty($permissionsModule)){
            //return $this->redirect(['controller' => 'Customers', 'action' => 'dashboard']);
        }elseif($permissionsModule['_joinData']['see'] == 1){
            $this->Auth->allow('index');
        }

        $this->currentUser = $this->Auth->user();
        $this->set('currentUser', $this->currentUser);
    }


    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        /*if (!$this->request->getParam('prefix')) {
            return true;
        }*/

        // Only admins can access admin functions
        /*if ($this->request->getParam('prefix') === 'admin') {
            return (bool)($user['role'] === 'admin');
        }*/

        // Default deny
        return false;
    }
}
