<div id="comments-add">
    <?= $this->Form->create($comment, ['enctype'=>'multipart/form-data']);?>
        <?= $this->Form->control('content', ['label' => false, 'placeholder' => "Votre commentaire"]); ?>
        <?= $this->Form->button('Laisser mon commentaire', ['class' => 'btn']);?>
    <?= $this->Form->end(); ?>
</div>