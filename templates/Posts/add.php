<?php

use phpDocumentor\Reflection\Types\Null_;
?>
<div id="header-custom">
    <div>
        <h2>Nouveaux post</h2>
    </div>
    <div>
        <a href="#" id="submit">Publier</a>
    </div>
</div>
<div class="preview posts-imgs">
</div>
<div>
<?= $this->Form->create($post, ['enctype'=>'multipart/form-data', 'class' => "addpost"]);?>
    <?= $this->Form->control('images[]', [ 'label' => 'Image', 'type' => 'file', 'multiple']); ?>
    <?= $this->Form->control('description', ['label' => 'Description']); ?>

    <?php $dataTab = array() ?>
    <?php foreach ($festivals as $festival): ?>
        <?php 
            $data = [
                'text' => $festival->title,
                'value' => $festival->id,
            ];   
            array_push($dataTab, $data);
        ?>
    <?php endforeach; ?>
    <?php $data = [
        'text' => 'Autre',
        'value' => 'new',
        'class' => 'other',
        ]; 
        array_push($dataTab, $data); 
    ?>

    <?= $this->Form->radio('id_festival',$dataTab)?> 
    <?= $this->Form->control('titleF', ['label' => false , 'class' => 'input-other']); ?>
    <?= $this->Form->control('date_festival', ['label' => 'Date de la photo', 'type' => 'date']); ?>
<?= $this->Form->end(); ?>
</div>
<?= $this->Html->script(['preview', 'submit']) ?>