<div id="header-custom">
    <div>
        <h2>Édition du compte</h2>
        <p>@<?= $user->pseudo ?></p>
    </div>
    <div>
        <a href="#" id="submit-user">Modifier</a>
    </div>
</div>
<div id="edit-user-form">
    <?php
        $img = $user->picture;
        if ($img == null) {?>
            <div class="preview">
            </div>
    <?php }else{ ?>
            <div class="preview" style="background-image:url('<?= $this->Html->Url->Build('/img/pictures/profils/'.$img.'') ?>');">
            </div>
    <?php } ?>
    <div>
        <?= $this->Form->create($user,['enctype'=>'multipart/form-data', 'class' => 'edit-user']);?>
            <?= $this->Form->control('image', ['type' => 'file']); ?>   
            <?= $this->Form->control('content', ['label' => 'Description']); ?>
            <?= $this->Form->control('firstname', [ 'label' => 'Prénom']); ?>
            <?= $this->Form->control('lastname', [ 'label' => 'Nom']); ?>
            <?= $this->Form->control('email', [ 'label' => 'Adresse mail']); ?>
        <?= $this->Form->end(); ?>
    </div>
    

</div>
<?= $this->Html->script(['preview', 'submit']) ?>
