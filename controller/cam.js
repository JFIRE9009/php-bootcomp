
window.addEventListener("load", () =>
{
	var video = document.getElementById("video");
	var canvas = document.createElement("canvas");
	var upload = document.getElementById("file");
	var capture = document.getElementById("capture");
	var upload_btn = document.getElementById("upload_btn");
	var cancel_btn = document.getElementById("cancel_btn")
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
		
		context.drawImage(video, 10, 10,);
		imageDisplay.src = canvas.toDataURL();
		imageDisplay.src.width = "100vw";
		imageDisplay.style.border = "thick solid rgb(249, 200, 230)";
		video.style.display = "none";
		upload.style.display = "none";
		capture.style.display = "none";
		upload_btn.style.display = "block";
		cancel_btn.style.display = "block";
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
				imageDisplay.src.width = "100vw";
				imageDisplay.style.border = "thick solid rgb(249, 200, 230)";
				video.style.display = "none";
				upload.style.display = "none";
				capture.style.display = "none";
				upload_btn.style.display = "block";
				cancel_btn.style.display = "block";
			});
			img.src = URL.createObjectURL(file);
		}
	});

	var kitten_sticker = document.getElementById("kitten");
	kitten_sticker.addEventListener("click", (e) => 
	{
		context.drawImage(e.target, 0, 0, 100, 100);
		imageDisplay.src = canvas.toDataURL();
	});
	var pokemon_sticker = document.getElementById("pokemon");
	pokemon_sticker.addEventListener("click", (e) => 
	{
		context.drawImage(e.target, 525, 0, 100, 100);
		imageDisplay.src = canvas.toDataURL();
	});
	var fox_deer_sticker = document.getElementById("fox_deer");
	fox_deer_sticker.addEventListener("click", (e) => 
	{
		context.drawImage(e.target, 25, 350, 100, 100);
		imageDisplay.src = canvas.toDataURL();
	});
	var whale_sticker = document.getElementById("whale");
	whale_sticker.addEventListener("click", (e) => 
	{
		context.drawImage(e.target, 525, 350, 100, 100);
		imageDisplay.src = canvas.toDataURL();
	});

	cancel_btn.addEventListener("click", () =>
	{
		document.location.reload();
	});
	upload_btn.addEventListener("click", () =>
	{
		var request = new XMLHttpRequest();
		request.onload = () => 
		{
			if (request.status == 200)
			{
				console.log(request.responseText);
				document.location.reload();
			}
			else if (request.status == 400)
				console.log(request.responseText);
		}
		request.open("POST", "/camagru/modal/upload.php");
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send("canvas=" + encodeURIComponent(canvas.toDataURL().replace("data:image/png;base64,", "")));
	});
	// var stickers = document.querySelectorAll(".sticker");
	// for (var i = 0; i < stickers.length; i++)
	// {
	// 	stickers[i].addEventListener("click", (e) => 
	// 	{
	// 		console.log(e.target);
	// 		context.drawImage(e.target, 0, 0, 100, 100);
	// 		imageDisplay.src = canvas.toDataURL();
	// 	});
	// }
});