<?= $this->Html->image('logo/logo-b-l.svg', ['alt' => 'Logo FestivApp']); ?>
<?= $this->Form->create($user);?>
    <h1>Créer un compte</h1>
    <?= $this->Form->control('pseudo'); ?>
    <?= $this->Form->control('firstname', [ 'label' => 'Prénom']); ?>
    <?= $this->Form->control('lastname', [ 'label' => 'Nom']); ?>
    <?= $this->Form->control('email', [ 'label' => 'Adresse mail']); ?>
    <?= $this->Form->control('password', ['type' => 'password', 'label' => 'Mot de passe']);?>
    <?= $this->Form->control('password_confirm', ['type' => 'password', 'label' => 'Confirmer le mot de passe']);?>
    <?= $this->Form->button('S\'inscrire');?>
<?= $this->Form->end(); ?>