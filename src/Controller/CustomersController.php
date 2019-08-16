<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    private $urls = [];
    private $urlsChart = []; 

    public function initialize()
    {
        parent::initialize();

        /*$this->loadComponent('RequestHandler', [
            'viewClassMap' => ['csv' => 'CsvView.Csv'
        ]]);*/

        //Urls Generate Code Call
        $this->urls = [
            "urlCustomers" => Router::url(['action' => 'getcustomers']),
            "urlAdvertisements" => Router::url(['action' => 'getadvertisements']),
            "urlPhones" => Router::url(['action' => 'getphones']),
            "urlAudios" => Router::url(['action' => 'getaudios']),
            "fullbaseUrl" => Router::fullbaseUrl(),
            "urlAds" => Router::url(['action' => 'ads']),
            "urlViewCodeAds" => Router::url(['action' => 'viewcodeads']),
            "urlCustomersIndex" => Router::url(['action' => 'index']),            
        ];
        //Urls Generate Chart Reports
        $this->urlsChart = [
            "urlCustomers" => Router::url(['action' => 'getcustomers']),
            "urlCustomersIndex" => Router::url(['action' => 'index']),
            "urlCustomersDashboard" => Router::url(['action' => 'dashboardchart']),
        ];


        $this->Auth->allow(['ads']);
    }


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
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Users', 'Audios', 'Images', 'Phones']
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['active'] = (empty($this->request->getData('active')))? 0 : 1;
            $this->request->data['sponsor'] = (empty($this->request->getData('sponsor')))? 0 : 1;
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            if(empty($customer->getErrors())){
                if ($this->Customers->save($customer)) {
                    $response["success"] = 1;
                    $response["message"] = __('The customer has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Customers', 'action' => 'customers']);
                    $response["modal"] = "#modalAdd";
                }else{
                        $response["message"] = ['error' => ['custom' => __('The customer could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $customer->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer->active = (empty($this->request->getData('active')))? 0 : 1;
            $customer->sponsor = (empty($this->request->getData('sponsor')))? 0 : 1;
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            $response["success"] = 0;
            $response["redirectUrl"] = "";
            $response["modal"] = "";
            if(empty($customer->getErrors())){
                if ($this->Customers->save($customer)) {
                    $response["success"] = 1;
                    $response["message"] = __('The customer has been saved.');
                    $response["redirectUrl"] = Router::url(['controller' => 'Customers', 'action' => 'customers']);
                    $response["modal"] = "#modalEdit";
                }else{
                    $response["message"] = ['error' => ['custom' => __('The customer could not be saved. Please, try again.')]];
                }
            }else{
                $response["message"] = $customer->getErrors();
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
        //pr($customer);
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $response["success"] = 0;
        $response["redirectUrl"] = "";
        $response["modal"] = "";

        $customer = $this->Customers->get($id);
        $customer->status = 0;
        if ($this->Customers->save($customer)) {
            $response["success"] = 1;
            $response["message"] ="Eliminado con Éxito<br>" .  __('The customer has been deleted.');
            $response["redirectUrl"] = Router::url(['controller' => 'Customers', 'action' => 'customers']);
            $response["modal"] = "#modalDelete";
        } else {
            $response["message"] = ['error' => ['custom' => __('The customer could not be deleted. Please, try again.')]];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function remove($id = null)
    {
        $this->set('id', $id);
    }

    public function customers($txtSearch = null, $cboNumRegister = 10)
    {
        $conditions = [];
        if (!empty($txtSearch)) {
            $conditions = ['OR' => [
                ['Customers.name LIKE' => '%' . $txtSearch . '%'],
                ['Customers.email LIKE' => '%' . $txtSearch . '%'],
                ['Customers.website LIKE' => '%' . $txtSearch . '%'],                
            ],
            //'AND' => ['Customers.status' => 1],
        ];
        }else{
            //$conditions = ['Customers.status' => 1];
        }

        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Users'],
            'limit' => $cboNumRegister,
            'maxLimit' => 100,
            'order' => ['Customers.id' => 'DESC']
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));

    }

    public function dashboard($customer_id = null, $dateStart = null, $dateEnd = null, $export = 0)
    {
        //echo date('Y-m-d h:i:s');
        /*
        $user_id = $this->currentUser['id'];
        if(in_array($user_id, [1])){
            $customers = $this->Customers->find('list', [                
                'limit' => 4
            ])->toArray();
        }else{
            $customers = $this->Customers->find('list', [
                'conditions' => ['Customers.user_id >' => $user_id],
                'limit' => 4
            ])->toArray();
        }
        
        $this->set(compact('customers'));*/
        //$this->set('urls', json_encode($this->urls));
        //
        
        $user_id = $this->currentUser['id'];
        if(in_array($user_id, [1])){
            $customers = $this->Customers->find('list', [                
                'limit' => 4
            ])->toArray();
        }else{
            $customers = $this->Customers->find('list', [
                'conditions' => ['Customers.user_id >' => $user_id],
                'limit' => 4
            ])->toArray();
        }
        
        $this->set(compact('customers'));
        $this->set('dateStart', date("Y-m-d"));
        $this->set('dateEnd', date("Y-m-d",strtotime(date("Y-m-d")."- 1 month")));
        $this->set('urlsChart', json_encode($this->urlsChart));
    }

    public function dashboardchart($id = null, $dateStart = null, $dateEnd = null, $exportFile = 0)
    {
            $text        = date('d \d\e M Y');
            $subtitle   =   "Fecha desde ".$dateStart." a ".$dateEnd;
            $itmes      = [];
            $series      = [];
            $dateCurrent = date("Y-m-d");
            if (!empty($id)) {
                $customer = $this->Customers->get($id, [
                    'contain' => ['Phones']
                ]);
                $llamada   = TableRegistry::get('Llamadas');                

                if ($dateStart == $dateCurrent && $dateEnd == $dateCurrent) {

                }else{
                    $begin = new \DateTime($dateStart);
                    $end   = new \DateTime($dateEnd);
                    $loadCategories = [];
                    $loadNumCallDay = [];
                    if(!$exportFile){
                        for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
                            $loadCategories[] = $i->format("j M y");
                            $loadNumCallDay[] = 0;
                        }
                        foreach ($customer->phones as $phone) {
                            $categories = $loadCategories;
                            $numCallDay = $loadNumCallDay;
                            $queryCalls = $llamada->find()
                                ->select(['Llamadas.customerId', 'Llamadas.phoneA', 'Llamadas.phoneB', 'Llamadas.dateCall', 'Llamadas.duration', 'numCallDay' => 'COUNT(DATE(Llamadas.dateCall))'])
                                ->where(['Llamadas.customerId' => $id, 'Llamadas.phoneId' => $phone->id])
                                ->andWhere(function ($exp, $q) use ($dateStart, $dateEnd) {
                                    return $exp->between('DATE(Llamadas.dateCall)', $dateStart, $dateEnd);
                                })
                                ->group(['DAY(Llamadas.dateCall)'])
                                ->order(['DATE(Llamadas.dateCall)' => 'ASC']);

                            if ($queryCalls->count() > 0) {
                                foreach ($queryCalls as $queryCall) {
                                    $keyValue              = array_search($queryCall->dateCall->format("j M y"), $categories);
                                    $numCallDay[$keyValue] = (int) $queryCall->numCallDay;
                                }
                                $items[] = ['name' => $phone->name, 'data' => $numCallDay, 'color' => '#00E3D0'];
                            } else {
                                $items[] = array('name' => $phone->name, 'data' => $numCallDay);
                            }
                        }
                        $series = $items;
                        //pr($series);
                        $calls = [
                            'text'       => $text,
                            'subtitle'  => $subtitle,
                            'categories' => $categories,
                            'series'     => $series,
                        ];
                        echo json_encode($calls);
                        $this->autoRender = false;
                    }else{
                        $queryCalls = $llamada->find()
                                ->select(['Llamadas.customerId', 'Llamadas.phoneA', 'Llamadas.phoneB', 'Llamadas.dateCall', 'Llamadas.duration'])
                                ->where(['Llamadas.customerId' => $id])
                                ->andWhere(function ($exp, $q) use ($dateStart, $dateEnd) {
                                    return $exp->between('DATE(Llamadas.dateCall)', $dateStart, $dateEnd);
                                })
                                //->group(['DAY(Llamadas.dateCall)'])
                                ->order(['DATE(Llamadas.dateCall)' => 'ASC']);
                        if ($queryCalls->count() > 0) {

                            foreach ($queryCalls as $queryCall) {
                                $data[] = [
                                    $queryCall->dateCall,
                                    $queryCall->hour,
                                    $queryCall->phoneA,
                                    $queryCall->phoneB,
                                    $queryCall->duration * 2,
                                ];
                            }
                            //pr($data)
                        }
                        $_header    = ['Fecha Llamada', 'Hora Llamada', 'Origen', 'Destino', 'Duracion'];
                        $_serialize = 'data';
                        $nameFile   = strtolower(str_replace(' ', '-', $customer->name)) . '_' . $dateStart . '_' . $dateEnd . '_' . date("Y-m-d");
                        //$this->response->download($nameFile . '.csv'); // <= setting the file name
                        //$this->viewBuilder()->className('CsvView.Csv');
                        $this->setResponse($this->getResponse()->withDownload($nameFile . '.csv'));
                        $this->viewBuilder()->setClassName('CsvView.Csv');
                        $this->set(compact('data', '_serialize', '_header'));

                    }
                }
            }else{
                
            }
        
    }

    public function changestatus($id = null)
    {
        if (!empty($id)){
            $customer = $this->Customers->get($id);

            $customer->active = ($customer->active)? 0 : 1 ;
            if ($this->Customers->save($customer)) {
                $response["success"] = 1;
                $response["message"] ="Cambio de estado con Éxito";
                $response["redirectUrl"] = Router::url(['controller' => 'Customers', 'action' => 'customers']);
                $response["status"] = $customer->active;     
            } else {
                $response["message"] = ['error' => ['custom' => 'Error al desactivar el Anuncio']];
            }
            echo json_encode($response);
            $this->autoRender = false;
        }
    }

    public function viewcodeads($customerId = null, $adsId = null, $phoneId = null, $audioId = null)
    {
        $customer = $this->Customers->get($customerId, [
            'contain' => [
                'Advertisements' => [
                    'conditions' => ['Advertisements.id' => $adsId]
                ], 
                'Phones' => [
                    'conditions' => ['Phones.id' => $phoneId]
                ], 
                'Audios' => [
                    'conditions' => ['Audios.id' => $audioId]
                ],
            ]
        ]);
        //$urls = json_encode($this->urls, JSON_FORCE_OBJECT);
        //pr($urls);
        $this->set(compact('customer'));
        $this->set('urls', $this->urls);
    }

    public function ads($customerId = null, $adsId = null, $phoneId = null, $audioId = null)
    {
        $this->viewBuilder()->setLayout('ads');

        $customer = $this->Customers->get($customerId, [
            'contain' => [
                'Phones' => ['conditions' => ['Phones.id' => $phoneId]], 
                'Advertisements'  => ['conditions' => ['Advertisements.id' => $adsId]], 
                'Audios'  => ['conditions' => ['Audios.id' => $audioId]]]
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(trim($this->request->getData('customerId')) == $customerId){
                $weekDays = ['lu', 'ma', 'mi', 'ju', 'vi', 'sa', 'do'];

                $customerId = trim($this->request->getData('customerId'));
                $phoneId    = trim($this->request->getData('phoneId'));
                $adsId    = trim($this->request->getData('adsId'));
                $audioId    = trim($this->request->getData('audioId'));
                $dial_code  = trim($this->request->getData('dial_code'));
                $phone   = trim($this->request->getData('phone'));

                $customer = $this->Customers->get($customerId, [
                    'contain' => [
                        'Phones' => ['conditions' => ['Phones.id' => $phoneId]], 
                        'Advertisements'  => ['conditions' => ['Advertisements.id' => $adsId]], 
                        'Audios'  => ['conditions' => ['Audios.id' => $audioId]]]
                ]);
                $nameAudio = (!empty($customer->audio)) ? $customer->audio[0]->name : 'llamegratis.gsm';

                $opening_days = json_decode($customer->opening_days, true);
                if($opening_days[$weekDays[date('N', strtotime(date('Y-m-d'))) - 1]] == 1){ //'2019-07-20'
                    $url = 'http://18.218.79.110/click2call/server.php/?codeCountryA=' . $dial_code . '&phoneA=' . $phone . '&codeCountryB=' . $customer->phones[0]->dial_code . '&phoneB=' . $customer->phones[0]->name . '&phoneId=' . $phoneId . '&customerId=' . $customerId . '&audio=' . $nameAudio. '&token=50a9c6e91bd71e6a217081aa9c29f766';

                    //echo $url;
                    $pageResponse = file_get_contents($url);
                    echo $pageResponse;

                }else{
                    echo "Día no autorizado para ejecutar llamadas";
                }                
                //echo json_encode($response);
                $this->autoRender = false;
            }
        }
        
        $this->set(compact('customer'));
    }

    public function generatecode()
    {   
        $user_id = $this->currentUser['id'];
        if(in_array($user_id, [1])){
            $customers = $this->Customers->find('list', [                
                'limit' => 4
            ])->toArray();
        }else{
            $customers = $this->Customers->find('list', [
                'conditions' => ['Customers.user_id >' => $user_id],
                'limit' => 4
            ])->toArray();
        }
        
        $this->set(compact('customers'));
        $this->set('urls', json_encode($this->urls));
    }

    public function getcustomers()
    {
        $txtsearch = '';
        if (!empty($_GET['q'])) {
            $txtsearch = trim($_GET['q']);
        }

        

        $user_id = $this->currentUser['id'];
        $customers = $this->Customers->find()
                    ->select(['id', 'name'])
                    //->where(['Articles.created >' => new DateTime('-10 days')])
                    //->contain(['Comments', 'Authors'])
                    ->limit(4);

        $response = [];
        foreach ($customers as $customer) {
            $response[] = ['id' => $customer->id, 'text' => $customer->name];
        }

        echo json_encode($response);
        $this->autoRender = false;

    }

    public function getadvertisements($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Advertisements'],
        ]);

        $response = [];
        foreach ($customer->advertisements as $advertisement) {
            $response[] = ['id' => $advertisement->id, 'value' => $advertisement->dimensions.'-'.$advertisement->name];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function getphones($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Phones'],
        ]);

        $response = [];
        foreach ($customer->phones as $phone) {
            $response[] = ['id' => $phone->id, 'value' => $phone->name];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

    public function getaudios($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Audios'],
        ]);

        $response = [];
        foreach ($customer->audios as $audio) {
            $response[] = ['id' => $audio->id, 'value' => $audio->name];
        }
        echo json_encode($response);
        $this->autoRender = false;
    }

}
