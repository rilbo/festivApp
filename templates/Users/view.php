<?php
    $id = $this->request->getAttribute('identity')->id;
?>
<div id="header-custom">
    <div>
        <!-- recuperer le pseudo de l'utilisateur -->
        <h2>@<?= $user->pseudo ?></h2>
    </div>
    <div>
        <?= $this->Html->link($this->Html->image('icons/navbarTop/logout.svg', ['alt' => 'Notification']), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]); ?>
    </div>
</div>
<div id="user-view">
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
        <div>
            <p><?= $postsCount ?></p>
            <h4>Publication</h4>
        </div>
        <!-- Follow -->
        <div>
            <p><?=  $followers ?></p>
            <h4>Abonnée</h4> 
        </div>
        <!-- following -->
        <div>
            <p><?= $following  ?></p>
            <h4>Abonnement</h4>
        </div>
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
        <div>
            <?php if ($id == $idUserPage) :?>
                <?= $this->Html->link('Modifier',['controller' => 'Users', 'action' => 'edit',  $this->request->getAttribute('identity')->id, '_full' => true,], ['class' => 'btn']);?>
                <!-- si il est admin  -->
                <?php if ($this->request->getAttribute('identity')->admin == 1) :?>
                    <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard', '_full' => true,], ['class' => 'btn']);?>
                <?php endif; ?>
            <?php else : ?>
                <?php if ($follow == null) : ?>
                    <button class="btn follow" type="button" onclick="follow(<?= $id?>,<?= $idUserPage?>)">Suivre</button> 
                <?php else : ?>
                    <button class="btn unfollow" type="button" onclick="unfollow(<?= $id?>,<?= $idUserPage?>)">Ne plus suivre</button>
                <?php endif; ?>
            <?php endif ; ?>
        </div>    
    </div>
</div>
<div id="user-posts">
    <!-- les posts de l'utilisateurs -->
    <?php if($posts->count() == 0) :?>
        <div class="no-publication">
            <p>Tu n'a pas encore de publication</p>
        </div>
        
    <?php else : ?>
        <?php foreach($posts as $post) : ?>
            <?php 
                $img = $post->pictures;
                $img = explode(',', $img);
                $img = $img[0];
                $imgPicturesUrl = $this->Html->Url->Build('/img/pictures/posts/'.$img.'');    
            ?>
            <?= $this->Html->link("<div class='post-user' style='background-image: url(".$imgPicturesUrl.");'></div>", ['controller' => 'Users', 'action' => 'posts', '#' => $post->id], ['escape' => false])?>
            
        <?php endforeach; ?>
    <?php endif ; ?>
</div>

<?= $this->Html->script(['follow.js']) ?>