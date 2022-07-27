<div>
<div class="preview posts-imgs">
</div>
<div>
    <?= $this->Form->create($post, ['enctype'=>'multipart/form-data']);?>
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
        <?= $this->Form->button('Publier');?>
    <?= $this->Form->end(); ?>
</div>
    
</div>
<?= $this->Html->script(['preview']) ?>