<div class="back">
    <?= $this->Html->image('logo/logo-w-l.svg', ['alt' => 'Logo FestivApp']); ?>
    <div class="prez">
        <h1><?= $title ?></h1>
        <p><?= $desc ?></p> 
    </div>
    <div class="connect">
        <?= $this->Html->link('Se connecter',['controller' => 'Users', 'action' => 'login', '_full' => true],['class' => 'btn']);?>
        <?= $this->Html->link('S\'inscrire',['controller' => 'Users', 'action' => 'signup', '_full' => true], ['class' => 'btn']);?>
    </div>
    <div class="copyright">
        <p>Copiright 2022 - Festiv'App </p>
    </div>
</div>

