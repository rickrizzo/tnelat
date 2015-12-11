//Upload profile pictures
if (document.getElementById("fileToUpload")) {
    document.getElementById("fileToUpload").onchange = function() {
    document.getElementById("upload").submit();
  };
};