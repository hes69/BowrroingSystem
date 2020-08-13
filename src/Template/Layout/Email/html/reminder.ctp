

<?php

 

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
