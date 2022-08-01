<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class RequestsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        
        // pour les clés étrangères
        // festivals
        $this->belongsTo('Festivals', [
            'foreignKey' => 'id_festival',
            'joinType' => 'INNER',
        ]);
        
    }
}