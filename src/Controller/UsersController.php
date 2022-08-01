<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class UsersController extends AppController{

    public function beforeFilter(\Cake\Event\EventInterface $e)
    {
        parent::beforeFilter($e);
        $this->Authentication->addUnauthenticatedActions(['login', 'signup']);
    }

    public function login(){
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post')){
            $result = $this->Authentication->getResult();
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($result->isValid()) {
                $this->Flash->success('Welcome Back');
                $redirect = $this->request->getQuery('redirect', ['controller' => 'Posts', 'action' => 'index']);
                return $this->redirect($redirect);
            }else{
                $this->Flash->error('Invalid username or password');
            }
        }
        $this->set(compact('user'));
    }

    public function signup(){
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post', 'put')){
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $pseudo = $this->request->getData('pseudo');
            $email = $this->request->getData('email');

            if ($this->Users->findByPseudo($pseudo)->count() > 0) {
                $this->Flash->error('Pseudo already taken');
            }elseif ($this->Users->findByEmail($email)->count() > 0) {
                $this->Flash->error('Email already taken');
            }else{
                if ($this->request->getData('password') == $this->request->getData('password_confirm')){
                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your account has been created');
                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }else{
                        $this->Flash->error('An error occured');
                    }
                }else{
                    $this->Flash->error('The passwords do not match');
                }
                return $this->Flash->error('Your account could not be created');
            }
        }
        $this->set(compact('user'));
    }

    public function logout(){
        $log = $this->Authentication->getResult();
        if($log->isValid()){
            $this->Authentication->logout();
            $this->Flash->success('You are now logged out, good bye');
        }
        return $this->redirect(['controller'=>'Pages','action' => 'index']);
    }

    public function view($id){
        $user = $this->Users->get($id, [
            'contain' => ['Follows']
        ]);

        // si l'utilisateur connecté est déjà abonné à cet utilisateur
        $follow = $this->fetchTable('follows')->findById_userAndId_user_following($this->request->getAttribute('identity')->id, $id)->first();
        $posts = $this->Users->Posts->findById_user($id)->orderDesc('created')->all();

        // Stats
        $followers = $this->fetchTable('follows')->findById_user_following($id)->count();
        $following = $this->fetchTable('follows')->findById_user($id)->count();
        $postsCount = $this->Users->Posts->findById_user($id)->count();

        $idUserPage = $id;
        $this->set(compact('user', 'idUserPage', 'follow', 'posts', 'followers', 'following', 'postsCount'));
    }

    public function edit($id){
        $user = $this->Users->get($id);
        $pseudo = $user->pseudo;

        if($this->request->is(['patch','post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //si l'utilisateur insert une image de profil
            if ($this->request->getData('image')->getClientFilename()) {
               
                $ext = pathinfo($this->request->getData('image')->getClientFilename(), PATHINFO_EXTENSION);
                $name = $pseudo.'-'.time().'.'.$ext;
                $oldname = $user->picture;
                $user->picture = $name;


                if ($this->Users->save($user)) {
                    //si l'ancien fichier existe, on le supprime
					if(!empty($oldname) && file_exists(WWW_ROOT.'img/pictures/profils/'.$oldname)){
						unlink(WWW_ROOT.'img/pictures/profils/'.$oldname);
					}
                    $this->request->getData('image')->moveTo(WWW_ROOT.'img/pictures/profils/'.$name);
                    $this->request->getAttribute('identity')->picture = $name;
                    $this->Flash->success('Your account has modified');
                    return $this->redirect(['controller' => 'Users', 'action' => 'view', $user->id]);
                }
                $this->Flash->error('An error occured');
               
            }else{
                if ($this->Users->save($user)) {
                    $this->Flash->success('Your account has modified');
                    return $this->redirect(['controller' => 'Users', 'action' => 'view', $user->id]);
                }
                $this->Flash->error('An error occured');
                
            }
        }
        $this->set(compact('user'));
    }

    public function dashboard(){
         if ($this->request->getAttribute('identity')->admin == 1){

            $user = $this->Users->get($this->request->getAttribute('identity')->id, [
                'contain' => ['Follows']
            ]);

            // touts les requetes en fonction de si finish est true ou false
            $requests = $this->fetchTable('requests')->find()->where(['finish' => 0])->orderDesc('created')->all();
            
            // nombre de publications totales
            $postsCount = $this->Users->Posts->find('all')->count();
            // nombre de d'utilisateurs
            $usersCount = $this->Users->find('all')->count();
            $this->set(compact('user', 'requests', 'postsCount', 'usersCount'));
         }else{
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->id]);
         }
    }

    function compressImg($a, $b){
        // detection png ou jpg
        if ($b = 'image/png'){ 
            $image = imagecreatefrompng($a);
        }elseif ($b = 'image/jpg' || $b = 'image/jpeg'){
            $image = imagecreatefromjpeg($a);
        }elseif( $b = 'image/gif'){
            $image = imagecreatefromgif($a);
        }

        return $image;
    }
    
}