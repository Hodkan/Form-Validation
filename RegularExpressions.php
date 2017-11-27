<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values 
$nameErr = $emailErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = Test_input($_POST["name"]);
        // check if name only contains letters and whitespace 
        if (!preg_match("/^[a-zA-Z'`\s- ]*$/", $name)) {
            $nameErr = "Invalid Name format"; 
        }
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = Test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^.+@.+\.com$|.net|.com.au$/", $email)) {
            $emailErr = "Invalid email format"; 
        }
    }
    

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = Test_input($_POST["comment"]);
    }

  
}

// Test input function
function Test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Regular Expressions</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40">
    <?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>