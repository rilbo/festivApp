<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class NotificationsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        

        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Posts', [
            'foreignKey' => 'id_post',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'id_user_receiver',
            'joinType' => 'INNER',
        ]);


        
    }
}