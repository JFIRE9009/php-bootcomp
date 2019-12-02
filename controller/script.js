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

validate = () =>
{
    var firstname = document.getElementById("firstname").value;
    var surname = document.getElementById("surname").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password_1 = document.getElementById("password_1").value;
    var password_2 = document.getElementById("password_2").value;
    var error = document.getElementById("error");
    
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 201)
        {
            error.innerHTML = "Your passwords do not match";
            return (false);
        }
        if (request.status === 202)
        {
            error.innerHTML = "Please fill in all the fields";
            return (false);
        }
        if (request.status === 203)
        {
            error.innerHTML = "Your password is too short";
            return (false);
        }
        if (request.status === 204)
        {
            error.innerHTML = "Please enter a valid E-Mail address";
            return (false);
        }
        if (request.status === 206)
        {
            error.innerHTML = "Your password must contain at least one number, one lowercase letter, one uppercase letter and one special character";
            return (false);
        }
        if (request.status === 207)
        {
            error.innerHTML = "Username / E-Mail already in use";
            return (false);
        }
        else
        {
            error.innerHTML = "E-Mail sent for verification";
            setTimeout(function() {
                location.replace("/camagru/login.php");
            }, (2 * 1000));
            return (true);            
        }
    }
    request.open("POST", "/camagru/modal/input_user.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("firstname=" + firstname + "&lastname=" + surname + "&email=" + email + "&username=" + username + "&password_1=" + password_1 + "&password_2=" + password_2);
}

login_validate = () =>
{
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var error = document.getElementById("error");
    
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 201)
        {
            error.innerHTML = "Please verify your account to proceed";
            return (false);
        }
        if (request.status === 202)
        {
            error.innerHTML = "Incorrect Username/Password combination";
            return (false);
        }
        if (request.status === 203)
        {
            error.innerHTML = "You are already logged in!";
            return (false);
        }
        else
        {
            location.replace("/camagru/index.php");
            return (true);            
        }
    }
    request.open("POST", "/camagru/modal/login_user.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("username=" + username + "&password=" + password);
}

reset_validate = () =>
{
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var error = document.getElementById("error");
    
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 201)
        {
            error.innerHTML = "Your password is too short";
            return (false);
        }
        if (request.status === 202)
        {
            error.innerHTML = "Please enter a valid email address";
            return (false);
        }
        if (request.status === 203)
        {
            error.innerHTML = "Your password must contain at least one number, one lowercase letter, one uppercase letter and one special character";
            return (false);
        }
        if (request.status === 204)
        {
            error.innerHTML = "No user registered under that E-Mail address";
            return (false);
        }
        else
        {
            error.innerHTML = "An E-Mail has been sent for verification";
            return (true);
        }
    }
    request.open("POST", "/camagru/modal/changepassword.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("email=" + email + "&password=" + password);
}

edit_validate = () =>
{
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password_1 = document.getElementById("password_1").value;
    var password_2 = document.getElementById("password_2").value;
    var error = document.getElementById("error");
    
    var request = new XMLHttpRequest();
    request.onload = () =>
    {
        if (request.status === 299)
        {
            error.innerHTML = "Please enter your password";
            return (false);
        }
        if (request.status === 201)
        {
            error.innerHTML = "Please fill in at least one field";
            return (false);
        }
        if (request.status === 202)
        {
            error.innerHTML = "Incorrect password";
            return (false);
        }
        if (request.status === 203)
        {
            error.innerHTML = "Username is already in use";
            return (false);
        }
        if (request.status === 204)
        {
            error.innerHTML = "Please enter a valid E-Mail address";
            return (false);
        }
        if (request.status === 206)
        {
            error.innerHTML = "E-Mail is already in use";
            return (false);
        }
        if (request.status === 207)
        {
            error.innerHTML = "Password is too short";
            return (false);
        }
        if (request.status === 208)
        {
            error.innerHTML = "Your password must contain at least one number, one lowercase letter, one uppercase letter and one special character";
            return (false);
        }
        if (request.status === 209)
        {
            error.innerHTML = "No user registered under that E-Mail address";
            return (false);
        }
        else if (request.status === 500)
        {
            console.log(request.responseText);
        }
        else
        {
            error.innerHTML = "Your details have been changed";            
            return (true);            
        }
    }
    request.open("POST", "/camagru/modal/edit.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("email=" + email + "&username=" + username + "&password_1=" + password_1+ "&password_2=" + password_2);
}

window.addEventListener("load", () => 
{
    var on = document.getElementById("on");
    var off = document.getElementById("off");
    var notif_log = document.getElementById("notif_log");
    if (on)
    {
        on.addEventListener("click", () =>
        {
            var request = new XMLHttpRequest();
            request.onload = () =>
            {
                if (request.status === 200)
                {
                    notif_log.innerHTML = "Notifications are on";
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
                    notif_log.innerHTML = "Notifications are off";
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