<?php
    $id = $this->request->getAttribute('identity')->id;
?>
<div>
    <div>
        <div>
            <!-- profil img -->
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
            <!-- publication -->
            <!-- Follow -->
            <!-- following -->
        </div>
        <div>
            <!-- firstname + lastname -->
            <?php
                $username = $user->firstname.' '.$user->lastname;
            ?>
            <h3><?= $username ?></h3>
            <!-- description -->
            <?php
            $desc = $user->content;
            if ($desc == null) {
                $desc = 'Aucune description';
            }else{
                $desc = $user->content;
            }
            ?>
            <p><?= $desc ?></p>
            <?php if ($id == $idUserPage) :?>
                <?= $this->Html->link('Modifier',['controller' => 'Users', 'action' => 'edit',  $this->request->getAttribute('identity')->id, '_full' => true,]);?>
                <?= $this->Html->link('se déconnecter', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button']); ?>
                <!-- si il est admin  -->
                <?php if ($this->request->getAttribute('identity')->admin == 1) :?>
                    <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard', '_full' => true,]);?>
                <?php endif; ?>
            <?php else : ?>
                <?php if ($follow == null) : ?>
                    <button class="button follow" type="button" onclick="follow(<?= $id?>,<?= $idUserPage?>)">Suivre</button> 
                <?php else : ?>
                    <button class="button unfollow" type="button" onclick="unfollow(<?= $id?>,<?= $idUserPage?>)">Ne plus suivre</button>
                <?php endif; ?>
            <?php endif ; ?>
            
        </div>
    </div>
</div>
<?= $this->Html->script(['follow.js']) ?>