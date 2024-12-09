const setaEsq = document.querySelectorAll('#prebtn');
const setaDir = document.querySelectorAll('#nextbtn');
const linhas = document.querySelectorAll('#discografia');

linhas.forEach((item, i) => {
    let containerDimensons = item.getBoundingClientRect();
    let containerWidth = containerDimensons.width;

    setaDir[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });

    setaEsq[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".preview-album");

    let audio = new Audio();

    images.forEach(image => {
        image.addEventListener("mouseover", () => {
            const audioSrc = image.getAttribute("data-audio");
            if (audioSrc) {
                audio.src = audioSrc; 
                audio.play();        
            }
        });

        image.addEventListener("mouseout", () => {
            audio.pause();        
            audio.currentTime = 0; 
        });
    });
});
