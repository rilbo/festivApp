<div id="header-custom" class="header-comments">
    
    <div>
        <!-- retour en arriere sur le compte de la personne -->
        <?= $this->Html->link($this->Html->image('icons/navbarTop/back.svg', ['alt' => 'Retour']), ['controller' => 'Users', 'action' => 'view', $this->request->getAttribute("identity")->id], ['escape' => false]); ?>
    </div>
    <div>
        <p>Publication</p>
        <span>@<?= $this->request->getAttribute("identity")->pseudo ?></span>
    </div>
</div>
<div class="feed posts-user">
    <?php $count = 0; ?>
    <?php $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture); ?>
    <?php 

        if ($posts->count() == 0) : ?>
            <div class="noPost">
                <p>Vous avez posté aucune publication</p>
            </div>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <?php
                    $count++;
                    $images = $post->pictures;
                    $images = explode(',', $images);
                ?>
                <div class="post" id="<?= $post->id ?>" >
                    <div>
                        <?php foreach($images as $image) : ?>
                            <?= $this->Html->image('pictures/posts/'.$image.'', ['alt' => 'Moi au festival '.$post->festival->title.'']); ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <div>
                            <h2>@<?= $post->user->pseudo ?></h2>
                            <?= $this->Html->link($post->festival->title." ".$post->date_festival->nice('Europe/Paris', 'fr-FR'), ['controller' => 'Festivals', 'action' => 'view', $post->festival->id], ['escape' => false]); ?>
                        </div>
                        <div>
                         <?= $this->Html->link($this->Html->image('icons/post/delete.svg', ['alt' => 'Retour']), ['controller' => 'Posts', 'action' => 'delete', $post->id], ['escape' => false]); ?>
                        </div>
                    </div>
                    <div>
                        <p>
                            <?= $post->description ?>
                        </p>
                    </div>
                    
                        <div>
                            <div>
                                <?= $this->Html->link("Voir les commentaires", ['controller' => 'Comments', 'action' => 'view', $post->id], ['escape' => false]); ?>
                            </div>
                            <div>
                                <div class="photo" style="background-image:url(<?= $imgProfils ?>);"></div>
                                <?= $this->Html->link('<input type="text" placeholder="Laisser un commentaires">', ['controller' => 'Comments', 'action' => 'add', $post->id], ['escape' => false]); ?>
                            </div>
                        </div>
                    
                </div>
            <?php endforeach ; ?>
        <?php endif; ?>
</div>