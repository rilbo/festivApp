<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class LikesTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        
        // pour id_user
        $this->belongsTo('Users', [
            'foreignKey' => 'id_user'
        ]);

        // pour id_post
        $this->belongsTo('Posts', [
            'foreignKey' => 'id_post'
        ]);
        
    }
}