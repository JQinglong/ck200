<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Singers Controller
 *
 * @property \App\Model\Table\SingersTable $Singers
 */
class SingersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $singers = $this->paginate($this->Singers);

        $this->set(compact('singers'));
        $this->set('_serialize', ['singers']);
    }

    /**
     * View method
     *
     * @param string|null $id Singer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $singer = $this->Singers->get($id, [
            'contain' => ['Musics']
        ]);

        $this->set('singer', $singer);
        $this->set('_serialize', ['singer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $singer = $this->Singers->newEntity();
        if ($this->request->is('post')) {
            $singer = $this->Singers->patchEntity($singer, $this->request->data);
            if ($this->Singers->save($singer)) {
                $this->Flash->success(__('The singer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The singer could not be saved. Please, try again.'));
        }
        $this->set(compact('singer'));
        $this->set('_serialize', ['singer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Singer id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $singer = $this->Singers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $singer = $this->Singers->patchEntity($singer, $this->request->data);
            if ($this->Singers->save($singer)) {
                $this->Flash->success(__('The singer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The singer could not be saved. Please, try again.'));
        }
        $this->set(compact('singer'));
        $this->set('_serialize', ['singer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Singer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $singer = $this->Singers->get($id);
        if ($this->Singers->delete($singer)) {
            $this->Flash->success(__('The singer has been deleted.'));
        } else {
            $this->Flash->error(__('The singer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
