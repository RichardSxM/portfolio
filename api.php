
<?php
    
    $weather = "";
    $error = "";
    
    if ($_GET['city']) {
        
     $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=65ed074f0892b8354fbffcfeca4ca821");
        
        $weatherArray = json_decode($urlContents, true);
        
        if ($weatherArray['cod'] == 200) {
        
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";

            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
            
        } else {
            
            $error = "Could not find city - please try again.";
            
        }
        
    }


?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Weather Scraper</title>
    <link rel="stylesheet" href="css/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
</head>

<body class="body">



<nav class="navbar navbar-expand-lg nav justify-content-between nav-bg" id="navbar-trans" >
  <a class="navbar-brand" href="index.php">PORTFOLIO</a>
    
<div class="icon-margin">
    <a class="i" href="https://www.facebook.com/SoTrvll"><i class="fab fa-facebook-f"></i></a>
    <a class="i" href="https://twitter.com/i3adassFOE"><i class="fab fa-twitter"></i></a>
    <a class="i" href="https://www.snapchat.com/add/aindaserious"><i class="fab fa-snapchat-ghost"></i></a>
    <a class="i" href="https://www.instagram.com/donlirpa/"><i class="fab fa-instagram"></i></a>
</div>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div id="navbarNav">
    <ul class="navbar-nav ml-auto " >        
     <li class="nav-item">
        <a class="nav-link" href="index.php"><img class="flags" src="img/englishflag.png"></a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="nl/index-nl.php"><img class="flags" src="img/netherlandsflag.jpg"></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lifeline.php">LIFELINE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="experiences.php">EXPERIENCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="badges.php">BADGES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="api.php">API</a>
      </li>
    </ul>
  </div>
</nav>
    
<div class="container">
    
    <h1>What's The Weather?</h1>
          
        
    <form>
        <fieldset class="form-group">
        <label for="city">Enter the name of a city.</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php echo $_GET['city']; ?>">
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      
    <div id="weather"><?php 
              
        if ($weather) {
                  
            echo '<div class="alert alert-success" role="alert">
            '.$weather.'</div>';
                  
        } else if ($error) {
                  
            echo '<div class="alert alert-danger" role="alert">
            '.$error.' </div>';
                  
        }
        ?>
    
    </div>
    
</div>
    
<?php include_once ('footer.php'); ?>

          
          
        
  