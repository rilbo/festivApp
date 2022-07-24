<div>
    <?= $this->Html->image('logo/logo-w-l.svg', ['alt' => 'Logo FestivApp']); ?>
    <h1><?= $title ?></h1>
    <p><?= $desc ?></p> 
    <div>
        <?= $this->Html->link('Se connecter',['controller' => 'Users', 'action' => 'login', '_full' => true]);?>
        <?= $this->Html->link('S\'inscrire',['controller' => 'Users', 'action' => 'signup', '_full' => true]);?>
    </div>
</div>
