<?php session_start(); ?>
<header class = "header">
    <nav class = "nav_links">
        <ul>
            <li><a> - - - -</a></li>
            <li><a href = "gallery.php">Gallery</a></li>
            <li><a href = "camera.php">Capture</a></li>
            <div class = "logo_div" onclick = "move_loc()" style = 'background-image: url("img/randoms/Birdy.png"'></div>
            <li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'login.php'>Login</a>";?></li>
            <li><?php } elseif ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = 'modal/logout_user.php'>Logout</a>";}?></li>
            <li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'register.php'>Register</a>";?></li>
            <li><?php } else if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = 'profile.php'>Profile</a>";}?></li>
            <li><a> - - - -</a></li>
        </ul>
    </nav>
    <?php if(isset($_SESSION['loggedin'])) {?>
    <div class = "footer">Logged in as: <?php echo $_SESSION['username']?></div>
    <?php } else { ?>
    <div class = "footer">Cascade</div>
    <?php
    }
    ?>
</header>
    <script src = './controller/script.js'></script>