<div id="header-custom">
    <div>    
        <h2>Tableau de bord</h2>
        <p>@<?= $user->pseudo ?>-Admin</p>
    </div>
    <div>
    <?= $this->Html->link('Quitter', ['controller' => 'Users', 'action' => 'view', $user->id]); ?>
    </div>
</div>
<div id="stats">
    <!-- Nombre de publication totals -->
    <div>
        <h3><?= $postsCount ?></h3>
        <p>Publications</p>
    </div>
    <!-- Nombre d'inscrit total -->
    <div>
        <h3><?= $usersCount ?></h3>
        <p>Utilisateurs</p>
    </div>
</div>
<!-- Ajouter un festivals -->
<div id="add-festival">
    <?= $this->Html->link('Ajouter un festival', ['controller' => 'Festivals', 'action' => 'add', '_full' => true,], ['class' => "btn"]);?>
</div>
<!-- request utilisateur qui veulent qu'on ajoute des festivals non existant -->
<div id="requests">
    <h2>Requêtes utilisateurs</h2>
    <?php foreach($requests as $request) : ?>
        <div class="request">
            <div>
                <p><?= $request->content ?></p>
            </div>
            <div>
                <?= $this->Html->link('Ajouter', ['controller' => 'Festivals', 'action' => 'edit', $request->id_festival], ['escape' => false]); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>