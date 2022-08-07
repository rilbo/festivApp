
<div id="header-custom" class="header-comments">
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/back.svg', ['alt' => 'retourner à la page navigation des posts']), ['controller' => 'Posts', 'action' => 'index'], ['escape' => false]); ?>
    </div>
    <div>
        <h2>Commentaire</h2>
    </div>
</div>
<div class="comments">
    <?php if($comments->count() == 0): ?>
        <div class="no-comments">
            <p>Il y a aucun commentaire</p>
        </div>
    <?php else: ?>
        <?php foreach ( $comments as $comment ) :?>
            <?php 
                $imgProfilUsers = $this->Html->Url->Build('/img/pictures/profils/'.$comment->user->picture);   
            ?>
            <div class="comment">
                <div>
                    <div>
                        <div class="photo" style="background-image:url(<?= $imgProfilUsers ?>);">
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
    <?php endif; ?>
</div>
<div class="add-comments">
    <?php
        $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture);
    ?>
    <div class="photo" style="background-image:url(<?= $imgProfils ?>);">
    </div>
    <?= $this->Html->link('<input type="text" placeholder="Laisser un commentaire">', ['controller' => 'Comments', 'action' => 'add', $idPost], ['escape' => false]); ?>
</div>