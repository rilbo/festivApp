<?= $this->Form->create($user);?>
    <h1>Créer un compte</h1>
    <?= $this->Form->control('pseudo'); ?>
    <?= $this->Form->control('firstname'); ?>
    <?= $this->Form->control('lastname'); ?>
    <?= $this->Form->control('email'); ?>
    <?= $this->Form->control('password', ['type' => 'password', 'label' => 'Mot de passe']);?>
    <?= $this->Form->button('S\'inscrire');?>
<?= $this->Form->end();?>