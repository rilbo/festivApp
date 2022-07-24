<div id="login_signin">
    <div class="login">
        <?= $this->Html->image('logo/logo-b-l.svg', ['alt' => 'Logo FestivApp']); ?>
        <?= $this->Form->create()?>
            <h1>Se connecter</h1>
            <?= $this->Form->control('pseudo', [ 'label' => 'Pseudo'])?>
            <?= $this->Form->control('password', [ 'label' => 'Mot de passe'])?>
            <?= $this->Form->button('Se connecter')?>
        <?= $this->Form->end()?>
        <!-- Si vous n'avez pas de compte -->
        <p>
            <?= $this->Html->link('S\'inscrire', ['controller' => 'Users', 'action' => 'signup']); ?>
        </p>
    </div>
</div>