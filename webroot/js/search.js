// recupere la value des inputs de la recherche
let inputSearch = document.querySelector('#input-search');
// recupere la value des inputs de type radio
let inputType = document.querySelectorAll('.input.radio input');

inputSearch.addEventListener('input', (e)=>{
    let value = inputSearch.value;
    inputType.forEach(element => {
        if(element.checked){
            let type = element.value;
            search(value, type);
        }
    });
})

inputType.forEach(element => {
    element.addEventListener('change', (e)=>{
        let value = inputSearch.value;
        let type = element.value;
        search(value, type);
    }
    );
});

async function search(value, type){
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/searchs/search`, {
            method: 'POST',
            body: JSON.stringify({
                value: value,
                type: type,
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        let data = await res.json();

        if(data.success) {
            let result = data.success;
            if (type == 'users') {
                let html = '';
                result.forEach(element => {
                    html += `
                    
                    <a href="/users/view/${element.id}"  class="user-card">
                        <div class="user-card-img">
                            <img src="img/pictures/profils/${element.picture}" alt="">
                        </div>
                        <div class="user-card-info">
                            <h3>@${element.pseudo}</h3>
                            <p>${element.firstname} ${element.lastname}</p>
                        </div>
                    </a>
                        `;
                });
                document.querySelector('#results-search').innerHTML = html;
            } else if (type == 'posts') {
                let html = '';
                result.forEach(element => {
                    console.log(element);
                    let img = element.pictures;
                    // transforme le string en array
                    img = img.split(',');
                    img = img[0];
                    
                    html += `
                    <a href="/posts/view/${element.id}" class="post-card">
                        <div class="post-card-img">
                            <img src="img/pictures/posts/${img}" alt="">
                        </div>
                    </a>
                    
                    `;
                });
                document.querySelector('#results-search').innerHTML = html;
            }
        }

    }catch(e){
        console.log(e);
    }
}

