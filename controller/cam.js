
window.addEventListener("load", () =>
{
	var video = document.getElementById("video");
	var canvas = document.createElement("canvas");
	var upload = document.getElementById("upload");
	var capture = document.getElementById("capture");
	var imageDisplay = document.getElementById("display");
	var context = canvas.getContext("2d");

	if (navigator.mediaDevices.getUserMedia)
	{
		navigator.mediaDevices.getUserMedia({video: true, audio: false}).then((stream) => {
			video.srcObject = stream;
		}).catch((error) => {
			console.log(error);
		});
	}

	capture.addEventListener("click",  () =>
	{
		canvas.height = video.offsetHeight;
		canvas.width = video.offsetWidth;
		
		context.drawImage(video, 0, 0);
		imageDisplay.src = canvas.toDataURL();
		video.style.display = "none";
		upload.style.display = "none";
		capture.style.display = "none";
	});
	upload.addEventListener("change", () => 
	{
		if (upload.files.length > 0 && upload.files[0].type.match(/image\/*/))
		{
		var file = upload.files[0];
		var img = new Image();
			img.addEventListener("load", () => 
			{
				img.width = 640;
				img.height = 480;
				canvas.height = img.height;
				canvas.width = img.width;

				context.drawImage(img, 0, 0);
				imageDisplay.src = canvas.toDataURL();
				var request = new XMLHttpRequest();
				request.onload = () => 
				{
					if (request.status == 200)
					console.log(request.responseText);
					else if (request.status == 400)
					console.log(request.responseText);
				}
				request.open("POST", "/camagru/modal/upload.php");
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				request.send("canvas=" + encodeURIComponent(canvas.toDataURL().replace("data:image/png;base64,", "")));
			});
			img.src = URL.createObjectURL(file);
		}
	});

	var stickers = document.querySelectorAll(".sticker");
	for (var i = 0; i < stickers.length; i++)
	{
		stickers[i].addEventListener("click", (e) => {
			console.log(e.target);
			context.drawImage(e.target, 0, 0);
			imageDisplay.src = canvas.toDataURL();
		});
	}
});