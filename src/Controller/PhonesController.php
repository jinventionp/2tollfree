<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Phones Controller
 *
 * @property \App\Model\Table\PhonesTable $Phones
 *
 * @method \App\Model\Entity\Phone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $phones = $this->paginate($this->Phones);

        $this->set(compact('phones'));
    }

    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phone = $this->Phones->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('phone', $phone);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phone = $this->Phones->newEntity();
        if ($this->request->is('post')) {
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            if(empty($phone->getErrors())){
                if ($this->Phones->save($phone)) {
                    $response["success"] = 1;
                    $response["message"] = __('The phone has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Phones', 'action' => 'phones']);
                    $response["modal"] = "#modalAdd";
                
                }else{
                    $response["message"] = ['error' => ['custom' => __('The phone could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $phone->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $customers = $this->Phones->Customers->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phone = $this->Phones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            if(empty($phone->getErrors())){
                if ($this->Phones->save($phone)) {
                    $response["success"] = 1;
                    $response["message"] = __('The phone has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Phones', 'action' => 'phones']);
                    $response["modal"] = "#modalEdit";
                
                }else{
                    $response["message"] = ['error' => ['custom' => __('The phone could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $phone->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $customers = $this->Phones->Customers->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $response["success"] = 0;
        $response["redirectUrl"] = "";
        $response["modal"] = "";

        $phone = $this->Phones->get($id);
        $phone->status = 0;
        if ($this->Phones->delete($phone)) {
            $response["success"] = 1;
            $response["message"] ="Eliminado con Éxito<br>" .  __('The phone has been deleted.');
            $response["redirectUrl"] = Router::url(['controller' => 'Phones', 'action' => 'phones']);
            $response["modal"] = "#modalDelete";
        } else {
            $response["message"] = ['error' => ['custom' => __('The customer could not be deleted. Please, try again.')]];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function phones($txtSearch = null, $cboNumRegister = 10)
    {
        $conditions = [];
        if (!empty($txtSearch)) {
            $conditions = ['OR' => [
                ['Phones.name LIKE' => '%' . $txtSearch . '%'],               
            ],
            //'AND' => ['Phones.status' => 1],
        ];
        }else{
            //$conditions = ['Phones.status' => 1];
        }

        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Customers'],
            'limit' => $cboNumRegister,
            'maxLimit' => 100,
            'order' => ['Phones.id' => 'DESC']
        ];
        $phones = $this->paginate($this->Phones);

        $this->set(compact('phones'));

    }
}
