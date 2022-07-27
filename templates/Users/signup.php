<div id="login_signin">
    <?= $this->Html->image('logo/logo-b-l.svg', ['alt' => 'Logo FestivApp']); ?>
    <div class="signup">
        <?= $this->Form->create($user);?>
            <h1>Créer un compte</h1>
            <?= $this->Form->control('pseudo'); ?>
            <div class="identity">
                <?= $this->Form->control('firstname', [ 'label' => 'Prénom']); ?>
                <?= $this->Form->control('lastname', [ 'label' => 'Nom']); ?>
            </div>
            <?= $this->Form->control('email', [ 'label' => 'Adresse mail']); ?>
            <?= $this->Form->control('password', ['type' => 'password', 'label' => 'Mot de passe']);?>
            <?= $this->Form->control('password_confirm', ['type' => 'password', 'label' => 'Confirmer le mot de passe']);?>
            <?= $this->Form->control('S\'inscrire', ['class' => 'btn', 'type' => 'submit']);?>
        <?= $this->Form->end(); ?>
    </div>
    
    <div class="copyright">
        <p>Copiright 2022 - Festiv'App </p>
    </div>
</div>