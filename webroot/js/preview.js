window.onload = function() {
    // preview image
    var preview = document.querySelector('.preview');
    if(preview != null) {
        document.querySelector('.input.file input').addEventListener('change', e => {
            preview.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')';
        });
    }   

    var other = document.querySelector('.other');
    if(other != null) {
        // input radios check change
        var radios = document.querySelectorAll('input[type="radio"]');
        for(var i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', e => {
                input = document.querySelector('.input-other');
                if(e.target.value == 'new') {
                    input.style.display = 'block';
                } else {
                    input.style.display = 'none';
                }
            });
        }
    }
}