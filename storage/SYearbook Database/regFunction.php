<?php 
session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
    }
    else{
    isset($_SESSION['Use']);
    isset($_SESSION['User']);
}
$mysqli = new mysqli('localhost', 'root', '', 'tests') or die(mysqli_error($mysqli));

#delete btn(new)

if(isset($_GET['editan'])){
	$EMAIL = $_GET['editan'];
  $Yrr = $_SESSION['Use'];
	$mysqli->query("DELETE FROM tbl_sybook WHERE sid = '$EMAIL' AND school_year = '$Yrr'") or die($mysqli->error());
  header("Location: index.php");
}
#delete Syearbook 
if(isset($_GET['delete'])){
  $id= $_GET['delete'];
  $mysqli->query("DELETE FROM folder2 WHERE id = '$id'") or die($mysqli->error());
  header("Location: path.php");
}

# Form update Syearbook image
if(isset($_GET['edit'])){
   $id=$_GET['edit'];
   $result = $mysqli->query("SELECT * FROM folder2 WHERE id = '$id'") or die($mysqli->error());
   while($row = $result->fetch_assoc()){
		echo "<html>";
		echo "<head>";
		echo "<title>Edit ".$row['year']."</title>";
		echo "<link rel='stylesheet' type='text/css' href='style2.css'>";
		echo "<style>";
		echo "* {
  margin: 0px;
  padding: 0px;
}
body {
margin-top:10px;	
  font-size: 120%;
  background-color:gray;
  font-family: 'Ubuntu', sans-serif;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #0275d8;
  text-align: center;
  border: 1px solid #0275d8;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
  font-family: 'Ubuntu', sans-serif;
}
.btn {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    
}
.error {
  width: 95%; 
  margin: 0px auto; 
  padding: 5px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
  font-family: 'Ubuntu', sans-serif;
  font-size: 13px;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
.button {
  border-radius: 25px;
  border:none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}

.button1 {background: linear-gradient(to right, red, red);} /* Green */
.button2 {background: linear-gradient(to right, #9C27B0, #E040FB);} /* Blue */
}";
echo "</style>";
		echo "</head>";
		echo "<body>";
		echo "<div class='header'>
    <h2>Edit Year ".$row['year']."</h2>
  </div>";
		echo "<form action='regFunction.php' method='POST'>";
		echo "<div class='card'>";
        echo "<div class='container'>";
        echo "<div class='input-group' align='center'>";
    //echo "<label>Choose Yearbook Front Page</label><input type='file' name='id2'></input>";
    echo "<label></label><input value='Hindi pa tapos jennifer' name='id' readonly></input>";
		echo "<label>Year</label><input value='" . $row['year'] ."' name='email' readonly></input>";
		echo "<button type ='submit' class='button button1' name='save'>SAVE</a></button>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
}
#update query update Syearbook image
if(isset($_POST['save'])){
  $id = $_POST['id'];
	//$file = $_POST['id2'];
	$year = $_POST['email'];

	$mysqli->query("UPDATE folder2 SET year='$year' WHERE id='$id'") or die($mysqli->error());
	echo "<script>alert('Edit Successfully!');window.location='path.php';</script>";
}
?>
