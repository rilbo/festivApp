<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class FestivalsController extends AppController{

    public function index(){
        $festivals = $this->Festivals->find('all');
        $this->set(compact('festivals'));
    }

    public function add(){
        if ($this->request->getAttribute('identity')->admin == 1){
            $festival = $this->Festivals->newEmptyEntity();
            if ($this->request->is('post', 'put')) {
                $festival = $this->Festivals->patchEntity($festival, $this->request->getData());
                
                $title = $this->request->getData('title');
                $ext = pathinfo($this->request->getData('image')->getClientFilename(), PATHINFO_EXTENSION);
                $name = $title.'-'.time().'.'.$ext;
                $oldname = $festival->picture;
                $festival->picture = $name;

                // Personne connecté id

                $festival->id_user = $this->request->getAttribute('identity')->id;
                
                if ($this->Festivals->save($festival)) {
                    if(!empty($oldname) && file_exists(WWW_ROOT.'img/pictures/festivals/'.$oldname)){
                        unlink(WWW_ROOT.'img/pictures/festivals/'.$oldname);
                    }

                    $this->request->getData('image')->moveTo(WWW_ROOT.'img/pictures/festivals/'.$name);

                    $this->Flash->success(__('The festival has been saved.'));
                    return $this->redirect(['controller'=>'Posts', 'action' => 'index']);
                }
                $this->Flash->error(__('Unable to add the festival.'));
            }
            $this->set('festival', $festival);
        }else{
            $this->Flash->error(__('You are not authorized to add a festival.'));
            return $this->redirect(['controller'=>'Posts', 'action' => 'index']);
        }
    }

    public function edit($id){
        if ($this->request->getAttribute('identity')->admin == 1){
            $festival = $this->Festivals->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $festival = $this->Festivals->patchEntity($festival, $this->request->getData());
                
                $title = $this->request->getData('title');
                // remplace les espaces par des -
                $title = str_replace(' ', '-', $title);
                //minuscule
                $title = strtolower($title);
                $ext = pathinfo($this->request->getData('image')->getClientFilename(), PATHINFO_EXTENSION);
                $name = $title.'-'.time().'.'.$ext;
                $oldname = $festival->picture;
                $festival->picture = $name;

                // ajouter 1 à la valeur de la colonne "finish" de la table requests pour dire que le festival a été ajouté
                $request = $this->fetchTable('Requests')->find('all')->where(['id_festival' => $id])->first();
                $request->finish = 1;
                $this->fetchTable('Requests')->save($request);

                // Personne connecté id

                $festival->id_user = $this->request->getAttribute('identity')->id;
                
                if ($this->Festivals->save($festival)) {
                    if(!empty($oldname) && file_exists(WWW_ROOT.'img/pictures/festivals/'.$oldname)){
                        unlink(WWW_ROOT.'img/pictures/festivals/'.$oldname);
                    }

                    $this->request->getData('image')->moveTo(WWW_ROOT.'img/pictures/festivals/'.$name);

                    $this->Flash->success(__('The festival has been saved.'));
                    return $this->redirect(['controller'=>'Posts', 'action' => 'index']);
                }
                $this->Flash->error(__('Unable to add the festival.'));
            }
            $this->set('festival', $festival);
        }else{
            $this->Flash->error(__('You are not authorized to add a festival.'));
            return $this->redirect(['controller'=>'Posts', 'action' => 'index']);
        }
    }
}