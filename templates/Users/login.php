<div id="login_signin">
    <?= $this->Html->image('logo/logo-b-l.svg', ['alt' => 'Logo FestivApp']); ?>
    <div class="login">
        <?= $this->Form->create()?>
            <h1>Se connecter</h1>
            <?= $this->Form->control('pseudo', [ 'label' => 'Pseudo'])?>
            <?= $this->Form->control('password', [ 'label' => 'Mot de passe'])?>
            <?= $this->Form->control('Se connecter', ['class' => 'btn', 'type' => 'submit'])?>
        <?= $this->Form->end()?>
    </div>
    <div class="copyright">
        <p>Copiright 2022 - Festiv'App </p>
    </div>
</div>