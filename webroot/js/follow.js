


async function follow(id, idFollow){
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/follows/add`, {
            method: 'POST',
            body: JSON.stringify({
                id_user_following: idFollow
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // let reponse
        
        let data = await res.json();
        
        if(data.success) {
            console.log(data);
            let button = document.querySelector(".follow");
            button.innerHTML = 'Ne plus suivre';
            button.classList.add('unfollow');
            button.classList.remove('follow');
            // attribut onclick sur le bouton
            button.attributes.onclick.value = `unfollow(${id}, ${idFollow})`;
        }
    } catch(e) {
        console.log(e);
    }
}

async function unfollow(id, idFollow){
    var csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
    try{
        let res = await fetch(`/follows/delete`, {
            method: 'POST',
            body: JSON.stringify({
                id_user_following: idFollow
            }),
            headers: {
                "content-type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
            }
        });

        // let reponse
        let data = await res.json();
        if(data.success) {
            let button = document.querySelector(".unfollow");
            button.innerHTML = 'Suivre';
            button.classList.add('follow');
            button.classList.remove('unfollow');
            button.attributes.onclick.value = `follow(${id}, ${idFollow})`;
        }
    } catch(e) {
        console.log(e);
    }
}