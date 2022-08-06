<?php


namespace App\Controller;

use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class SearchsController extends AppController{

    public function index(){
        $posts = $this->fetchTable('Posts')->find('all')
            ->order(['Posts.created' => 'DESC']);
        $this->set(compact('posts'));
        
    }

    public function search(){
        if ($this->request->is('post', 'put')) {
            $data = $this->request->getData('value');
            $type = $this->request->getData('type');
            if ($type == 'posts') {
                $content = $this->fetchTable('Posts')->find('all', ['contain' => ['Festivals']])->Where(['Festivals.title LIKE' => '%'.$data.'%'])->order(['Posts.created' => 'DESC']);
            }elseif ($type == 'users') {
                $content = $this->fetchTable('Users')->find('all')->where(['pseudo LIKE' => '%'.$data.'%']);
            }
        }
        //$this->set(compact('users'));
        $this->response = $this->response->withStringBody(json_encode([
            'success' => $content,

        ]));
        $this->response = $this->response->withType('json');
        // $this->set(compact('follow'));
        return $this->response;
    }
}