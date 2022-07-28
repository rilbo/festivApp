<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class CommentsController extends AppController{

    public function view($idPost){
        $comments = $this->Comments->find('all', [
            'where' => ['Comments.id_post' => $idPost],
            'contain' => ['Users'],
        ]);
        $this->set(compact('comments', 'idPost'));

    }

    public function add($idPost){
        $comment = $this->Comments->newEmptyEntity();
        if($this->request->is('post', 'put')){
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $comment->id_post = $idPost;
            $comment->id_user = $this->request->getAttribute('identity')->id;
            if($this->Comments->save($comment)){
                $this->Flash->success(__('Votre commentaire a été sauvegardé.'));
                return $this->redirect(['controller' => 'Comments', 'action' => 'view', $idPost]);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre commentaire.'));
        }
        $this->set('comment', $comment);
    }

}