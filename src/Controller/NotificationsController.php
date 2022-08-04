<?php

namespace App\Controller;

use App\Model\Entity\Notification;
use Cake\Event\EventInterface;
use SebastianBergmann\Environment\Console;

class NotificationsController extends AppController{

    public function index(){
        // recuperer toute les notifications de l'utilisateur
        $notifications = $this->Notifications->find('all')
            ->contain(['Users', 'Posts'],
                [
                    'conditions' => [
                        'Notifications.id_post IS' => null,
                    ],
                ])
            ->where(['Notifications.id_user_receiver' => $this->request->getAttribute('identity')->id])
            ->order(['Notifications.created' => 'DESC']);
                    
        // recuperer tous les follows de l'utilisateur
        $follows = $this->fetchTable('Follows')->find('all')
            ->contain(['Users'])
            ->where(['Follows.id_user' => $this->request->getAttribute('identity')->id]);

        $this->set(compact('notifications', 'follows'));
    }

}