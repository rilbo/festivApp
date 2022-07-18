<div id="login_signin">
    <div class="login">
        <?= $this->Form->create()?>
            <h1>Se connecter</h1>
            <?= $this->Form->control('pseudo')?>
            <?= $this->Form->control('password')?>
            <?= $this->Form->button('Se connecter')?>
        <?= $this->Form->end()?>
        <!-- Si vous n'avez pas de compte -->
        <p>
            <?= $this->Html->link('S\'inscrire', ['controller' => 'Users', 'action' => 'signup']); ?>
        </p>
    </div>
</div>