window.onload = function() {
    // preview image
    var preview = document.querySelector('.preview');
    console.log(preview);
    if(preview != null) {
        document.querySelector('.input.file input').addEventListener('change', e => {
            preview.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')';
        });
    }   
}