<div id="header-custom" class="header-festival-view">
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/back.svg', ['alt' => 'retourner à la page navigation des posts']), ['controller' => 'Posts', 'action' => 'index'], ['escape' => false]); ?>
    </div>
    <div>
        <h3>Festival</h3>
    </div>
</div>
<?php if ($festival->content == null) : ?>
    <div id="content-custom">
        <p>Aucun contenu pour ce festival</p>
        <p>La page de présentation arrive prochainement</p>
    </div>
<?php else : ?>
    <div class="img-festival">
        <?= $this->Html->image('pictures/festivals/'.$festival->picture.'', ['alt' => 'photo du festival '.$festival->title.'', 'style' => 'width:100%;']); ?>
    </div>
    <div id="content-festival">
        <h3><?= $festival->title ?></h3>
        <p><?= $festival->place ?></p>
        <p><?= $festival->content ?></p>
    </div>
    <div id="link-festival">
        <h4>Lien du site</h4>
        <?= $this->Html->link($festival->link, $festival->link, ['target' => '_blank', 'escape' => false]); ?>
    </div>
<?php endif; ?>