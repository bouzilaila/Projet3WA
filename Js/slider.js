'use strict';

let i = 0; //start point
let images = [];
let time = 3000;

// Images list

images[0]= 'Images/photo2.jpg';
images[1]= 'Images/photo3.jpg';
images[2]= 'Images/photo4.jpg';
images[3]= 'Images/photo6.jpg';

// change images

function changeImg(){
    document.slider.src = images[i];

    if( i < images.length -1){
        i++;
    }
    else{
        i = 0;
    }

    setTimeout("changeImg()", time);
}

window.onload = changeImg;