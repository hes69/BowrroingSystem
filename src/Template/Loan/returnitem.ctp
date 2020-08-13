<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loan'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loan form large-9 medium-8 columns content">
    <?= $this->Form->create($loan) ?>
    <fieldset>
        <legend><?= __('Return Loan') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items, 'disabled' => 'disabled']);
            echo $this->Form->input('user_id', ['options' => $users, 'disabled' => 'disabled']);
            echo $this->Form->input('borrow_date', ['empty' => true, 'disabled' => 'disabled']);
            echo $this->Form->input('due_date', ['empty' => true, 'disabled' => 'disabled']);
            echo $this->Form->input('return_date', ['empty' => true,'required' => true]);
            echo $this->Form->input('Return_item',['required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


