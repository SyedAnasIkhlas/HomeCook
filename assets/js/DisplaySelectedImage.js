function loadFile(event) {

    var output = document.getElementById("dish1");
    output.src = URL.createObjectURL(event.target.files[0]);
  };