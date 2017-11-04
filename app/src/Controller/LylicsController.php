<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lylics Controller
 *
 * @property \App\Model\Table\LylicsTable $Lylics
 */
class LylicsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Musics']
        ];
        $lylics = $this->paginate($this->Lylics);

        $this->set(compact('lylics'));
        $this->set('_serialize', ['lylics']);
    }

    /**
     * View method
     *
     * @param string|null $id Lylic id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lylic = $this->Lylics->get($id, [
            'contain' => ['Musics']
        ]);

        $this->set('lylic', $lylic);
        $this->set('_serialize', ['lylic']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lylic = $this->Lylics->newEntity();
        if ($this->request->is('post')) {
            $lylic = $this->Lylics->patchEntity($lylic, $this->request->data);
            if ($this->Lylics->save($lylic)) {
                $this->Flash->success(__('The lylic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lylic could not be saved. Please, try again.'));
        }
        $musics = $this->Lylics->Musics->find('list', ['limit' => 200]);
        $this->set(compact('lylic', 'musics'));
        $this->set('_serialize', ['lylic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lylic id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lylic = $this->Lylics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lylic = $this->Lylics->patchEntity($lylic, $this->request->data);
            if ($this->Lylics->save($lylic)) {
                $this->Flash->success(__('The lylic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lylic could not be saved. Please, try again.'));
        }
        $musics = $this->Lylics->Musics->find('list', ['limit' => 200]);
        $this->set(compact('lylic', 'musics'));
        $this->set('_serialize', ['lylic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lylic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lylic = $this->Lylics->get($id);
        if ($this->Lylics->delete($lylic)) {
            $this->Flash->success(__('The lylic has been deleted.'));
        } else {
            $this->Flash->error(__('The lylic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
