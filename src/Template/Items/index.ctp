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
 <?= $this->Form->input('title',['class'=>'form-control','label'=>'','placeholder'=>'Title']);?>
        <div class="input-group-btn">
              
             <?= $this->Form->button(__('Search'),['class' => 'btn btn-default']) ?>
        
        </div>
      </div>
    </form>
  </div>
    </nav>

<nav class="large-2 medium-1 columns" id="actions-sidebar">
    <ul class="side-nav">
      
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan'), ['controller' => 'Loan', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loan', 'action' => 'add']) ?></li>
    </ul>
</nav>
 <div class="items index large-10 medium-8 columns content">

</div>
<div class="items index large-10 medium-8 columns content"> 
   <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->title) ?></td>
                <td><?= $this->Html->image('../files/Items/Photo/' .'/' . $item->photo, ['alt' => 'CakePHP']);?></td>
                <td><?= $this->Number->format($item->quantity) ?></td>
                <td><?= $item->has('category') ? $this->Html->link($item->category->type, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></td>
                <td><?= h($item->created) ?></td>
                <td><?= h($item->modified) ?></td>

                <td class="actions">

                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('loan'), ['controller'=>'loan','action' => 'add', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
