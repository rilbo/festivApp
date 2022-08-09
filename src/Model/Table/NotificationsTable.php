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

        $this->belongsTo('Posts', [
            'foreignKey' => 'id_post',
            'joinType' => 'LEFT',
        ]);

        // plusieurs cle etrangere dans la meme table
        $this->belongsTo('Users')
            ->setForeignKey('id_user', 'id_user_receiver')
            ->setJoinType('INNER');
    }
}