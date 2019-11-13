function like(id)
{
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 200)
        {
            var like_btn = document.getElementById("like-" + id);
            like_btn.style.color = "#f00";

        }
        if (request.status === 400)
            console.log(request.responseText);
    }
    request.open("POST", "/camagru/model/like.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("postid=" + id);
}

function delete_post(pid)
{
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 200)
        {
            var delete_btn = document.getElementById("delete_post-" + pid);
            // delete_btn.style.display = "none";
        }
        else if (request.status === 500)
            console.log(request.responseText);
    }
    request.open("POST", "/camagru/model/delete_post.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("pid=" + pid);
}