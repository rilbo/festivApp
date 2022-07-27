<?php

namespace App\Controller;
use Cake\Event\EventInterface;

class PostsController extends AppController{

    public function index(){
        $posts = $this->Posts->find('all', [
            'contain' => ['Users', 'Festivals', 'Likes']
        ]);
        $this->set(compact('posts'));
    } 

    public function add(){
        $post = $this->Posts->newEmptyEntity();
       
        $festivals = $this->Posts->Festivals->find('all', ['limit' => 200]);
        $pseudo = $this->request->getAttribute('identity')->pseudo;

        // gerer un tableau d'images
        if ($this->request->is('post', 'put')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            // boucle sur les images pour les ajouter dans le dossier
            $images = $this->request->getData('images');
            // convertir $image en tableau
            $imagesName = "";
            $count = 0;
            
            
            foreach ($images as $image) {
                $count++;
                $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);
                $name = $pseudo.'-'.time().$count.'.'.$ext;
                $image->moveTo(WWW_ROOT.'img/pictures/posts/'.$name);
                if ($count == 1) {
                    $imagesName .= $name;
                } else {
                    $imagesName .= ','.$name;
                }
            }
            // convertir le tableau d'images en chaine de caractères
            $post->pictures = $imagesName;

            $post->id_user = $this->request->getAttribute('identity')->id;
            // gerer les checkbox

            $value = $this->request->getData('id_festival');
            if ($value == 'new') {
                $festival = $this->Posts->Festivals->newEmptyEntity();
                $festival->title = $this->request->getData('titleF');
                $festival->id_user = $this->request->getAttribute('identity')->id;
                if($this->Posts->Festivals->save($festival)){
                    $post->id_festival = $festival->id;
                    $request = $this->fetchTable('requests')->newEmptyEntity();
                    // créer une request pour le festival
                    $request->title = $festival->title;
                    $request->content  = "Un festival qui n'existait pas a été créé avec le titre : ".$festival->title." par ".$pseudo;
                    $request->id_festival = $festival->id;
                    $request->finish = 0;
                    $this->fetchTable('requests')->save($request);
                    if ($this->Posts->save($post)) {
                       
                       $this->Flash->success(__('The post has been saved.'));
                       return $this->redirect(['action' => 'index']);
                   }
                   $this->Flash->error(__('Unable to add the post.'));
                }
            }else{
                $post->id_festival = $value;
                if ($this->Posts->save($post)) {
                   $this->Flash->success(__('The post has been saved.'));
                   return $this->redirect(['action' => 'index']);
               }
               $this->Flash->error(__('Unable to add the post.'));
            }

           

            
        }

        $this->set(compact('post', 'festivals'));
    }
}