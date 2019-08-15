<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Audios Controller
 *
 * @property \App\Model\Table\AudiosTable $Audios
 *
 * @method \App\Model\Entity\Audio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AudiosController extends AppController
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
        $audios = $this->paginate($this->Audios);

        $this->set(compact('audios'));
    }

    /**
     * View method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $audio = $this->Audios->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('audio', $audio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $audio = $this->Audios->newEntity();
        if ($this->request->is('post')) {
            $audio = $this->Audios->patchEntity($audio, $this->request->getData());
            if ($this->Audios->save($audio)) {
                $this->Flash->success(__('The audio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audio could not be saved. Please, try again.'));
        }
        $customers = $this->Audios->Customers->find('list', ['limit' => 200]);
        $this->set(compact('audio', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $audio = $this->Audios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $audio = $this->Audios->patchEntity($audio, $this->request->getData());
            if ($this->Audios->save($audio)) {
                $this->Flash->success(__('The audio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audio could not be saved. Please, try again.'));
        }
        $customers = $this->Audios->Customers->find('list', ['limit' => 200]);
        $this->set(compact('audio', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Audio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $audio = $this->Audios->get($id);
        if ($this->Audios->delete($audio)) {
            $this->Flash->success(__('The audio has been deleted.'));
        } else {
            $this->Flash->error(__('The audio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
