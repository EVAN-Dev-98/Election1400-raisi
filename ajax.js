var form = document.getElementById("form");
var photo = document.getElementById("photo");
var message = document.getElementById('message');

form.onsubmit = function (event){
    event.preventDefault();
    message.innerHTML = "در حال آپلود تصویر ، لطفا شکیبا باشید ...";

    var files = photo.files;
    if (files[0]){
        var file = files[0];

        var formData = new FormData();

        formData.append('photo' , file , file.name );

        var ajax = new XMLHttpRequest();
        ajax.onload = function(){
            if( this.readyState === 4 && this.status === 200 ){
                message.innerHTML = ajax.responseText;
            }
        }
        ajax.open('POST', "image-process.php", true);
        ajax.send(formData);
    }
    else
        message.innerHTML = "لطفا تصویر خود را انتخاب کنید!";
}