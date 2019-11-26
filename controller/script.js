function like(id)
{
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 200)
        {
            var like_btn = document.getElementById("like-" + id);
            var like_count = document.getElementById("like-count-" + id);
            like_count.innerHTML = 1 + Number(like_count.innerHTML);
            like_btn.className = "fa fa-thumbs-o-down";
            console.log(request.responseText);

        }
        else if (request.status === 205)
        {
            var like_btn = document.getElementById("like-" + id);
            var like_count = document.getElementById("like-count-" + id);
            like_count.innerHTML = Number(like_count.innerHTML) - 1;
            like_btn.className = "fa fa-thumbs-o-up";
            console.log(request.responseText);
        }
    }
    request.open("POST", "/camagru/modal/like.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("postid=" + id);
}

window.addEventListener("load", () => {
    var deletebtns = document.querySelectorAll("i.delete_btn");
    for (var i = 0; i < deletebtns.length; i++)
    {   
        var element = deletebtns[i];
        element.addEventListener("click", (e) => {
            delete_post(e.target.getAttribute("use-id"));
        });
    };
});

function comment(pid)
{
    var comment = document.getElementById("comment");
    var request = new XMLHttpRequest();
    request.onload = () => {
        if(request.status === 200)
        {
            document.location.reload();
            console.log(request.responseText);
        }
        else
            console.log(request.responseText);
    };
    request.open("POST", "/camagru/modal/input_comment.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("postid=" + pid + "&comment=" + comment.value);
}
function redirect(pid)
{
    location.replace("comments.php?pid=" + pid);
}

function delete_post(pid)
{
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 200)
        {
            console.log("deleting: " + pid);
            var post = document.getElementById("delete_post-" + pid);
            post.style.display = "none";
        }
        else if (request.status === 400)
            console.log(request.responseText);
    }
    request.open("POST", "/camagru/modal/delete_post.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("pid=" + pid);
}
window.addEventListener("load", () => 
{
    var on = document.getElementById("on");
    var off = document.getElementById("off");
    if (on)
    {
        on.addEventListener("click", () =>
        {
            var request = new XMLHttpRequest();
            request.onload = () =>
            {
                if (request.status === 200)
                {
                    console.log("on");
                    console.log(request.responseText);
                }
                else if(request.status === 500)
                    console.log(request.responseText);
            }
            request.open("POST", "/camagru/modal/notifications.php");
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send("on=" + on);
       });
    }
    if (off)
    {
        off.addEventListener("click", () =>
        {
            var request = new XMLHttpRequest();
            request.onload = () =>
            {
                if (request.status === 200)
                {
                    console.log("off");
                    console.log(request.responseText);
                }
                else if(request.status === 500)
                    console.log(request.responseText);
            }
            request.open("POST", "/camagru/modal/notifications.php");
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send("off=" + off);
        });
    }
});