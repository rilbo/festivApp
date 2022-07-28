<div>
    <div class="comments">

    <?php foreach ( $comments as $comment ) :?>
        <?php 
            $imgProfilUsers = $this->Html->Url->Build('/img/pictures/profils/'.$comment->user->picture);   
        ?>
        <div>
            <div>
                <div>
                    <div>
                       <!-- image de profil de l'utilisateurs -->
                        <?= $this->Html->image($imgProfilUsers, ['alt' => 'photo de profil de '.$comment->user->pseudo.'']); ?>
                    </div>
                    <div>
                        <h2>@<?= $comment->user->pseudo ?></h2>
                    </div>
                </div>
                <div>
                    <!-- time -->
                    <p><?= $comment->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></p>
                </div>
            </div>
            <div>
                <!-- content -->
                <p><?= $comment->content ?></p>
            </div>
        </div>

    <?php endforeach ;?>
    </div>
    <div class="add-comments">
        <?php
            $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture);
        ?>
        <?= $this->Html->image($imgProfils, ['alt' => 'Photo profil pour les commentaires']); ?>
        <?= $this->Html->link('<input type="text" placeholder="Votre commentaires">', ['controller' => 'Comments', 'action' => 'add', $idPost], ['escape' => false]); ?>
    </div>
</div>