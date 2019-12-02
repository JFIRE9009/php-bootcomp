
window.addEventListener("load", () =>
{
	var video = document.getElementById("video");
	var canvas = document.createElement("canvas");
	var stickerCanvas = document.createElement("canvas");
	var upload = document.getElementById("file");
	var capture = document.getElementById("capture");
	var upload_btn = document.getElementById("upload_btn");
	var cancel_btn = document.getElementById("cancel_btn")
	var imageDisplay = document.getElementById("display");
	var stickerDisplay = document.getElementById("stickerdisplay");
	var context = canvas.getContext("2d");
	var stickerContext = stickerCanvas.getContext("2d");
	
	if (capture)
	{
		if (navigator.mediaDevices.getUserMedia)
		{
			navigator.mediaDevices.getUserMedia({video: true, audio: false}).then((stream) => {
				video.srcObject = stream;
			}).catch((error) => {
				console.log(error);
			});
		}
	}
	if (upload)
	{
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
					stickerCanvas.height = canvas.height;
					stickerCanvas.width = canvas.width;
					
					context.drawImage(img, 0, 0);
					imageDisplay.src = canvas.toDataURL();

					imageDisplay.src.width = "100vw";
					imageDisplay.style.border = ".45vw solid rgb(249, 200, 230)";
					video.style.display = "none";
					upload.style.display = "none";
					capture.style.display = "none";
					upload_btn.style.display = "block";
					cancel_btn.style.display = "block";
					
					var kitten_sticker = document.getElementById("kitten");
					kitten_sticker.addEventListener("click", (e) => 
					{
						stickerContext.drawImage(e.target, 0, 0, 100, 100);
						stickerDisplay.src = stickerCanvas.toDataURL();
					});
					
					var pokemon_sticker = document.getElementById("pokemon");
					pokemon_sticker.addEventListener("click", (e) => 
					{
						stickerContext.drawImage(e.target, 550, 20, 100, 100);
						stickerDisplay.src = stickerCanvas.toDataURL();
					});
					
					var fox_deer_sticker = document.getElementById("fox_deer");
					fox_deer_sticker.addEventListener("click", (e) => 
					{
						stickerContext.drawImage(e.target, 25, 390, 100, 100);
						stickerDisplay.src = stickerCanvas.toDataURL();
					});
					
					var whale_sticker = document.getElementById("whale");
					whale_sticker.addEventListener("click", (e) => 
					{
						stickerContext.drawImage(e.target, 550, 390, 100, 100);
						stickerDisplay.src = stickerCanvas.toDataURL();
					});
					
				});
				img.src = URL.createObjectURL(file);
			}
		});
	}
	if (capture)
	{
		capture.addEventListener("click",  () =>
		{
			canvas.height = video.offsetHeight;
			canvas.width = video.offsetWidth;

			stickerCanvas.height = canvas.height;
			stickerCanvas.width = canvas.width;

			context.drawImage(video, 10, 10,);
			imageDisplay.src = canvas.toDataURL();

			imageDisplay.src.width = "100vw";
			imageDisplay.style.border = ".45vw solid rgb(249, 200, 230)";
			imageDisplay.style.zIndex = "1";
			video.style.display = "none";
			upload.style.display = "none";
			capture.style.display = "none";
			upload_btn.style.display = "block";
			cancel_btn.style.display = "block";

			var kitten_sticker = document.getElementById("kitten");
			kitten_sticker.addEventListener("click", (e) => 
			{
				stickerContext.drawImage(e.target, 0, 0, 100, 100);
				stickerDisplay.src = stickerCanvas.toDataURL();
			});
			
			var pokemon_sticker = document.getElementById("pokemon");
			pokemon_sticker.addEventListener("click", (e) => 
			{
				stickerContext.drawImage(e.target, 550, 20, 100, 100);
				stickerDisplay.src = stickerCanvas.toDataURL();
			});
			
			var fox_deer_sticker = document.getElementById("fox_deer");
			fox_deer_sticker.addEventListener("click", (e) => 
			{
				stickerContext.drawImage(e.target, 25, 390, 100, 100);
				stickerDisplay.src = stickerCanvas.toDataURL();
			});
			
			var whale_sticker = document.getElementById("whale");
			whale_sticker.addEventListener("click", (e) => 
			{
				stickerContext.drawImage(e.target, 550, 390, 100, 100);
				stickerDisplay.src = stickerCanvas.toDataURL();
			});
			
		});
	}
	if (cancel_btn)
	{
		cancel_btn.addEventListener("click", () =>
		{
			document.location.reload();
		});
	}
	if (upload_btn)
	{
		upload_btn.addEventListener("click", () =>
		{
			var request = new XMLHttpRequest();
			request.onload = () => 
			{
				if (request.status == 200)
				{
					console.log(request.responseText);
					location.replace("/camagru/gallery.php");
				}
				else if (request.status == 400)
					console.log(request.responseText);
			}
			request.open("POST", "/camagru/modal/upload.php");
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send("canvas=" + encodeURIComponent(canvas.toDataURL().replace("data:image/png;base64,", "")) + "&stickerCanvas=" + encodeURIComponent(stickerCanvas.toDataURL().replace("data:image/png;base64,","")));
		});
	}
});
