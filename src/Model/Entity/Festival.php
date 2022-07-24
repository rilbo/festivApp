<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class Festival extends Entity{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}