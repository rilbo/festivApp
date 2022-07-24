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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php if ($this->request->getAttribute('identity') != null) :?>
    <header>
        <nav class="bottom-nav">
            <ul>
                <li><?= $this->Html->link('Home', ['controller' => 'Posts', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link('Search', ['controller' => 'Search', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link('Profil', ['controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->id]); ?></li>
                <li><?= $this->Html->link('Add', ['controller' => 'Posts', 'action' => 'add'], ['class' => 'add']); ?></li>
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
