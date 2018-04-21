<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MusicHskcounts Controller
 *
 * @property \App\Model\Table\MusicHskcountsTable $MusicHskcounts
 */
class MusicHskcountsController extends AppController
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
        $musicHskcounts = $this->paginate($this->MusicHskcounts);

        $this->set(compact('musicHskcounts'));
        $this->set('_serialize', ['musicHskcounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Music Hskcount id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $musicHskcount = $this->MusicHskcounts->get($id, [
            'contain' => ['Musics']
        ]);

        $this->set('musicHskcount', $musicHskcount);
        $this->set('_serialize', ['musicHskcount']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $musicHskcount = $this->MusicHskcounts->newEntity();
        if ($this->request->is('post')) {
            $musicHskcount = $this->MusicHskcounts->patchEntity($musicHskcount, $this->request->data);
            if ($this->MusicHskcounts->save($musicHskcount)) {
                $this->Flash->success(__('The music hskcount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music hskcount could not be saved. Please, try again.'));
        }
        $musics = $this->MusicHskcounts->Musics->find('list', ['limit' => 200]);
        $this->set(compact('musicHskcount', 'musics'));
        $this->set('_serialize', ['musicHskcount']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Music Hskcount id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $musicHskcount = $this->MusicHskcounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $musicHskcount = $this->MusicHskcounts->patchEntity($musicHskcount, $this->request->data);
            if ($this->MusicHskcounts->save($musicHskcount)) {
                $this->Flash->success(__('The music hskcount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music hskcount could not be saved. Please, try again.'));
        }
        $musics = $this->MusicHskcounts->Musics->find('list', ['limit' => 200]);
        $this->set(compact('musicHskcount', 'musics'));
        $this->set('_serialize', ['musicHskcount']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Music Hskcount id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $musicHskcount = $this->MusicHskcounts->get($id);
        if ($this->MusicHskcounts->delete($musicHskcount)) {
            $this->Flash->success(__('The music hskcount has been deleted.'));
        } else {
            $this->Flash->error(__('The music hskcount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
