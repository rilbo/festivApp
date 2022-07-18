<?php

namespace App\Controller;
use Cake\Event\EventInterface;

class PostsController extends AppController{

    public function index(){
        $posts = "posts";
        $this->set(compact('posts'));
    } 
}