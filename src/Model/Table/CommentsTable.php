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
        
        // pour la relation avec les posts
        $this->belongsTo('Posts', [
            'foreignKey' => 'id_post',
            'joinType' => 'INNER',
        ]);

        // pour la relation avec les users
        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER',
        ]);
        
    }
}