function like (id)
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

var pageno = 1;
var propageno = 1;

function loadmore ()
{
    var profilephotoplace = document.getElementById("profile_photos");
    var galleryphotoplace = document.getElementById("photo_place");
    if (galleryphotoplace)
    {
        var request = new XMLHttpRequest();
        request.onload = () => {
            if(request.status === 200)
            {
                pageno++;
                galleryphotoplace.innerHTML += request.responseText;
            }
            else
                console.log(request.responseText);
        };
        request.open("POST", "/camagru/modal/get_gallery_posts.php?page=" + pageno);
        request.send();
    }
    else if (profilephotoplace)
    {
        var request = new XMLHttpRequest();
        request.onload = () => {
            if(request.status === 200)
            {
                propageno++;
                profilephotoplace.innerHTML += request.responseText;
            }
            else
            console.log(request.responseText);
        };
        request.open("POST", "/camagru/modal/get_profile_posts.php?page=" + propageno);
        request.send();
    }
}

move_loc = () =>
{
    location.replace("index.php");
}

window.addEventListener("load", () => {
    loadmore();
});
infiniteScroll = () =>
{
    var pro_wrap = document.getElementById('profile_photos');
    var gal_wrap = document.getElementById('photo_place');
    if (pro_wrap)
    {
        var contentHeight = pro_wrap.offsetHeight;
        var y = window.pageYOffset + window.innerHeight;
        if (y >= contentHeight)
            loadmore();
    }
    if (gal_wrap)
    {
        var contentHeight = gal_wrap.offsetHeight;
        var y = window.pageYOffset + window.innerHeight;
        if (y >= contentHeight)
            loadmore();
    }
}
window.onscroll = infiniteScroll;

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
    var confirmation = confirm("Delete post?");
    var request = new XMLHttpRequest();
    if (confirmation == true)
    {
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

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }