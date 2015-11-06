<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="views/stylesheet.css" type="text/css" />
<title>login</title>
</head>

<body>
<span class="error"><?php if(isset($errors)) { echo $errors; } ?></span>
	<form name="login" action="login.php" method="post">
    
    <?php if($error['alert'] = ''){
		echo "<div class='alert'>".$error['alert']."</div>"	;}?>
    	<label> Email:</label>
          <br/>
        <input type="text" name="email">
        <br/>
        <div class="error"><?php echo $error['mail'];/*value="<?php  $input['email'];*/?></div>
        <br/>
        <label>Password:</label>
          <br/>
        <input type="text" name="password";>
        <br/>
        <div class="error"><?php echo $error['pass'];?></div>
        <br/>
        <?
        /*
		value=<?php $input['password']
		*/
		?>
        <input type="submit" value="Login">
    </form>
</body>
</html>