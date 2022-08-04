<div>
    <div>
        <?php
         $img = $user->picture;
            if ($img == null) {?>
                <div class="preview">
                </div>
            <?php }else{
                $img = $user->picture;
                ?>
                <div class="preview" style="background-image:url('<?= $this->Html->Url->Build('/img/pictures/profils/'.$img.'') ?>');">
                    
                </div>
            <?php } ?>
        
    </div>
<?= $this->Form->create($user,['enctype'=>'multipart/form-data']);?>
    <?= $this->Form->control('image', ['type' => 'file']); ?>   
    <?= $this->Form->control('content', ['label' => 'Description']); ?>
    <?= $this->Form->control('firstname', [ 'label' => 'Prénom']); ?>
    <?= $this->Form->control('lastname', [ 'label' => 'Nom']); ?>
    <?= $this->Form->control('email', [ 'label' => 'Adresse mail']); ?>
    <span>Lorque vous allez modifier vos données, il faudra se reconnecter pour voir la modification apparaitre</span>
    <?= $this->Form->button('Modifier');?>
<?= $this->Form->end(); ?>

</div>
<?= $this->Html->script(['preview']) ?>
