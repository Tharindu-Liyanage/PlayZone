const form = document.querySelector(".drop-area"),
fileInput = form.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");

form.addEventListener("click",()=>{
    fileInput.click();

    
});

fileInput.onchange = ({target}) =>{
    let file = target.files[0]; // getting file and [0] this mean if user has multiple file first one get

    if(file){
        let fileName =file.name; // getting selected file name
        uploadFile(fileName); // calling uploadFile with passing file name 
 
    }
}

function uploadFile(name){
    let xhr = new XMLHttpRequest(); //creating new xml object
    xhr.open("POST","../php/upload.php"); // path to upload php
    xhr.upload.addEventListener("progress", e=>{
        console.log(e);
    });
    xhr.send();

    let formData = new FormData(form); // formData is an object to easily send from data
    xhr.send(formData); //sending form data to php
}