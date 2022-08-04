async function search() {
    let input = document.getElementById('search');
    let type = document.getElementById('type');
    let inputValue = input.value;
    let typeValue = type.value;
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/searchs/index/${inputValue}/${typeValue}`, {
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
            let result = document.getElementById('result');
            result.innerHTML = data.html;
        }
    } catch(e) {
        console.log(e);
    }
}

// detection de l'input searhc 
let input = document.getElementById('search');
input.addEventListener('input', search);