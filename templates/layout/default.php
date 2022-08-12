<?php
$cakeDescription = "Festiv'app";
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
    
    <?php
        $apple = $this->Html->Url->Build('/favicon/apple-touch-icon.png');
        $icon32 = $this->Html->Url->Build('/favicon/favicon-32x32.png');
        $icon16 = $this->Html->Url->Build('/favicon/favicon-16x16.png');
        $maskIcon = $this->Html->Url->Build('/favicon/safari-pinned-tab.svg');
    ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $apple ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $icon32 ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $icon16 ?>">
    <link rel="mask-icon" href="<?= $maskIcon ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <link rel="manifest" href="/site.webmanifest">

    <script>
        if ('serviceWorker' in navigator) {
            console.log('je suis dans le service worker');
            navigator.serviceWorker.register('/sw.js');
        }
    </script>
    
</head>
<body>
    <?php if ($this->request->getAttribute('identity') != null) :?>
    <?php $imgProfils = $this->Html->Url->Build('/img/pictures/profils/'.$this->request->getAttribute("identity")->picture); 
    $url = $_SERVER['REQUEST_URI']; 
    $url = explode('/', $url);
    $supp = array_pop($url);
    // array to string
    $url = implode('/', $url);
    ?>
    <?php if($url != "/comments/view"):?>
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
    <?php endif;?>
    
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
