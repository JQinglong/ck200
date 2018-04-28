<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Musics Controller
 *
 * @property \App\Model\Table\MusicsTable $Musics
 */
class MusicsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Singers']
        ];
        $musics = $this->paginate($this->Musics);

        $this->set(compact('musics'));
        $this->set('_serialize', ['musics']);
    }

    /**
     * View method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $music = $this->Musics->get($id, [
            'contain' => ['Singers', 'Lylics', 'MusicHskcounts']
        ]);

        $this->set('music', $music);
        $this->set('_serialize', ['music']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $music = $this->Musics->newEntity();
        if ($this->request->is('post')) {
            $music = $this->Musics->patchEntity($music, $this->request->data);
            if ($this->Musics->save($music)) {
                $this->Flash->success(__('The music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music could not be saved. Please, try again.'));
        }
        $singers = $this->Musics->Singers->find('list', ['limit' => 200]);
        $this->set(compact('music', 'singers'));
        $this->set('_serialize', ['music']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $music = $this->Musics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $music = $this->Musics->patchEntity($music, $this->request->data);
            
            //自動計算項目のセット
            $replacedLylicstr = str_replace(array("\r\n", "\n", "\r"), '', $music->lylicstr);
            $music->cnt_lylics = mb_strlen ($replacedLylicstr);
            $music->cnt_dist = count(array_unique(preg_split("//u", $replacedLylicstr, -1, PREG_SPLIT_NO_EMPTY))) ;
            
            if ($this->Musics->save($music)) {
                $this->Flash->success(__('The music has been saved.'));

                //lylicsも更新(DEL-INS)
                //DEL
                $this->loadModel('Lylics');
                $this->Lylics->deleteAll([
                                'music_id' => $id
                            ]);
                //INS
                $i = 0;
                foreach(preg_split("//u", $replacedLylicstr, -1, PREG_SPLIT_NO_EMPTY) as $value){
                    $lylic = $this->Lylics->newEntity();
                    $lylic->music_id = $id;
                    $lylic->ord = $i;
                    $lylic->lylics = $value;

                    if ($this->Lylics->save($lylic)) {
                        //$this->Flash->success(__('The lylic has been saved.'));
                    }
                    $i++;
                }
                //lylics更新End
                
                //music_hskcountsも更新
                //DEL
                $this->loadModel('MusicHskcounts');
                $this->MusicHskcounts->deleteAll([
                                'music_id' => $id
                            ]);
                //INS
                $query  = "INSERT INTO music_hskcounts 
                    (music_id, level, cnt_lylics, cnt_dist)
                    select lylics.music_id,hskwords.level,count(lylics),count(distinct lylics)
                    from lylics
                    inner join hskwords
                    on hskwords.word = lylics.lylics
                    and lylics.music_id = ?
                    group by lylics.music_id,hskwords.level
                     ";
                $conn = ConnectionManager::get('default');
                //$result = $conn->execute($query,$id);
                if (!$conn->execute($query,[$id])) {
                    $this->Flash->error(__('The music_hskcounts could not be saved. Please, try again.'));
                } else {
                    $this->Flash->success(__('The music_hskcounts has been saved.'));
                }
                //$result = $this->MusicHskcounts->query($query, $id, false);//cake2
                //music_hskcounts更新End



                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music could not be saved. Please, try again.'));
            

            
        }

        //プルダウンに名称を表示するように変更
        //$singers = $this->Musics->Singers->find('list', ['limit' => 200]);

        $singersQuery = $this->Musics->Singers->find();
        $singersResults = $singersQuery
            ->select(['id', 'singer_nm'])
            ->combine('id', 'singer_nm')
            ->toArray();
        //$this->set(compact('music', 'singers'));
        $this->set(compact('music', 'singersResults'));

        $this->set('_serialize', ['music']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $music = $this->Musics->get($id);
        if ($this->Musics->delete($music)) {
            $this->Flash->success(__('The music has been deleted.'));
        } else {
            $this->Flash->error(__('The music could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
