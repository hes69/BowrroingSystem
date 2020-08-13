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
  
<form class="navbar-form navbar-right">
      <div class="form-group">
           <?=  $this->Form->input('title');?>
        <input type="text"  placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>
    </nav>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
     
    <form class="navbar-form navbar-left">
         <div class="input-group">
                  <?= $this->Form->input('nams',['label' => '','placeholder'=>'Search']);?>
 <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
      </div>
      </div>
    </div>
  </div>
</nav>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<p>Animated search form:</p>

<form>
  <input type="text" name="search" placeholder="Search..">
</form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <form class="navbar-form navbar-left">
      <div class="input-group">
 <?= $this->Form->input('text',['class'=>'form-control','label'=>'','placeholder'=>'Search']);?>
        <div class="input-group-btn">
              
             <?= $this->Form->button(__('Search'),['class' => 'btn btn-default']) ?>
        
        </div>
      </div>
    </form>
  </div>
</nav>

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
 <?= $this->Form->input('text',['class'=>'form-control','label'=>'','placeholder'=>'Search']);?>
        <div class="input-group-btn">
              
             <?= $this->Form->button(__('Search'),['class' => 'btn btn-default']) ?>
        
        </div>
      </div>
    </form>
  </div>
    </nav>