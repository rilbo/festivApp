<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class SearchsController extends AppController{

    public function index($data, $type){

        // formulaire de recherche recuperer les données taper dans le champ de recherche
        if($this->request->is('post', 'put')){
            $data = $this->request->getData('searchs');
            if ($data == '') {
                $data = 'all';
            }
            $type = $this->request->getData('type');
            return $this->redirect(['controller' => 'Searchs', 'action' => 'index', $data, $type]);
        }

        if ($type == 'posts') {
            if ($data == 'all') {
                $content = $this->fetchTable('Posts')->find('all'); 
            }else{
                // posts à un lien avec festivals contains 
                $content = $this->fetchTable('Posts')->find('all', ['contain' => ['Festivals']])->Where(['Festivals.title LIKE' => '%'.$data.'%']);

            }
           
        }

        if ($type == 'users') {
            if ($data == 'all') {
                $content = $this->fetchTable('Users')->find('all'); 
            }else{
                $content = $this->fetchTable('Users')->find('all')->where(['pseudo LIKE' => '%'.$data.'%']);
            }
            
        }

    

        $this->set(compact('content', 'type'));
    }
}