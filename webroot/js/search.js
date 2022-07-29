async function search() {
    let input = document.getElementById('search');
    let inputValue = input.value;
    if (inputValue == '') {
        inputValue = 'all';
    }
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/searchs/index/${inputValue}`, {
            method: 'POST',
            body: JSON.stringify({
                text: inputValue
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // let reponse
        
        let data = await res.json();
        
        if(data.success) {

        }
    } catch(e) {
        console.log(e);
    }
}

// detection de l'input searhc 
let input = document.getElementById('search');
input.addEventListener('input', search);