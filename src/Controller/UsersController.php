<?php

namespace App\Controller;

use Cake\Event\EventInterface;

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
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Your account has been created');
                return $this->redirect(['controller'=>'Users','action' => 'login']);
            }
            return $this->Flash->error('Your account could not be created');
        }
        $this->set(compact('user'));
    }

    public function logout(){
        $log = $this->Authentication->getResult();
        if($log->isValid()){
            $this->Authentication->logout();
            $this->Flash->success('You are now logged out, good bye');
        }
        return $this->redirect(['controller'=>'Users','action' => 'login']);
    }

    public function view($id){
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
    
}