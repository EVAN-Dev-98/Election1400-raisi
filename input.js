function settext(){
    var photo = document.getElementById("photo");
    var lbl = document.querySelector("#photo-label");
    var file = photo.files[0];
    lbl.textContent = file.name;
}