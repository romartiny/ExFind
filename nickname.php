<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<?php?>
<?php require_once('includes/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>ExFind - find your username</title>
      <meta name="description" content="search over <?php echo $website['count2'];?>+ popular social networks to check if a username, product or brand exists." />
      <link href="<?php echo $website['url'];?>assets/css/styles.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />

   </head>
   <body>

      <div id="main">

         <div id="se-form-panel">
            <div class="row">
               <div class="col12">
                  <h1>
                  <?php  if (isset($_SESSION['username'])) : ?>
    	Welcome <i><?php echo $_SESSION['username']; ?></i>   <a href="index.php?logout='1'" style="color: white;"><img src="/assets/img/logout.png" width="20" 
   height="20" alt="logout"></a> </p>
    <?php endif ?>
                  </h1>
                  <h1>Check your nickname</h1>
                  <p>More then <i><?php echo $website['count2'];?>+</i> sites for check your nickname.</p>
               </div>
               <div class="col8">
                  <input type="text" placeholder="username here" />
               </div>
               <div class="col4">
                  <button>Check</button>
               </div>
            </div>
         </div>

         <div id="se-processing-panel">
            <div class="row">
               <div class="col12">
                  <h1>Checking <i>0%</i></h1>
                  <p>Checking <i>username</i> on <i>example.com</i></p>
               </div>
            </div>
         </div>

         <div id="se-results-panel">
            <div class="row">
               <div class="col12">
                  <h1>Checking stats <i>username</i></h1>
                  <p><i>username</i> contained on <i>0%</i> sites</p>
               </div>
               <div id="se-results-parent" class="col12 row">
               </div>
               <div class="col6 col6-ex">
                  <button>check another username</button>
               </div>
            </div>
         </div>
      </div>

      <script id="se-data" type="application/json"><?php echo json_encode(array($website['statuses'], $website['count']));?></script>
      <script src="<?php echo $website['url'];?>assets/js/javascript.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>
   </body>
</html>