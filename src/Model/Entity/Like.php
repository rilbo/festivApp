<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class Like extends Entity{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}