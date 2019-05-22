
const uploadFileButton = document.getElementById("uploadFile");
const customText = document.getElementById("select_image1");

uploadFileButton.addEventListener("change", function() {
  if (uploadFileButton.value) {
    customText.innerHTML = uploadFileButton.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customText.innerHTML = "No image selected.";
  }
});

const uploadFileButton2 = document.getElementById("uploadFile2");
const customText2 = document.getElementById("select_image2");

uploadFileButton2.addEventListener("change", function() {
  if (uploadFileButton2.value) {
    customText2.innerHTML = uploadFileButton2.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customText2.innerHTML = "No image selected.";
  }
});

const uploadFileButton3 = document.getElementById("uploadFile3");
const customText3 = document.getElementById("select_image3");

uploadFileButton3.addEventListener("change", function() {
  if (uploadFileButton3.value) {
    customText3.innerHTML = uploadFileButton3.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customText3.innerHTML = "No image selected.";
  }
});