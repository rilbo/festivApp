<div>
<?= $this->Form->create($comment, ['enctype'=>'multipart/form-data']);?>
        <?= $this->Form->control('content', ['label' => false, 'placeholder' => "Votre commentaire"]); ?>
        <?= $this->Form->button('Laisser mon commentaire');?>
    <?= $this->Form->end(); ?>
</div>