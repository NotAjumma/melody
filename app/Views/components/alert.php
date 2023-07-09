<div class="alert" id="alert-div">
  
<div style="margin: 0 auto; width: 50%;">
  <span class="closebtn" onclick="hideAlert()">&times;</span> 
  <div style="">
    <strong>Sorry!</strong> <?php echo $alertBody?>
  </div>
</div>
</div>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script>
  function hideAlert(){
    console.log("alert");
    // var alertDiv = document.getElementsById("alert-div");
   var alertDiv = document.getElementById("alert-div");

    alertDiv.style.display = "none";
  }
</script>