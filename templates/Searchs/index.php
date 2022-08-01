<div id="header-custom">
    <div>
        <!-- recuperer le pseudo de l'utilisateur -->
        <h2>Recherche</h2>
    </div>
</div>
<div>
    <!-- search fields -->
    <?= $this->Form->create(null, ['type' => 'post']) ?>
        <?= $this->Form->control('searchs', ['type' => 'text', 'id' => 'search']) ?>
        <!-- Checkradio entre posts et users -->
        <?= $this->Form->control('type', ['type' => 'radio', 'options' => ['posts' => 'Posts', 'users' => 'Users'], 'default' => 'posts']) ?>
        <?= $this->Form->button('Rechercher') ?>
    <?= $this->Form->end() ?>
        
</div>
<div>
    <?php if ($type == 'posts') :?>
        <?php foreach ($content as $key => $value) :?>
                <div>
                    <h2><?= $value->pictures ?></h2>
                </div>
        <?php endforeach ;?>
    <?php endif ;?>
    <?php if ($type == 'users') :?>
        <?php foreach ($content as $key => $value) :?>
                <div>
                    <h2><?= $value->pseudo ?></h2>
                </div>
        <?php endforeach ;?>      
    <?php endif ;?>
</div>
<?= $this->Html->script(['sea.js']) ?>