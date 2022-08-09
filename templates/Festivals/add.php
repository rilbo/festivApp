<div id="header-custom">
    <div>
        <h2>Ajout d'un festival</h2>
        <p>@<?= $this->request->getAttribute('identity')->pseudo?>-Admin</p>
    </div>
    <div>
        <a href="#" id="submit-festiv">Ajouter</a>
    </div>
</div>
<div id="add-festival-form">
    <div class="preview">
    </div>
    <div>
        <?= $this->Form->create($festival, ['enctype'=>'multipart/form-data','class' => 'addfestiv']);?>
            <?= $this->Form->control('image', [ 'label' => 'Image', 'type' => 'file']); ?>
            <?= $this->Form->control('title', [ 'label' => 'Titre']); ?>
            <?= $this->Form->control('content', [ 'label' => 'Description']); ?>
            <?= $this->Form->control('place', [ 'label' => 'Lieux']); ?>
            <?= $this->Form->control('link', [ 'label' => 'Lien du site internet officiel']); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>
<?= $this->Html->script(['preview','submit']) ?>