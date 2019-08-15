<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 *
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => ['Fields', 'Modules', 'Roles']
        ]);

        $this->set('profile', $profile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profiles->newEntity();
        if ($this->request->is('post')) {
            //pr($this->request->getData());exit();
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            if(empty($profile->getErrors())){
                if ($this->Profiles->save($profile)) {
                    $response["success"] = 1;
                    $response["message"] = __('The profile has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Profiles', 'action' => 'index']);
                }else{
                    $response["message"] = ['error' => ['custom' => __('The profile could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $customer->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $fields = $this->Profiles->Fields->find('list', ['limit' => 200]);
        /*$modules = $this->Profiles->Modules->find('list', [
            'keyField' => 'id', 
            'valueField' => function ($module) {
                                return (empty($module->label))? $module->name : $module->label;
                            }, 
            'limit' => 200]);*/
        $modules = $this->Profiles->Modules->find('all', [
            'contain' => ['Fields']
        ]);
        $roles = $this->Profiles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'fields', 'modules', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => ['Fields', 'Modules', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($this->request->getData());exit();
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            if(empty($profile->getErrors())){
                if ($this->Profiles->save($profile)) {
                    $response["success"] = 1;
                    $response["message"] = __('The profile has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Profiles', 'action' => 'index']);
                }else{
                    $response["message"] = ['error' => ['custom' => __('The profile could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $customer->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $fields = $this->Profiles->Fields->find('list', ['limit' => 200]);
        //$modules = $this->Profiles->Modules->find('list', ['limit' => 200]);
        $modules = $this->Profiles->Modules->find('all', [
            'contain' => ['Fields']
        ]);
        $roles = $this->Profiles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'fields', 'modules', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profiles()
    {
        $profiles = $this->paginate($this->Profiles);

        $this->set(compact('profiles'));
    }
}
