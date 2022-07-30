<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class LikesController extends AppController{

    public function add(){
        $like = $this->Likes->newEmptyEntity();
        $notif = $this->fetchTable("Notifications")->newEmptyEntity();
        if($this->request->is('post', 'put')){
            $data = $this->request->getData();
            $like = $this->Likes->patchEntity($like, $data);
            $like->id_user = $this->request->getAttribute('identity')->id;

            if ($this->Likes->save($like)) {
               
                if ($this->fetchTable("Posts")->findById($data['id_post'])->first()->id_user != $this->request->getAttribute('identity')->id) {
                    $notif->title = "Nouveau like";
                    $notif->content = "@".$this->request->getAttribute('identity')->pseudo . " a aimé votre post";
                    // recuperer l'id de l'utilsateur qui a poster le post en fonction de id_post pour le mettre dans la notification
                    $notif->id_user = $this->fetchTable("Posts")->findById($data['id_post'])->first()->id_user;
                    $notif->id_post = $data['id_post'];
                    $notif->type = 2 ;
                    if ($this->fetchTable("Notifications")->save($notif)){
                        $this->Flash->success('You liked this post');
                    }
                }
                $this->Flash->success('You are now liking this post');
            }else{
                $this->Flash->error('An error occured');
            }
        }
        $this->response = $this->response->withStringBody(json_encode([
            'success' => 'you like this post',
        ]));
        $this->response = $this->response->withType('json');
        return $this->response;
    }

    public function delete(){
        $unlike = $this->request->getData();
        $id = $unlike['id_post'];
        $unlike = $this->Likes->findById_userAndId_post($this->request->getAttribute('identity')->id, $id)->first();
        if($this->request->is('post', 'put')){
            if ($this->Likes->delete($unlike)) {
                $this->Flash->success('You are now unlike this post');
            }else{
                $this->Flash->error('An error occured');
            }
        }
        $this->response = $this->response->withStringBody(json_encode([
            'success' => 'you unlike this post',
        ]));
        $this->response = $this->response->withType('json');
        return $this->response;
    }

}