
window.addEventListener("load", () => {
	var video = document.getElementById("video");
	var canvas = document.getElementById("canvas");
	var upload = document.getElementById("upload");
	var capture = document.getElementById("capture");
	var context = canvas.getContext("2d");

	if (navigator.mediaDevices.getUserMedia)
	{
		navigator.mediaDevices.getUserMedia({video: true, audio: false}).then((stream) => {
			video.srcObject = stream;
		}).catch((error) => {
			console.log(error);
		});
	}

	capture.addEventListener("click", () => {
		canvas.height = video.offsetHeight;
		canvas.width = video.offsetWidth;

		context.drawImage(video, 0, 0);
	});
	upload.addEventListener("change", () => {
		if (upload.files.length > 0 && upload.files[0].type.match(/image\/*/))
		{
			var file = upload.files[0];
			var img = new Image();
			img.addEventListener("load", () => {
				canvas.height = img.height;
				canvas.width = img.width;

				context.drawImage(img, 0, 0);
				// console.log(canvas.toDataURL());
			});
			img.src = URL.createObjectURL(file);
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
		}
	});
});