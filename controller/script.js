function like(id)
{
    var request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200)
        {
            console.log("it worked");
            var like_btn = document.getElementById("like-" + id);
            like_btn.style.color = "#f00";

        }
        if (request.status === 400)
            console.log(request.responseText);
    }
    request.open("POST", "/camagru/model/like.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("postid=" + id);
    console.log(id);
}