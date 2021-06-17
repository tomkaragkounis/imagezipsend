<?php /* Template Name: Paomei */ ?>
<?php get_header(); ?>

<!doctype html>
<html lang="en">
  <head>
      <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    
   
<link rel="stylesheet" href="https://www.dropzonejs.com/css/dropzone.css" />

<script src="https://www.dropzonejs.com/js/dropzone.js"></script>
    <title>Hello, world!</title>
  </head>
  
  <body>
    
    
<style>
    .dropzone {
    margin-top: 5vh;
    border: 2px dashed #0087F7;
    border-radius: 5px;
    background: white;
}

</style>




<?php $orderid = $_GET["order-id"];

$servername = "localhost";
$username = "***";
$password = "***";
$dbname = "***";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, quantity FROM printphoto WHERE order_id=$orderid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
    
    $x=$row["quantity"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<input type="hidden" id="quant" value="<? echo $x; ?>"></input>



 <div class="container" >
  <div class='content'>
   <form action="https://printphoto.pcinfo.work/wp-content/themes/enzy-child/upload2.php" class="dropzone" id="dropzonewidget">
       <input type="hidden" name="order_id" id="order_id" value="<? echo $orderid;?>">
       </form> 
       <script>
var x = document.getElementById("quant").value;

 Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
 addRemoveLinks: true,
  maxFiles: x,
 removedfile: function(file) {
   var name = file.name; 
   
   $.ajax({
     type: 'POST',
     url: 'https://printphoto.pcinfo.work/wp-content/themes/enzy-child/upload2.php',
     data: {name: name,request: 2},
     sucess: function(data){
        console.log('success: ' + data);
     }
   });
   var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
 }
});
</script>

 <div class="zip-move-thanks">
        <center><div class="qmax">Μπορείτε να ανεβάσετε <strong><?php echo $x;?></strong> φωτογραφίες </div>
     
         <form target="_blank" action="https://printphoto.pcinfo.work/oloklirosi-apostolis/" method="GET">
          <input type="hidden" name="order-id" id="order-id" value="<?php echo $_GET["order-id"];?>">
          <input type="submit" value="ΟΛΟΚΛΗΡΩΣΗ">
        </form></center>
        
     
 </div>
   
  </div> 
 </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php get_footer(); ?>
