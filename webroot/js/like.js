async function like(id, idpost){
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/likes/add`, {
            method: 'POST',
            body: JSON.stringify({
                id_post: idpost
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        let data = await res.json();

        if(data.success) {
            let button = document.querySelector(".like-"+idpost);
            let img = button.querySelector("img");
            img.src = '/img/icons/post/like-f.svg';
            button.classList.add('unlike-'+idpost);
            button.classList.remove('like-'+idpost);
            // attribut onclick sur le bouton
            button.attributes.onclick.value = `unlike(${id}, ${idpost})`;
        }

    }catch(e){
        console.log(e);
    }
}

async function unlike(id, idpost){
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/likes/delete`, {
            method: 'POST',
            body: JSON.stringify({
                id_post: idpost
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            }
        });

        let data = await res.json();

        if(data.success) {
            let button = document.querySelector(".unlike-"+idpost);
            let img = button.querySelector("img");
            img.src = '/img/icons/post/like-e.svg';
            button.classList.add('like-'+idpost);
            button.classList.remove('unlike-'+idpost);
            button.attributes.onclick.value = `like(${id}, ${idpost})`;
        }
    }catch(e){
        console.log(e);
    }
}