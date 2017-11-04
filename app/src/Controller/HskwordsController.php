<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hskwords Controller
 *
 * @property \App\Model\Table\HskwordsTable $Hskwords
 */
class HskwordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hskwords = $this->paginate($this->Hskwords);

        $this->set(compact('hskwords'));
        $this->set('_serialize', ['hskwords']);
    }

    /**
     * View method
     *
     * @param string|null $id Hskword id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hskword = $this->Hskwords->get($id, [
            'contain' => []
        ]);

        $this->set('hskword', $hskword);
        $this->set('_serialize', ['hskword']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hskword = $this->Hskwords->newEntity();
        if ($this->request->is('post')) {
            $hskword = $this->Hskwords->patchEntity($hskword, $this->request->data);
            if ($this->Hskwords->save($hskword)) {
                $this->Flash->success(__('The hskword has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hskword could not be saved. Please, try again.'));
        }
        $this->set(compact('hskword'));
        $this->set('_serialize', ['hskword']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hskword id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hskword = $this->Hskwords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hskword = $this->Hskwords->patchEntity($hskword, $this->request->data);
            if ($this->Hskwords->save($hskword)) {
                $this->Flash->success(__('The hskword has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hskword could not be saved. Please, try again.'));
        }
        $this->set(compact('hskword'));
        $this->set('_serialize', ['hskword']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hskword id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hskword = $this->Hskwords->get($id);
        if ($this->Hskwords->delete($hskword)) {
            $this->Flash->success(__('The hskword has been deleted.'));
        } else {
            $this->Flash->error(__('The hskword could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
