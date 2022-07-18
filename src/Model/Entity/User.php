<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    public function _setPassword(string $p) : ?string{
        if (strlen($p) > 0) {
            return (new DefaultPasswordHasher())->hash($p);
        }

    }
}