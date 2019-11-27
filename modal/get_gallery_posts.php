<?php
    require("../config/connect.php");
    try {
        $page_no = $_GET['page'];
        $offset = 5 * ($page_no - 1);
        $stmt = $connection->prepare("SELECT * FROM `gallery` ORDER BY `postid` DESC LIMIT 5 OFFSET :offset");
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        while ($img = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $pid = $img['postid'];
            $statement = $connection->prepare("SELECT * FROM `likes` WHERE `pid` = :pid");
            $statement->bindParam(":pid", $pid);
            $statement->execute();
            $like_count = $statement->rowCount();
            $statement = $connection->prepare("SELECT COUNT(*) FROM `likes` WHERE `uid`=? AND `pid`=?");
            $statement->execute(array($_SESSION["uid"], $pid));
            $isliked = $statement->fetch()[0];
            ?>
            <div id="delete_post-<?php echo $pid; ?>">
                <a>
                    <div class = 'gal_img' style = 'background-image: url(./img/uploads/<?php echo $img['imgFullNameGallery'] ?>)'></div>
                    <h3>Posted by: <?php echo $img['username'] ?></h3>
                </a>
                <i class = 'fa fa-thumbs-o-<?php echo !$isliked ? "up" : "down";?> like_btn' id = "like-<?php echo $pid; ?>" onclick = "like(<?php echo $pid; ?>)"><a> Like!</a></i>

                <a id="like-count-<?php echo $pid; ?>"><?php echo $like_count; ?></a>
                <i onclick = "redirect(<?php echo $pid ?>)"><button>Comment</button></i>
                <?php
                if ($img['username'] === $_SESSION['username'])
                {
                ?>
                <i class = 'fa fa-trash delete_btn' onclick = "delete_post(<?php echo $pid; ?>)"><a class = "delete_btn">  Delete your post?</a></i>
            </div>
            <?php
            }
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>