<div id="navbar-top">
    <div>
        <?= $this->Html->image('logo/logo-b-s.svg', ['alt' => 'Logo FestivApp']); ?>
    </div>
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/notif.svg', ['alt' => 'Notification']), ['controller' => 'Notifications', 'action' => 'index'], ['escape' => false]); ?>
    </div>
</div>
<div class="feed">
    <?php $count = 0; ?>
    <?php $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture); ?>
    <?php 

        if ($posts->count() == 0) : ?>
            <div class="noPost">
                <p>Vous ne suivez aucune compte !!</p>
            </div>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <?php
                    $count++;
                    $images = $post->pictures;
                    $images = explode(',', $images);
                    $image = $images[0];
                ?>
                <div class="post">
                    <div>
                        <?php foreach($images as $image) : ?>
                            <?= $this->Html->image('pictures/posts/'.$image.'', ['alt' => 'photo des posts pour'.$post->user->pseudo.' au festival '.$post->festival->title.'']); ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <div>
                            <h2>@<?= $post->user->pseudo ?></h2>
                            <?= $this->Html->link($post->festival->title, ['controller' => 'Festivals', 'action' => 'index', $post->festival->id], ['escape' => false]); ?>
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
                    </div>
                    <div>
                        <div>
                            <div>
                                <?= $this->Html->link("Voir les commentaires", ['controller' => 'Comments', 'action' => 'view', $post->id], ['escape' => false]); ?>
                            </div>
                            <div>
                                <?= $this->Html->image($imgProfils, ['alt' => 'Photo profil pour les commentaires']); ?>
                                <?= $this->Html->link('<input type="text" placeholder="Votre commentaires">', ['controller' => 'Comments', 'action' => 'add', $post->id], ['escape' => false]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ; ?>
        <?php endif; ?>
</div>
<?= $this->Html->script(['like.js']) ?>
