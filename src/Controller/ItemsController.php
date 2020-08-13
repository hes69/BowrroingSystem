<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;

  
/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{
    //public $components =array('Session');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('forsearch');
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $items = $this->paginate($this->Items);
         if ($this->request->is('get'))
        {
             if (empty($_GET))
               {
                
                 $items= $this->Items->find()->contain(['Categories']);
                 }
                 else 
                 {         
                     $q= $this->request->data['title'];          
            $items = $this->Items->find()->contain(['Categories'])->where (['items.title' =>  $q]);
  }
}
          
           //$result = $this->Items->find()->where (['items.title' =>  $q]);
        
 else {
             $items= $this->Items->find()->contain(['Categories']);
      }
    // no data passed by
      ///= $this->Items->find(all)->contain(['Categories'];
        //$this->request -> session() -> write('pizza.ew', 'tyutyu');
        //$this -> Session -> write('pizza.ew', 'tyutyu');
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
        
    }

    public function userview()
    {
       //// $this->set('groups', $this->User->Group->find('list'));
        $this->viewBuilder()->layout('forsearch');

        $this->paginate = [
            'contain' => ['Categories']
        ];
        $items = $this->paginate($this->Items);
        
 if ($this->request->is('post'))
        {
           $q= $this->request->data['title'];
           $h= $this->request->data['category_id'];
           //$result = $this->Items->find()->where (['items.title' =>  $q]);
$items = $this->Items->find()->contain(['Categories'])->where (['items.title' =>  $q ])
                    ->orWhere(['items.category_id' =>  $h]);        }
 else {
             $items= $this->Items->find()->contain(['Categories']);
        
      }
       $categories = $this->Items->Categories->find('list', ['limit' => 200]);

        $this->set(compact('categories'));
 
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }
    
    public function test()
    {
       // debug($this->request->query);
      //  debug($this->request -> session() -> read('item'));      
      // $this->set(compact('items'));
        //$this->set('_serialize', ['items']);*/
      //   $item = $this->Items=
        //    ['contain' => ['Ctegories', 'Users']];
      
               // ->where(['Items.category_id' => 2])
                //->contain(['Categories']);
        
     
             $items= $this->Items->find()->contain(['Categories']);
        

            //    $categories = $this->Items->Categories->find('list', ['limit' => 200]);

        //  $items = $this->Items->find()->contain(['Categories'])->where (['items.category_id' =>  3]);
          // $category = $this->Items->Categories->find('all', ['limit' => 200])->contain(['Items']);
          // debug($categories);
          $this->set(compact('items'));
         // $this->set(compact('categories'));
          $this->set('_serialize', ['items']);
    }
    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Categories', 'Loan']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            //debug($this->request);
              $item = $this->Items->patchEntity($item, $this->request->data);
            
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);
        $this->set(compact('item', 'categories'));
        $this->set('_serialize', ['item']);
    }  
    public function finder()
    {  
          $this->paginate = [
            'contain' => ['Categories']
        ];
            $items = $this->paginate($this->Items);
        ///$result=null;
      //  debug($this->request->query);
        if ($this->request->is('post'))
        {
           $q= $this->request->data['title'];
           $h= $this->request->data['category_id'];

           //$result = $this->Items->find()->where (['items.title' =>  $q]);
           $items = $this->Items->find()->contain(['Categories'])->where (['items.title' =>  $q ])
                    ->orWhere(['items.category_id' =>  $h]);
        }
 else {
             $items= $this->Items->find()->contain(['Categories']);
      ///= $this->Items->find(all)->contain(['Categories'];
 }
   // $query = $this->Items->find('search', ['search' => $this->request->query])        
     //   ->where(['title IS NOT' => null]);
     //$this->set('items', $this->paginate($query));
     ///debug($this->items);
    //$this->Session->write('book', 'Green');
    // CakeSession::flash('hi');
///$this->Session->flash();
     //CakeSession::write('Config.language', 'eng');
     //$this->request -> session() -> write('item', $query);
      //$this->request->session()->write('items', $query);
    //$this->redirect(array('action' => 'test','finder' ));
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);

        $this->set(compact('categories'));
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
      //$this->set(compact('result'));
      //$this->set('_serialize', ['result']);
    }
    public function isAuthorized($user)
{
    // All registered users can add articles
    if ($this->request->action === 'userview') {
        return true;
    }
    
    
    
    return parent::isAuthorized($user);
}
    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200]);
        $this->set(compact('item', 'categories'));
        $this->set('_serialize', ['item']);

    }
    public function logout()
{
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout());
}
    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
