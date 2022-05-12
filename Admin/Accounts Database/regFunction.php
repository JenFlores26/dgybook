<?php 
session_start();

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
    }
    else{
    isset($_SESSION['User2']);
}
$mysqli = new mysqli('localhost', 'root', '', 'tests') or die(mysqli_error($mysqli));

#delete btn(new)

if(isset($_GET['email'])){
    $file = $_GET['email'];
    $que = "SELECT * FROM tbl_accounts WHERE email = '$file'";
  $cre = mysqli_query($mysqli, $que);
  $dre = mysqli_fetch_array($cre);
  $Yrr = $_SESSION['Use'];
  $path = "../../DB/" . $dre['profile_image'];
  if (!unlink($path)) {
    echo "<script>alert('You already delete it.');window.location='index.php';</script>";
  }
  else{
  $mysqli->query("DELETE FROM tbl_accounts WHERE email = '$file'") or die($mysqli->error());
  header("Location: index.php");
}
}

#edit btn(new)
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
  $dte = date("Y");
	$result = $mysqli->query("SELECT * FROM tbl_accounts WHERE email = '$id'") or die($mysqli->error());
	while($row = $result->fetch_assoc()){
		echo "<html>";
		echo "<head>";
		echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta charset='UTF-8'>
    <title>Edit Info</title>
    <link rel='stylesheet' type='text/css' href='style.css'>";
		echo "<style>";
		echo ".container{
          margin-top: 0;
          }
           form .button input{
           height: 100%;
           width: 45%;
           border-radius: 5px;
           border: none;
           color: #fff;
           font-size: 18px;
           font-weight: 500;
           letter-spacing: 1px;
           cursor: pointer;
           transition: all 0.3s ease;
           background: #0276d8;
         }";
echo "</style>";
		echo "</head>";
		echo "<body>";
		echo "<div class='container'>
           <div class='title'>Edit Info</div>
           <br>
            <div class='content'>
        <form action='s.php' method='post'>
        <div align='center'>";
        echo '<center><img class="imahe" style="width:100px; height:120px;" src="../../DB/'.$row['profile_image'].'"/></center><br>
        <input type="text" name="id" value="'.$id.'" placeholder="Email or Phone" style="display:none;"><br>
          
        </div>
        <div align="center" class="user-details">';
        echo "
          <div style='width:100%' class='input-box'>
            <span class='details'>Enabled?</span>
            <select name='title' style='width: 70%;' value='".$row['is_disabled']."'>
            <option value='Yes'><b>Yes</b></option>
            <option value='No'><b>No</b></option>
            </select>
          </div>
          </div>
          <center>
          <div class='button'>
            <input type='submit' name='save2' value='save'>
            <a href='index.php'><input type='button' style='background-color:red' value='Cancel'></a>
          </div>
          </center>
        </form>
      </div>
    </div>";
		echo "</body>";
		echo "</html>";
	}
}
?>
