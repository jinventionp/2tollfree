<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProfilesRoles Controller
 *
 * @property \App\Model\Table\ProfilesRolesTable $ProfilesRoles
 *
 * @method \App\Model\Entity\ProfilesRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilesRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Profiles']
        ];
        $profilesRoles = $this->paginate($this->ProfilesRoles);

        $this->set(compact('profilesRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Profiles Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profilesRole = $this->ProfilesRoles->get($id, [
            'contain' => ['Roles', 'Profiles']
        ]);

        $this->set('profilesRole', $profilesRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profilesRole = $this->ProfilesRoles->newEntity();
        if ($this->request->is('post')) {
            $profilesRole = $this->ProfilesRoles->patchEntity($profilesRole, $this->request->getData());
            if ($this->ProfilesRoles->save($profilesRole)) {
                $this->Flash->success(__('The profiles role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profiles role could not be saved. Please, try again.'));
        }
        $roles = $this->ProfilesRoles->Roles->find('list', ['limit' => 200]);
        $profiles = $this->ProfilesRoles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('profilesRole', 'roles', 'profiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profiles Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profilesRole = $this->ProfilesRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profilesRole = $this->ProfilesRoles->patchEntity($profilesRole, $this->request->getData());
            if ($this->ProfilesRoles->save($profilesRole)) {
                $this->Flash->success(__('The profiles role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profiles role could not be saved. Please, try again.'));
        }
        $roles = $this->ProfilesRoles->Roles->find('list', ['limit' => 200]);
        $profiles = $this->ProfilesRoles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('profilesRole', 'roles', 'profiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profiles Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profilesRole = $this->ProfilesRoles->get($id);
        if ($this->ProfilesRoles->delete($profilesRole)) {
            $this->Flash->success(__('The profiles role has been deleted.'));
        } else {
            $this->Flash->error(__('The profiles role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
