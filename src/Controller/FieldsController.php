<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\Rule\IsUnique;

/**
 * Fields Controller
 *
 * @property \App\Model\Table\FieldsTable $Fields
 *
 * @method \App\Model\Entity\Field[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modules']
        ];
        $fields = $this->paginate($this->Fields);

        $this->set(compact('fields'));
    }

    /**
     * View method
     *
     * @param string|null $id Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $field = $this->Fields->get($id, [
            'contain' => ['Modules', 'Profiles']
        ]);

        $this->set('field', $field);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $field = $this->Fields->newEntity();
        if ($this->request->is('post')) {
            $field = $this->Fields->patchEntity($field, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            //pr($field->getErrors());
            if(empty($field->getErrors())){
                if ($this->Fields->save($field)) {
                    $response["success"] = 1;
                    $response["message"] = __('The field has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Fields', 'action' => 'index']);
                 }else{
                        $response["message"] = ['error' => ['custom' => __('The field could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $field->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $modules = $this->Fields->Modules->find('list', ['limit' => 200]);
        $profiles = $this->Fields->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('field', 'modules', 'profiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $field = $this->Fields->get($id, [
            'contain' => ['Profiles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $field = $this->Fields->patchEntity($field, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            if(empty($field->getErrors())){
                if ($this->Fields->save($field)) {
                    $response["success"] = 1;
                    $response["message"] = __('The field has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Fields', 'action' => 'index']);
                 }else{
                        $response["message"] = ['error' => ['custom' => __('The field could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $field->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $modules = $this->Fields->Modules->find('list', ['limit' => 200]);
        $profiles = $this->Fields->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('field', 'modules', 'profiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $field = $this->Fields->get($id);
        if ($this->Fields->delete($field)) {
            $this->Flash->success(__('The field has been deleted.'));
        } else {
            $this->Flash->error(__('The field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
