<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function initialize(array $c): void
    {
        parent::initialize($c);

        // pour created & modifief
        $this->addBehavior('Timestamp');

        // un post peut avoir qu'un seul user
        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER',
        ]);

        // un post peut avoir qu'un seul festival
        $this->belongsTo('Festivals', [
            'foreignKey' => 'id_festival',
            'joinType' => 'INNER',
        ]);

        // likes 
        $this->hasMany('Likes', [
            'foreignKey' => 'id_post',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        //comments
        $this->hasMany('Comments', [
            'foreignKey' => 'id_post',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        
    }
}