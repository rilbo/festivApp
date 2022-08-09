<div id="header-custom">
    <div>
        <!-- recuperer le pseudo de l'utilisateur -->
        <h2>Recherche</h2>
    </div>
</div>
<div id="form-search">
    <?php
        $options = array();
        $options['posts'] = $this->Html->image('icons/search/festival.svg', ['alt' => 'festival']);
        $options['users'] = $this->Html->image('icons/search/people.svg', ['alt' => 'profil']);
    ?>
    <?= $this->Form->control('search', ['id'=>'input-search', 'label' => false, 'placeholder' => "Recherche..."]); ?>
    <?= $this->Form->control('type', ['type' => 'radio', 'options' => $options, 'default' => 'posts', 'label' => false, 'escape' => false]); ?>
</div>
<div id="results-search">
    <?php foreach ($posts as $post) { ?>
        <?php
            $img = $post->pictures;
            $img = explode(',', $img);
            $img = $img[0];
        ?>
        <?= $this->html->link('<div class="post-card-img" style="background-image:url(img/pictures/posts/'.$img.');"></div>',['controller' => 'Posts', 'action' => 'view', $post->id], ['escape' => false]);?>
    <?php } ?>
</div>

<?= $this->Html->script(['search.js']) ?>