 <div class="items index large-3 medium-8 columns content">
 <?php
    echo $this->Form->create();
 
echo $this->Form->input('title');
echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true]);

     echo  $this->Form->button(__('Submit')) ;
     echo   $this->Form->end() ;
     ?>
     </div>
     <div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                  <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                
                <td><?= $this->Html->image('../files/Items/Photo/' .'/' . $item->photo, ['alt' => 'CakePHP']);?></td>
                <td><?= h($item->title) ?></td>
                <td><?= $this->Number->format($item->quantity) ?></td>
            
                <td><?= $item->has('category') ? $this->Html->link($item->category->type, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></td>
                <td><?= $item->has('category') ? $this->Html->link($item->category->description, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
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
     
     
     
     
     
     
     
     
     
   