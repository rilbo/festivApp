<div id="header-custom">
    <div>
        <h2>Notifications</h2>
    </div>
</div>
<div id="notifs">
    <?php foreach($notifications as $notification ):?>
        <div class="notification">
            <div class="content">
                <div class="photo" style="background-image:url(<?= $this->Url->build('/img/pictures/profils/'. $notification->user->picture)?>);">
                </div>
                <div>
                    <p><?= $notification->content?></p>
                    <span><?= $notification->created->i18nFormat('dd/MM/yyyy HH:mm')?></span>
                </div>
            </div>
            
            <?php if($notification->type == 2):?>
                <div class="notification__content__post">
                    <?php 
                        $img = $notification->post->pictures;
                        $img = explode(',', $img);
                    ?>
                    <img src="<?= $this->Url->build('/img/pictures/posts/'.$img[0])?>" alt="Image principal du post">
                </div>
            <?php elseif ($notification->type == 1):?>
                <!-- creer un lien de follow pour suivre la personne -->

                <?php
                    // recuperer l'id de l'utilisateur qui a fait l'action
                    $idUser = $notification->id_user;
                    
                    // recuperer l'id de l'utilisateur qui est connecté à la page
                    $idUserPage = $this->request->getAttribute('identity')->id;

                    $follow = true;

                    foreach ($follows as $f) {
                        if($f->id_user == $idUserPage && $f->id_user_following == $idUser){
                            $follow = false;
        
                        }
                        
                    }
                ?>
                <?php if ($follow) : ?>
                    <button class="button follow" type="button" onclick="follow(<?= $idUserPage?>,<?= $idUser?>)">Suivre</button> 
                <?php else : ?>
                    <button class="button unfollow" type="button" onclick="unfollow(<?= $idUserPage?>,<?= $idUser?>)">Abonné</button>
                <?php endif; ?>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</div>
<?= $this->Html->script(['follow.js']) ?>