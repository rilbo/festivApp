<div>
<div class="preview festival-img">
</div>
<div>
    <?= $this->Form->create($festival, ['enctype'=>'multipart/form-data']);?>
        <?= $this->Form->control('image', [ 'label' => 'Image', 'type' => 'file']); ?>
        <?= $this->Form->control('title'); ?>
        <?= $this->Form->control('content', [ 'label' => 'Description']); ?>
        <?= $this->Form->control('place', [ 'label' => 'Lieux']); ?>
        <?= $this->Form->control('link', [ 'label' => 'Lien du site internet officiel']); ?>
        <?= $this->Form->button('Ajouter');?>
    <?= $this->Form->end(); ?>
</div>
    
</div>
<?= $this->Html->script(['preview']) ?>