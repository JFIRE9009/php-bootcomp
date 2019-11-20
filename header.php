<header class = "header">
        <nav class = "nav_links">
            <ul>
                <li><a href = "index.php">- Home -</a></li>
                <li><a href = "gallery.php">Gallery</a></li>
                <li><a href = "camera.php">Capture</a></li>
                <li class = "Logo"><a href = "index.php"><img src = "img/randoms/Birdy.png" alt = " " class = "White"></a></li>
                <li><a href = "register.php">Register</a></li>
                <li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'login.php'>Login</a>";}; ?></li>
                <li><?php if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = './modal/logout_user.php'>Logout</a>";}; ?></li>
            <li><a href = "profile.php">Profile</a></li>
            </ul>
            <a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
        </nav>
</header>