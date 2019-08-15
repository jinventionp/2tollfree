<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentRoles']
        ];
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['ParentRoles', 'Profiles', 'roles', 'ChildRoles']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            if(empty($role->getErrors())){
                if ($this->Roles->save($role)) {
                    $response["success"] = 1;
                    $response["message"] = __('The role has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Roles', 'action' => 'roles']);
                    $response["modal"] = "#modalAdd";
                }else{
                    $response["message"] = ['error' => ['custom' => __('The role could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $role->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $parentRoles = $this->Roles->ParentRoles->find('list', ['limit' => 200]);
        $profiles = $this->Roles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('role', 'parentRoles', 'profiles', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Profiles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            if(empty($role->getErrors())){
                if ($this->Roles->save($role)) {
                    $response["success"] = 1;
                    $response["message"] = __('The role has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Roles', 'action' => 'roles']);
                    $response["modal"] = "#modalEdit";
                }else{
                    $response["message"] = ['error' => ['custom' => __('The role could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $role->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $parentRoles = $this->Roles->ParentRoles->find('list', ['limit' => 200]);
        $profiles = $this->Roles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('role', 'parentRoles', 'profiles', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $response["success"] = 0;
        $response["redirectUrl"] = "";
        $response["modal"] = "";

        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $response["success"] = 1;
            $response["message"] ="Eliminado con Éxito<br>" .  __('The role has been deleted.');
            $response["redirectUrl"] = Router::url(['controller' => 'Roles', 'action' => 'roles']);
            $response["modal"] = "#modalDelete";
        } else {
            $response["message"] = ['error' => ['custom' => __('The role could not be deleted. Please, try again.')]];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function remove($id = null)
    {
        $this->set('id', $id);
    }

    public function roles($txtSearch = null, $cboNumRegister = 10)
    {
        $conditions = [];
        if (!empty($txtSearch)) {
            $conditions = ['OR' => [
                ['Roles.name LIKE' => '%' . $txtSearch . '%'],
                ['Roles.description LIKE' => '%' . $txtSearch . '%'],          
            ],
            //'AND' => ['Roles.active LIKE' => 1],
        ];
        }else{
            //$conditions = ['Roles.active' => 1];
        }
        $this->paginate = [
            'conditions' => $conditions,
            //'contain' => ['Roles'],
            'limit' => $cboNumRegister,
            'maxLimit' => 100,
            'order' => ['Roles.id' => 'DESC']
        ];

        $roles = $this->paginate($this->Roles);
        
        $this->set(compact('roles'));
    }
}