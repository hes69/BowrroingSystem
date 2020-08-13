<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
<head>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
    <h1>Reminder</h1>
    <h3>Dear <?php echo $userData->firstname ?> </h3>
    <p>you borrow <?php echo $itemData->title ?>with booking id <?php echo $loanData->id ?>  
     make sure you return item before
    <?php echo $loanData->due_date ?>
    </p>  
    
    
    thank you for your booking <br>
     
  
    <?= $this->fetch('content') ?>
</body>
</html>
