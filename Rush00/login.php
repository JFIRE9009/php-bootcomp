<!DOCTYPE html>
<html lang="en">
<head>
	<link rel = "stylesheet" href = "css/login.css">
</head>
<body>
	<header class = "header">
		<nav class = "nav_links">
			<ul>
				<li><a href = "http://localhost:8080/rush00/index.php">Home</a></li>
				<li><a href = "">Shop</a></li>
				<li><a href = "">Team</a></li>
				<li><a href = "">Work</a></li>
				<li class = "Logo"><a href = ""><img src = "img/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
				<li><a href = "">Blog</a></li>
				<li><a href = "">Contact</a></li>
				<li><a href = "">Client</a></li>
				<li><a href = "http://localhost:8080/rush00/login.php">Login</a></li>
			</ul>
			<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
		</nav>
	</header>
	<div id="id01" class="modal"><!-- 
	<span onclick="document.getElementById('id01').style.display='none'"> -->
	<form class = "modal-content animate" action="/action_page.php">
		<div class = "container">
			<label for = "uname"><b>Username</b></label>
			<input class = "Fill" type = "text" placeholder = "Enter Username" name = "uname" required>
			<br>
			<label for = "psw"><b>Password</b></label>
			<input class = "Fill" type = "password" placeholder = "Enter Password" name = "psw" required>
			<br>
			<button type = "submit">Login</button>
			<br>
			<label>
				<input class = "Remember" type = "checkbox" checked="checked" name="remember">Remember me
			</label>
		</div>
		<div class = "container" style = "background-color:#f1f1f1">
		<button type = "button" onclick = "document.getElementById('id01').style.display = 'none'" class="cancelbtn">Cancel</button>
		<span class = "psw">Forgot <a href = "#">password?</a></span>
		</div>
	</form>
</div>
  </div>
</form>
</body>
</html>