<div id="header-custom">
    <div>
        <h2>Modifier <?= $festival->title ?></h2>
        <p>@<?= $this->request->getAttribute('identity')->pseudo ?>-Admin</p>
    </div>
    <div>
        <a href="#" id="submit-festiv">Ajouter/Modifier</a>
    </div>
</div>
<div>
<?php if ($festival->picture == null): ?>
    <div class="preview festival-img">
    </div>
<?php else : ?>
    <?php
        $img = $this->Html->Url->Build('/img/pictures/festivals/'.$festival->picture);
    ?>
    <div class="preview festival-img" style="background-image: url(<?= $img ?>);">
    </div>
<?php endif; ?>

<div>
    <?= $this->Form->create($festival, ['enctype'=>'multipart/form-data', 'class' => 'addfestiv']);?>
        <?= $this->Form->control('image', [ 'label' => 'Image', 'type' => 'file']); ?>
        <?= $this->Form->control('title'); ?>
        <?= $this->Form->control('content', [ 'label' => 'Description']); ?>
        <?= $this->Form->control('place', [ 'label' => 'Lieux']); ?>
        <?= $this->Form->control('link', [ 'label' => 'Lien du site internet officiel']); ?>
        <?= $this->Form->button('Ajouter');?>
    <?= $this->Form->end(); ?>
</div>
    
</div>
<?= $this->Html->script(['preview', 'submit']) ?>