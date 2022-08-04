<div id="header-custom">
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/back.svg', ['alt' => 'retourner à la page navigation des posts']), ['controller' => 'Posts', 'action' => 'index'], ['escape' => false]); ?>
    </div>
    <div>
        <h3><?= $festival->title ?></h3>
        <p><?= $festival->place ?></p>
    </div>
</div>
<div class="img-festival">
    <?= $this->Html->image('pictures/festivals/'.$festival->picture.'', ['alt' => 'photo du festival '.$festival->title.'', 'style' => 'width:100%;']); ?>
</div>
<div>
    <p><?= $festival->content ?></p>
</div>
<div>
    <h4>Lien du site</h4>
    <?= $this->Html->link($festival->link, $festival->link, ['target' => '_blank', 'escape' => false]); ?>
</div>
