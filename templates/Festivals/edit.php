<div id="header-custom">
    <div>
        <h2><?= $festival->title ?></h2>
        <p>@<?= $this->request->getAttribute('identity')->pseudo ?>-Admin</p>
    </div>
    <div>
        <a href="#" id="submit-festiv">Modifier</a>
    </div>
</div>
<div id="edit-festival-form">
    <?php if ($festival->picture == null): ?>
        <div class="preview">
        </div>
    <?php else : ?>
        <?php
            $img = $this->Html->Url->Build('/img/pictures/festivals/'.$festival->picture);
        ?>
        <div class="preview" style="background-image: url(<?= $img ?>);">
        </div>
    <?php endif; ?>

    <div>
        <?= $this->Form->create($festival, ['enctype'=>'multipart/form-data', 'class' => 'addfestiv']);?>
            <?= $this->Form->control('image', [ 'label' => 'Image', 'type' => 'file']); ?>
            <?= $this->Form->control('title'); ?>
            <?= $this->Form->control('content', [ 'label' => 'Description']); ?>
            <?= $this->Form->control('place', [ 'label' => 'Lieux']); ?>
            <?= $this->Form->control('link', [ 'label' => 'Lien du site internet officiel']); ?>
        <?= $this->Form->end(); ?>
    </div>
    
</div>
<?= $this->Html->script(['preview', 'submit']) ?>