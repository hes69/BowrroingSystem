    <?= $this->Html->css('searchbar.css');?>
<nav class="navbar navbar-dark" style="background-color:#000080;">
  <div class="container-fluid" >
    <div class="navbar-header" >
      <a class="navbar-brand" style="color:	#F0F8FF		;"  href="#">Borrowing System</a>
    </div>
    <ul class="nav navbar-nav" >
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
<li><?=$this->Html->link(
    'Logout',
    ['action' => 'logout'],
   ['span class'=>'glyphicon glyphicon-log-out', 'target' => '_blank']
        );?></li>
    </ul>
       <form class="navbar-form navbar-left">
      <div class="input-group">
 <?= $this->Form->input('id',['class'=>'form-control','label'=>'','placeholder'=>'Id']);?>
        <div class="input-group-btn">
              
             <?= $this->Form->button(__('Search'),['class' => 'btn btn-default']) ?>
        
        </div>
      </div>
    </form>
  </div>
    </nav>


<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="loan index large-10 medium-8 columns content">
  
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('borrow_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Return_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loan as $loan): ?>
            <tr>
                <td><?= $this->Number->format($loan->id) ?></td>
                <td><?= $loan->has('item') ? $this->Html->link($loan->item->title, ['controller' => 'Items', 'action' => 'view', $loan->item->id]) : '' ?></td>
                <td><?= $loan->has('user') ? $this->Html->link($loan->user->email, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
                <td><?= h($loan->borrow_date) ?></td>
                <td><?= h($loan->due_date) ?></td>
                <td><?= h($loan->return_date) ?></td>
                <td><?= h($loan->Return_item) ?></td>
                <td><?= h($loan->created) ?></td>
                <td><?= h($loan->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Return'), ['action' => 'returnitem', $loan->id]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
