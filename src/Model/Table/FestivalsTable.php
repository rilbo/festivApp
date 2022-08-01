<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FestivalsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');
        
        // un festival peut avoir qu'un seul user
        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER',
        ]);

        // un festival peut avoir plusieur post
        $this->hasMany('Posts', [
            'foreignKey' => 'id_festival',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        //request
        $this->hasMany('Requests', [
            'foreignKey' => 'id_festival',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        
    }
}