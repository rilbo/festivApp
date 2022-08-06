<div id="header-custom">
    <div>
        <!-- recuperer le pseudo de l'utilisateur -->
        <h2>Recherche</h2>
    </div>
</div>
<div>
    <?= $this->Form->control('search', ['id'=>'input-search']); ?>
    <?= $this->Form->control('type', ['type' => 'radio', 'options' => ['posts' => 'Posts', 'users' => 'Users'], 'default' => 'posts']); ?>
</div>
<div id="results-search">
    <?php foreach ($posts as $post) { ?>
        <?php
            $img = $post->pictures;
            $img = explode(',', $img);
            $img = $img[0];
        ?>
        <?= $this->html->link('<div class="post-card-img"><img src="img/pictures/posts/'.$img.'" alt=""></div>',['controller' => 'Posts', 'action' => 'view', $post->id], ['escape' => false]);?>
    <?php } ?>
</div>

<?= $this->Html->script(['search.js']) ?>