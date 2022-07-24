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
        $user = $this->Users->get($id);
        $this->set(compact('user'));
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