<div>
    <div>
        <div>
            <!-- profil img -->
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
            <?= $this->Html->link('Modifier',['controller' => 'Users', 'action' => 'edit',  $this->request->getAttribute('identity')->id, '_full' => true,]);?>
            <?= $this->Html->link('se déconnecter', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button']); ?>
        </div>
    </div>
</div>