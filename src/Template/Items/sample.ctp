

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 <?php echo $this->Form->create('item',array('class'=>'form-horizontal','role'=>'form','type'=>'file')); ?>

 <?php echo $this->Form->input("photo",array("type"=>"file","size"=>"45", 'error' => false,'placeholder'=>'Upload Image'));?>
 <?php  echo $this->Form->submit('Save', array('name'=>'submit', 'div'=>false)); ?>
 <?php echo $this->Form->end(); 
