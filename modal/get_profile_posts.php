<?php
    require("../config/connect.php");
    try
    {
        $page_no = $_GET['page'];
        $offset = 5 * ($page_no - 1);
        $username = $_SESSION['username'];
        $stmt = $connection->prepare("SELECT * FROM `gallery` WHERE `username` = :username ORDER BY `postid` DESC LIMIT 5 OFFSET :offset");
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->bindParam(":username", $username);
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
                </a>
                <i class = 'fa fa-thumbs-o-up like_btn'><a> Likes</a></i>

                <a id="like-count-<?php echo $pid; ?>"><?php echo $like_count; ?></a>
                <i onclick = "redirect(<?php echo $pid ?>)"><button>Comment</button></i>
                
                <i class = 'fa fa-trash delete_btn' onclick = "<?php echo $pid; ?>"><a class = "delete_btn">  Delete your post?</a></i>
            </div>
        <?php
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>