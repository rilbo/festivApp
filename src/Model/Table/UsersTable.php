<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');

        // les users peuvent suivre plusieux compte 
        $this->hasMany('Follows', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Follows', [
            'foreignKey' => 'id_user_following',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Festivals', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Posts', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        // likes
        $this->hasMany('Likes', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        // comments
        $this->hasMany('Comments', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        // notifications
        $this->hasMany('Notifications', [
            'foreignKey' => 'id_user',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Notifications', [
            'foreignKey' => 'id_user_receiver',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        
    }
}