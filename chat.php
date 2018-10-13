<?php

session_start();

function loginForm()
{
    echo '
    <div id="loginform">
        <form action="chat.php" method="post">
            <p>Please enter your name to comntinue:</p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" />
            <input type="submit" name="enter" id="enter" value="Enter" />
        </form>
    </div>';
}

if (isset($_POST['enter']))
{
    if($_POST['name'] != "")
    {
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else
    {
        echo '<span class="error">Please type in a name</span>';
    }
}

?>

<?php

if (!isset($_SESSION['name']))
{
    loginForm();
}
else
{
?>




<html>
<head>
<title>Chat</title>
<link type="text/css" rel="stylesheet" href="chat.css" />
</head>
<body>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox"></div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    //if user wants to end session
    $("#exit").click(function()
    {
        var exit = confirm("Are you sure you want to end the session?");
        if (exit == true)
        {
            window.location = 'chat.php?logout==true';//change to game
        }
    });
 
});
</script>
</body>

</html>
<?php
}
?>