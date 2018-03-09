<?php
include("inc/functions.php");
$conn = connectToDB();

// define variables and set to empty values
$firstnameerror = "";
$lastnameerror = "";
$emailErr = "";
$websiteErr = "";
$commentErr = "";
$messageTitleErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["firstname"])) {
$firstnameerror = "First name must be filled in!";
  }
if (empty($_POST["lastname"])) {
$lastnameerror = "Last name must be filled in!";
  }
if (empty($_POST["email"])) {
$emailErr = "Email must be filled in!";
  }
if (empty($_POST["website"])) {
$websiteErr = "";
  }
if (empty($_POST["comment"])) {
$commentErr = "You must place a comment!";
  }
if (empty($_POST["messageTitle"])) {
$messageTitleErr = "Please enter your title";
  }
else {
if(isset($_POST['mySubmit']))
  {
$firstName    = $_POST['firstname'];
$Insertion    = $_POST['Insertion'];
$lastName     = $_POST['lastname'];
$messageTitle = $_POST['messageTitle'];
$comment      = $_POST['comment'];
$email        = $_POST['email'];
$website      = $_POST['website'];

$sql="INSERT INTO `guestbook` (firstName,Insertion,lastName,comment,email,website,messageTitle) VALUES ('$firstName','$Insertion', '$lastName','$comment', '$email','$website','$messageTitle')";

$result = $conn->query($sql) or die($conn->error);
if($result){
echo '<span style="color:white;text-align:center;">Succesfull post!</span>';
echo "<BR>";
   }
  }
 }
}

?>
<!DOCTYPE html>
<header>
  <meta charset="utf-8">
  <meta name="description" content="GuestBook">
  <meta name="author" content="Alper Kuyumcu">
  <meta name="keywords" content="HTML,CSS,SQL,PHP">
  <meta name="copyright" content="ROC Ter AA">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</header>

<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
<tr>

<td><div id="title">Sign in Guestbook </div></td>

</tr>
</table>
<br>
<html>
<body>

<form class="firstname" action="index.php" method="post">
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td>
<table width="700" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="120">First name</td>
<td width="14">:</td>
<td width="357"><input name="firstname" type="text"  size="40" /><span class="error">* <?php echo $firstnameerror;?></span></td>
</tr>

<tr>
  <td width="120">Insertion</td>
  <td width="14">:</td>
  <td width="357"><input name="Insertion" type="text"  size="40" /></td>
</tr>

<tr>
  <td width="117">Last name</td>
  <td width="14">:</td>
  <td width="357"><input name="lastname" type="text" size="40" /><span class="error">* <?php echo $lastnameerror;?></span></td>
</tr>

<tr>
  <td>Email</td>
  <td>:</td>
  <td><input name="email" type="text" id="email" size="40" /><span class="error">* <?php echo $emailErr;?></span></td>
</tr>

<tr>
  <td>Website</td>
  <td>:</td>
  <td><input name="website" type="text" id="website" size="40" /></td>
</tr>

<tr>
  <td>Message Title</td>
  <td>:</td>
  <td><input name="messageTitle" type="text" id="messageTitle" size="40" /><span class="error">* <?php echo $messageTitleErr;?></span></td>
</tr>

<tr>
  <td valign="top">Comment</td>
  <td valign="top">:</td>
  <td><textarea name="comment" cols="40" rows="3" id="comment"></textarea><span class="error">* <?php echo $commentErr;?></span></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><input id="buttonSubmit" type="submit" name="mySubmit" value="Submit" />
  <input id="buttonReset" type="reset" name="Reset" value="Reset" />
</tr>

</div>
</table>

</td>
</form>
</tr>
</table>

<h2><div id="guesttitle">Guests</div></h2>

<div id="table-container">
<?php
$sql = "SELECT firstname, lastname, email, Insertion, comment, website, messageTitle FROM guestbook";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table id='tabledata'><tr><th>First Name</th><th>Insertion</th><th>Last Name</th><th>Email</th><th>Message Title</th><th>Comment</th><th>Website</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
  echo "<tr><td>".$row["firstname"]."</td><td>".$row["Insertion"]."</td><td> ".$row["lastname"]."</td><td> ".$row["email"]."</td><td> ".$row["messageTitle"]."</td><td> ".$row["comment"]."</td><td> ".$row["website"]."</td></tr>";
}
  echo "</table>";
} else {
  echo "0 results";
}
?>

</div>

<div id="footer">
<p>Made by Alper Kuyumcu    |     ROC Ter AA     | © 2018</p>
</div>

</body>
</html>
