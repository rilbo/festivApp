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
        ]);

        $this->hasMany('Follows', [
            'foreignKey' => 'id_user_following',
        ]);

        $this->hasMany('Festivals', [
            'foreignKey' => 'id_user',
        ]);

        $this->hasMany('Posts', [
            'foreignKey' => 'id_user',
        ]);

        // likes
        $this->hasMany('Likes', [
            'foreignKey' => 'id_user', 
        ]);

        // comments
        $this->hasMany('Comments', [
            'foreignKey' => 'id_user',
        ]);

        // notifications
        $this->hasMany('Notifications')->setForeignKey([
            'user_id',
            'id_user_receiver'
        ]);
    }
}