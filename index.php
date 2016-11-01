<?php
require_once('connect.php');

if(isset($_GET['id'])){
  
  $short_url = $_GET['id'];

  $select = "SELECT url_lung, url_scurt FROM main_table where url_scurt='". $short_url."'";

  $long_url = $conn->query($select)->fetch_object()->url_lung;

  header("Location: ".$long_url);

} else {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Short URL Generator</title>
	<link rel="stylesheet" href="css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script>

  $(document).ready(function(){
    $("#shorten_url").click(function(){
      var long_url = $("#long_url").val();
// url , data(json), callback 
      $.post("shorten.php",
      {                              
        long_url_post: long_url
      },
      function(data,status) {
        $("#short_url").val(data);
      }
      );

    });
  });
  </script>

</head>
<body>


<div class="login-form">
  <div class="field">
     <input type="text" placeholder="Longer URL" id="long_url" name="long_url">
  </div>
  <div class="field with-btn">
    <input type="text" placeholder="Shorten URL" id="short_url" name="shorten">
  </div>
  <button id="shorten_url">Generate</button>
</div>


    
</body>
</html>

<?php 
}
?>