<div>
    <div>
        <?php
         $img = $user->picture;
            if ($img == null) {?>
                <div>
                    <p>default</p>
                </div>
            <?php }else{
                $img = $user->picture;
                ?>
                <?= $this->Html->image('pictures/profils/'.$img, ['alt' => 'Profil']); ?>
            <?php } ?>
        
    </div>
<?= $this->Form->create($user,['enctype'=>'multipart/form-data']);?>
    <?= $this->Form->control('image', ['type' => 'file']); ?>   
    <?= $this->Form->control('content', ['label' => 'Description']); ?>
    <?= $this->Form->control('firstname', [ 'label' => 'Prénom']); ?>
    <?= $this->Form->control('lastname', [ 'label' => 'Nom']); ?>
    <?= $this->Form->control('email', [ 'label' => 'Adresse mail']); ?>
    <?= $this->Form->button('Modifier');?>
<?= $this->Form->end(); ?>
</div>
