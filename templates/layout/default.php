<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css(['style']) ?>
   
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php if ($this->request->getAttribute('identity') != null) :?>
    <?php
                    $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture);
                ?>
    <header>
        <nav class="bottom-nav">
            <ul>
                <li>
                    <?= $this->Html->link($this->Html->image('icons/header/home.svg', ['alt' => 'accueil']), ['controller' => 'Posts', 'action' => 'index'], ['escape' => false]); ?>
                </li>
                <li>
                    <?= $this->Html->link($this->Html->image('icons/header/search.svg', ['alt' => 'recherche']), ['controller' => 'Searchs', 'action' => 'index'], ['escape' => false]); ?>
                </li>
                <li>
                    <?= $this->Html->link('<div class="profil-navbar" style="background-image:url('.$imgProfils.');"></div>', ['controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->id], ['escape' => false]); ?>
                </li>
                <li>
                    <?= $this->Html->link($this->Html->image('icons/header/add.svg', ['alt' => 'ajouter un post']), ['controller' => 'Posts', 'action' => 'add'], ['class' => 'add', 'escape' => false]); ?>
                </li>
            </ul>
        </nav>
    </header>
    <?php endif ; ?>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
