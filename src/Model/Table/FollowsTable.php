<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FollowsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        
        // un compte peut etre suivi que par un seul compte connecté 
        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'id_user_following',
            'joinType' => 'INNER',
        ]);
    }
}