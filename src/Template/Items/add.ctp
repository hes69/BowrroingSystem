<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items') , ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan'), ['controller' => 'Loan', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loan', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
   <?php  echo $this->Form->create($item, ['type' => 'file']);   ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
       
      

       <?php
            echo $this->Form->input('title');
            echo $this->Form->input('quantity');
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true]);
            //echo $this->Form->input('avatar', array('type' => 'file'));
            echo $this->Form->input('photo', ['type' => 'file']);
           /// echo $this->Form->input('photo', array('type'=>'file'));
        ?>
        
    </fieldset>
  
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
