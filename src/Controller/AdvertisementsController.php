<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;


/**
 * Advertisements Controller
 *
 * @property \App\Model\Table\AdvertisementsTable $Advertisements
 *
 * @method \App\Model\Entity\Advertisement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdvertisementsController extends AppController
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
        $advertisements = $this->paginate($this->Advertisements);

        $this->set(compact('advertisements'));
    }

    /**
     * View method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advertisement = $this->Advertisements->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('advertisement', $advertisement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertisement = $this->Advertisements->newEntity();
        if ($this->request->is('post')) {            
            $this->request->data['active'] = (empty($this->request->getData('active')))? 0 : 1; 
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            $dimensions = $this->request->getData('dimensions');
            if (in_array($dimensions, ['200x200', '250x250', '300x250', '300x600', '336x280'])) {
                $validateDimensions = 'Dimensions' . $dimensions;
                $advertisement = $this->Advertisements->patchEntity($advertisement, $this->request->getData(), [
                    'validate' => $validateDimensions,
                ]);
                if(empty($advertisement->getErrors())){
                    if ($this->Advertisements->save($advertisement)) {
                        $response["success"] = 1;
                        $response["message"] = "Guardado con Éxito<br>" . __('The Advertisement has been saved.');
                        $response["redirectUrl"] = Router::url(['controller' => 'Advertisements', 'action' => 'advertisements']);
                        $response["modal"] = "#modalAdd";
                    }else{
                        $response["message"] = ['error' => ['custom' => __('The Advertisement could not be saved. Please, try again.')]];
                    }
                }else{
                    $response["message"] = $advertisement->getErrors();
                }
            } else {
                $response["message"] = __('La dimension seleccionada no es soportada por el sistema, seleccione una dimensión válida.');
            }
            echo json_encode($response);exit();
            $this->autoRender = false;

        }
        $customers = $this->Advertisements->Customers->find('list', ['limit' => 200]);
        $this->set(compact('advertisement', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advertisement = $this->Advertisements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {            
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            $dimensions = $this->request->getData('dimensions');
            if (in_array($dimensions, ['200x200', '250x250', '300x250', '300x600', '336x280'])) {
                $advertisement->active = (empty($this->request->getData('active')))? 0 : 1;
                $validateDimensions = 'Dimensions' . $dimensions;
                $advertisement = $this->Advertisements->patchEntity($advertisement, $this->request->getData(), [
                    'validate' => $validateDimensions,
                ]);
                //pr($advertisement);
                if(empty($advertisement->getErrors())){
                    if ($this->Advertisements->save($advertisement)) {
                        $response["success"] = 1;
                        $response["message"] = "Actualizado con Éxito<br>" . __('The Advertisement has been saved.');
                        $response["redirectUrl"] = Router::url(['controller' => 'Advertisements', 'action' => 'advertisements']);
                        $response["modal"] = "#modalEdit";
                    }else{
                        $response["message"] = ['error' => ['custom' => __('The Advertisement could not be saved. Please, try again.')]];
                    }
                }else{
                    $response["message"] = $advertisement->getErrors();
                }
            } else {
                $response["message"] = __('La dimension seleccionada no es soportada por el sistema, seleccione una dimensión válida.');
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $customers = $this->Advertisements->Customers->find('list', ['limit' => 200]);
        $this->set(compact('advertisement', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $response["success"] = 0;
        $response["redirectUrl"] = "";
        $response["modal"] = "";
        $advertisement = $this->Advertisements->get($id);
        if ($this->Advertisements->delete($advertisement)) {
            $response["success"] = 1;
            $response["message"] ="Eliminado con Éxito<br>" .  __('The Advertisement has been deleted.');
            $response["redirectUrl"] = Router::url(['controller' => 'Advertisements', 'action' => 'advertisements']);
            $response["modal"] = "#modalDelete";
        } else {
            $response["message"] = ['error' => ['custom' => __('The Advertisement could not be deleted. Please, try again.')]];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function remove($id = null)
    {
        $this->set('id', $id);
    }

    public function advertisements($txtSearch = null, $cboNumRegister = 10)
    {
        $conditions = [];
        if (!empty($txtSearch)) {
            $conditions = ['OR' => [
                ['Customers.name LIKE' => '%' . $txtSearch . '%'],
                ['Advertisements.name LIKE' => '%' . $txtSearch . '%'],
                ['Advertisements.dimensions LIKE' => '%' . $txtSearch . '%'],                
            ],
            //'AND' => ['Advertisements.active LIKE' => 1],
        ];
        }else{
            //$conditions = ['Advertisements.active' => 1];
        }
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Customers'],
            'limit' => $cboNumRegister,
            'maxLimit' => 100,
            'order' => ['Advertisements.id' => 'DESC']
        ];

        $advertisements = $this->paginate($this->Advertisements);
        
        $this->set(compact('advertisements'));
    }

    public function changestatus($id = null)
    {
        if (!empty($id)){
            $advertisement = $this->Advertisements->get($id);

            $advertisement->active = ($advertisement->active)? 0 : 1 ;
            if ($this->Advertisements->save($advertisement)) {
                $response["success"] = 1;
                $response["message"] ="Cambio de estado con Éxito";
                $response["redirectUrl"] = Router::url(['controller' => 'Advertisements', 'action' => 'advertisements']);
                $response["status"] = $advertisement->active;     
            } else {
                $response["message"] = ['error' => ['custom' => 'Error al desactivar el Anuncio']];
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
    }

}
