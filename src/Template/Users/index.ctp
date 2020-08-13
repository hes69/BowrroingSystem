
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
 <?= $this->Form->input('email',['class'=>'form-control','label'=>'','placeholder'=>'Email']);?>
        <div class="input-group-btn">
              
             <?= $this->Form->button(__('Search'),['class' => 'btn btn-default']) ?>
        
        </div>
      </div>
    </form>
  </div>
    </nav>


<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Role'), ['controller' => 'Role', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Role', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan'), ['controller' => 'Loan', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loan', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="users index large-10 medium-8 columns content">

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>             
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->firstname) ?></td>
                 <td><?= h($user->lastname) ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->type, ['controller' => 'Role', 'action' => 'view', $user->role->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                     <?= $this->Html->link(__('loan'), ['controller'=>'loan','action' => 'add', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
