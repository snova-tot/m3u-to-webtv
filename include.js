window.onload = function() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
        var filesInput = document.getElementById("file2convert");

        filesInput.addEventListener("change", function(event) {

            var files = event.target.files; //FileList object
            var output = document.getElementById("m3u");

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                //Only plain text
                // if (!file.type.match('plain')) continue;

                var picReader = new FileReader();

                picReader.addEventListener("load", function(event) {
                    var textFile = event.target;
					output.value = textFile.result;

                });

                //Read the text file
                picReader.readAsText(file);
            }

        });
    }
    else {
        console.log("Your browser does not support File API");
    }
}
