function ImageName()
{
	const uploadFileButton = document.getElementById("uploadFile");
	const customText = document.getElementById("select_image");

	uploadFileButton.addEventListener("change", function() {
	  if (uploadFileButton.value) {
	    customText.innerHTML = uploadFileButton.value.match(
	      /[\/\\]([\w\d\s\.\-\(\)]+)$/
	    )[1];
	  } else {
	    customText.innerHTML = "No image selected.";
	  }
	});
}

	
}