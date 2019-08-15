<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FieldsProfiles Controller
 *
 * @property \App\Model\Table\FieldsProfilesTable $FieldsProfiles
 *
 * @method \App\Model\Entity\FieldsProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FieldsProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profiles', 'Fields']
        ];
        $fieldsProfiles = $this->paginate($this->FieldsProfiles);

        $this->set(compact('fieldsProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Fields Profile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fieldsProfile = $this->FieldsProfiles->get($id, [
            'contain' => ['Profiles', 'Fields']
        ]);

        $this->set('fieldsProfile', $fieldsProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fieldsProfile = $this->FieldsProfiles->newEntity();
        if ($this->request->is('post')) {
            $fieldsProfile = $this->FieldsProfiles->patchEntity($fieldsProfile, $this->request->getData());
            if ($this->FieldsProfiles->save($fieldsProfile)) {
                $this->Flash->success(__('The fields profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fields profile could not be saved. Please, try again.'));
        }
        $profiles = $this->FieldsProfiles->Profiles->find('list', ['limit' => 200]);
        $fields = $this->FieldsProfiles->Fields->find('list', ['limit' => 200]);
        $this->set(compact('fieldsProfile', 'profiles', 'fields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fields Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fieldsProfile = $this->FieldsProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fieldsProfile = $this->FieldsProfiles->patchEntity($fieldsProfile, $this->request->getData());
            if ($this->FieldsProfiles->save($fieldsProfile)) {
                $this->Flash->success(__('The fields profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fields profile could not be saved. Please, try again.'));
        }
        $profiles = $this->FieldsProfiles->Profiles->find('list', ['limit' => 200]);
        $fields = $this->FieldsProfiles->Fields->find('list', ['limit' => 200]);
        $this->set(compact('fieldsProfile', 'profiles', 'fields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fields Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fieldsProfile = $this->FieldsProfiles->get($id);
        if ($this->FieldsProfiles->delete($fieldsProfile)) {
            $this->Flash->success(__('The fields profile has been deleted.'));
        } else {
            $this->Flash->error(__('The fields profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
