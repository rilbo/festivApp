<div id="header-custom">
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/back.svg', ['alt' => 'retour']), ['controller' => 'Searchs', 'action' => 'index'], ['escape' => false]); ?>
    </div>
</div>
<?php
    $images = $post->pictures;
    $images = explode(',', $images);
    $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture);
?>
<div class="post" id="user-posts-view">
    <div>
        <?php foreach($images as $image) : ?>
            <?= $this->Html->image('pictures/posts/'.$image.'', ['alt' => 'photo des posts pour'.$post->user->pseudo.' au festival '.$post->festival->title.'']); ?>
        <?php endforeach; ?>
    </div>
    <div>
        <div>
            <h2>@<?= $post->user->pseudo ?></h2>
            <?= $this->Html->link($post->festival->title." ".$post->date_festival->nice('Europe/Paris', 'fr-FR'), ['controller' => 'Festivals', 'action' => 'view', $post->festival->id], ['escape' => false]); ?>
            <!-- affichage de la date -->
            
        </div>
        <div>
            <!-- like ou non-->
            <?php
                $id = $this->request->getAttribute('identity')->id;
                $idPost = $post->id;
                $like = $post->likes;
                // si like est vide alors il n'y a pas de like

                if (!empty($like)) {
                    foreach ($like as $l) {
                        if ($l->id_user == $id) {
                            $liked = true;
                            break;
                        } else {
                            $liked = false;
                        }
                    }
                }else{
                    $liked = false;
                }
            ?>
            <?php if ($liked) : ?>
                <button class="button unlike-<?= $idPost ?>" type="button" onclick="unlike(<?= $id ?>,<?= $idPost?>)"><?= $this->Html->image('icons/post/like-f.svg', ['alt' => 'Like'])?></button>
            <?php else : ?>
                <button class="button like-<?= $idPost ?>" type="button" onclick="like(<?= $id ?>,<?= $idPost?>)"><?= $this->Html->image('icons/post/like-e.svg', ['alt' => 'Like'])?></button>
            <?php endif; ?>
        </div>
    </div>
    <div>
        <p>
            <?= $post->description ?>
        </p>
        <span>
            <?= $post->created->nice('Europe/Paris', 'fr-FR'); ?>
        </span>
    </div>
    <div>
        <div>
            <div>
                <?= $this->Html->link("Voir les commentaires", ['controller' => 'Comments', 'action' => 'view', $post->id], ['escape' => false]); ?>
            </div>
            <div>
                <div class="photo" style="background-image:url(<?= $imgProfils ?>);">
                </div>
                <?= $this->Html->link('<input type="text" placeholder="Votre commentaires">', ['controller' => 'Comments', 'action' => 'add', $post->id], ['escape' => false]); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(['like.js']) ?>