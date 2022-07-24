<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        

        // // les users ont plusieurs liste 
        // $this->hasMany('Listings', [
        //     'foreignKey' => 'user_id',
        //     'dependent' => true,
        //     'cascadeCallbacks' => true,
        // ]);

        // $this->hasMany('Messages', [
        //     'foreignKey' => 'receiver_id',
        //     'dependent' => true,
        //     'cascadeCallbacks' => true,
        // ]);
        // $this->hasMany('Messages', [
        //     'foreignKey' => 'sender_id',
        //     'dependent' => true,
        //     'cascadeCallbacks' => true,
        // ]);

        // $this->hasMany('Notifications', [
        //     'foreignKey' => 'user_id',
        //     'dependent' => true,
        //     'cascadeCallbacks' => true,
        // ]);
        
    }
}