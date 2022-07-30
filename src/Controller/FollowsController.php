<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class FollowsController extends AppController{

    public function add(){

        $follow = $this->Follows->newEmptyEntity();
        if($this->request->is('post', 'put')){
            // si l'utilisateur connecté est déjà abonnée à cet utilisateur
            $data = $this->request->getData();
            $follows = $this->Follows->findById_userAndId_user_following($this->request->getAttribute('identity')->id, $data['id_user_following'])->first();
            if ($follows != null) {
                $this->Flash->error('Vous êtes déjà abonné à cet utilisateur');
            }else{
                $follow = $this->Follows->patchEntity($follow, $this->request->getData());
                $follow->id_user = $this->request->getAttribute('identity')->id;
                $notif = $this->fetchTable("Notifications")->newEmptyEntity();
                if ($this->Follows->save($follow)) {
                    $notif->title = "Nouvel abonné";
                    $notif->content = "@".$this->request->getAttribute('identity')->pseudo." s'est abonné à vous";
                    $notif->id_user = $this->request->getAttribute('identity')->id;
                    $notif->id_user_receiver = $data['id_user_following'];
                    $notif->id_post = null;
                    $notif->type = 1 ;
                    $this->fetchTable("Notifications")->save($notif);
                    $this->Flash->success('You are now following this user');
                }else{
                    $this->Flash->error('An error occured');
                }
            }
        }
        $this->response = $this->response->withStringBody(json_encode([
            'success' => 'you follow this user',
        ]));
        $this->response = $this->response->withType('json');
        // $this->set(compact('follow'));
        return $this->response;
    }

    public function delete(){
        $unfollow = $this->request->getData();
        $id = $unfollow['id_user_following'];
        $unfollow = $this->Follows->findById_userAndId_user_following($this->request->getAttribute('identity')->id, $id)->first();
        if($this->request->is('post', 'put')){
            if ($this->Follows->delete($unfollow)) {
                $this->Flash->success('You are now unfollowing this user');
            }else{
                $this->Flash->error('An error occured');
            }
        }
        $this->response = $this->response->withStringBody(json_encode([
            'success' => 'you unfollow this user',
        ]));
        $this->response = $this->response->withType('json');
        // $this->set(compact('follow'));
        return $this->response;
    }
}