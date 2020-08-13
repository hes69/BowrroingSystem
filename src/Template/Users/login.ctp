
<?= $this->Form->create() ?>

 <?= $this->Html->css('signin.css');?>
<div class="container">
    <div class="form-login">
        <h2 class="container-center">Login</h2>
  
      <?= $this->Form->input('email',['class'=>'form-control', 'placeholder'=>'Email address','label' => '']
) ?>
      
      <?= $this->Form->input('password',['class'=>'form-control', 'placeholder'=>'Password','label' => '']
) ?>
       
      <?= $this->Form->button('Login',['class'=>'btn btn-lg btn-primary btn-block'])
?>
    
   </div>
  </div>

<?= $this->Form->end() ?>

