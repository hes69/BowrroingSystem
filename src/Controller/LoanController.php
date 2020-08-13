<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\I18n\Time;
//Time::$defaultLocale = 'de-DE';
/**
 * Loan Controller
 *
 * @property \App\Model\Table\LoanTable $Loan
 */
class LoanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
                $this->viewBuilder()->layout('forsearch');

        $this->paginate = [
            'contain' => ['Items', 'Users']
        ];    
         $loan = $this->paginate($this->Loan);
         if ($this->request->is('get'))
        {
             if (empty($_GET))
               {
                
                 $loan= $this->Loan->find()->contain(['Items','Users']);
                 }
                 else 
                 {         
                     $q= $this->request->data['id'];          
                     $loan = $this->Loan->find()->contain(['Items','Users'])->where (['loan.id' =>  $q]);
                 }
                  }
          
           //$result = $this->Items->find()->where (['items.title' =>  $q]);
        
 else {
             $loan= $this->Loan->find()->contain(['Items','Users']);
      }
      
        
///        $loan = $this->paginate($this->Loan);
        $this->set(compact('loan'));
        $this->set('_serialize', ['loan']);
    }
    /**
     * View method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loan->get($id, [
            'contain' => ['Items', 'Users']
        ]);
        $this->set('loan', $loan);
        $this->set('_serialize', ['loan']);
    }
    public  function returnitem($id = null)
    {      
      $loan = $this->Loan->get($id, [
            'contain' => []
        ]);
      $x=$loan->item_id;
   if ($loan->Return_item==true)
      {   
            $this->Flash->success(__('The loan has allready returned.'));
            return $this->redirect(['action' => 'index']);
      }
        if ($this->request->is(['patch', 'post', 'put'])) {
       //   $h= $this->request->data['item_id'];
        $loan = $this->Loan->patchEntity($loan, $this->request->data); 
        if ($this->Loan->save($loan)) {
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable->get($x); // Return article with id 12
        $item->quantity = $item->quantity+1;
        $itemsTable->save($item);
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            } }
        $items = $this->Loan->Items->find('list', ['limit' => 200]);
        $users = $this->Loan->Users->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'items', 'users'));
        $this->set('_serialize', ['loan']);
 }
          
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function  search ()
    {   
        $loan = $this->Loan->find()
        ->where(['Loan.item_id' => 102]);   
        // debug($loan->due_date);
        //->isWithinNext('2 weeks');
        //debug($query);
        ///$dStart = new \DateTime($now);
        //$time = new Time('2014-06-15');
        //$time->modify('+5 days');
        // debug($time);
        //$time = Time::now();
        ///$time = new Time('2016-12-1');
        //echo $time->isWithinNext(2);
        //if ($time->isToday()) {
        // Greet user with a happy birthday message
        //  $this->Flash->success(__('Happy birthday to you...'));
        // }
        //echo $time->isThisWeek();
        ///echo $time->isThisMonth();
        //echo $time->isThisYear()
        // Within 2 days.
        //debug( $time->isWithinNext(2));
        //$time = new Time('2014-06-15'); 
        //echo $time->isWithinNext('2 weeks');       
        foreach ($loan as $it):
        $t=new Time($it->due_date);
        $userId=$it->user_id;
        $itemId=$it->item_id;
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable->get($itemId); 
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($userId);
        
         $userDataArr = array(
         'userData'=>$user,
         'itemData' => $item,
         'loanData' => $it
      );
            if($t->isWithinNext(1) and $it->Return_item==false )
            {
                 $email = new Email();
                 $email->template('reminder', 'default')
                 ->emailFormat('html')
                 ->to($user->email)
                 ->from(['farajihesam166@gmail.com' => 'Fhkiel'])
                 //->from('farajihesam166@gmail.com')
                 ->subject('Booking Confirmation')
                 ->viewVars($userDataArr)
                 ->send();
            }
           else                    
            {
                
            }
            //debug($it->due_date->time);
            //$times =$it->due_date; 
            endforeach;
        
               
           //debug($times->isWithinNext(2));
        
        
        
        // debug($times->isWithinNext(2));
        // $times;
        // foreach ($times as $time): 
        // echo $time ;
        // endforeach;
        // debug($times->isWithinNext(2));
        // debug( $time->isWithinNext(2));
        // {
        //  echo hello;
        // }       
        //  endforeach;
        // $loan = $this->paginate($this->Loan);
        // $loan = $this->Loan->newEntity();
        // $loan = $this->Loan->contain(['Items']);
        // $this->loan->id = 5;
        //$query = $this->Loan->find()
        //->where(['Loan.item_id' => $id]);
        //->contain(['Items']);
        // ->limit(10);  
        // $itemsTable = TableRegistry::get('Items');
        // $item = $itemsTable->get(96); // Return article with id 12
        // $item->quantity = $item->quantity-1;
        ////$itemsTable->save($item);
        //$loan=$this->Loan->find()->contain(['Items'])->where(['item_id'=>94]);
        //$this->loan->id = 8;
        // This avoids the query performed by read()
        //$this->loan->saveField('item_id', 95);
        // $qua=$this->loan->Items->quantity;
        //debug($qua);
        //if ($this->request->is('post'))
        //  {
        ///$this->loan->id = 8;
        // This avoids the query performed by read()
        //     $this->loan->saveField('item_id', 95);
        //}
        $this->set(compact('times'));
        $this->set('_serialize', ['times']);
        //debug($query);
        //$query = $loan->find()->contain([
        //'Comments']->where(['loan.item_id' => true]);
    

        }
        public function add($id=null)
        {
        
        $this->paginate = [
            'contain' => ['Items', 'Users']
        ];
       

       $loan = $this->Loan->newEntity();
   
        if ($this->request->is('post')) {
          $h= $this->request->data['item_id'];
          $userId= $this->request->data['user_id'];
   
        $loan = $this->Loan->patchEntity($loan, $this->request->data);
        /// debug($this->loan->item_id);   
        if ($this->Loan->save($loan)) {
        $this->Flash->success(__('The loan has been saved.'));
        $lo=$loan->id;
       
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable->get($h); // Return article with id 12
        $item->quantity = $item->quantity-1;
        $itemsTable->save($item);
         
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($userId);
                  
      $userDataArr = array(
     'userData'=>$user,
     'itemData' => $item,
     'loanData' => $loan
      );
     $email = new Email();
     $email->template('confirm', 'default')
    ->emailFormat('html')
    ->to($user->email)
    ->from(['farajihesam166@gmail.com' => 'Fhkiel'])
    ->subject('Booking Confirmation')
    ->viewVars($userDataArr)
    ->send();
  
      
        return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
        $loan->selectedValue = $id;
        $items = $this->Loan->Items->find('list', ['limit' => 200]);
        $users = $this->Loan->Users->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'items', 'users','lo'));
        $this->set('_serialize', ['loan']);
    }
    public function preloan($id=null)
        {
        
        $this->paginate = [
            'contain' => ['Items', 'Users']
        ];
         $ordersTable = TableRegistry::get('Orders');
         $order = $ordersTable->get($id);

         $loan = $this->Loan->newEntity();
   
        if ($this->request->is('post')) {
          $h= $this->request->data['item_id'];
          $userId= $this->request->data['user_id'];
          $loan->user_id=$order->user_id;
          $loan->item_id=$order->item_id;
          $loan = $this->Loan->patchEntity($loan, $this->request->data);
          /// debug($this->loan->item_id);   
          if ($this->Loan->save($loan)) {
          $this->Flash->success(__('The loan has been saved.'));
          $lo=$loan->id;
       
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable->get($h); // Return article with id 12
        $item->quantity = $item->quantity-1;
        $itemsTable->save($item);
         
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($userId);
                  
     $userDataArr = array(
     'userData'=>$user,
     'itemData' => $item,
     'loanData' => $loan
      );
     $email = new Email();
     $email->template('confirm', 'default')
    ->emailFormat('html')
    ->to($user->email)
    ->from(['farajihesam166@gmail.com' => 'Fhkiel'])
    ->subject('Booking Confirmation')
    ->viewVars($userDataArr)
    ->send();
  
      
        return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
        $loan->selectedValue = $order->item_id;
        $loan->selectedId = $order->user_id;
        $loan->selectedDate = $order->borrow_date;
        
        $items = $this->Loan->Items->find('list', ['limit' => 200]);
        $users = $this->Loan->Users->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'items', 'users','lo'));
        $this->set('_serialize', ['loan']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {  
       // $loan = $this->Loan->id=5;
         // $loan = $this->Loan->find()->where (['Loan.id' =>  $id]);
      //  $loan = $this->Loan->get($id, [
        //   'contain' => []
      // ]);
          //debug(loan);
            $loan = $this->Loan->get($id, [
            'contain' => []
        ]);
            
  
       // debug( $q= $this->loan['id']);
        //debug($loan->item_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loan->patchEntity($loan, $this->request->data);
            if ($this->Loan->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            } }
        $items = $this->Loan->Items->find('list', ['limit' => 200]);
        $users = $this->Loan->Users->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'items', 'users'));
        $this->set('_serialize', ['loan']);
    }
  public function logout()
{
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout());
}
    
    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loan->get($id);
        if ($this->Loan->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
