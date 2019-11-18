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

        }
        if (request.status === 400)
        {

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