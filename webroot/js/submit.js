// Faire que ca submit le formulaire addpost 

let submitPost = document.querySelector("#submit");
if(submitPost != null) {
    submitPost.addEventListener("click", function() {
        let form = document.querySelector(".addpost");
        form.submit();
    });
}

let submitFestiv = document.querySelector("#submit-festiv");
if(submitFestiv != null) {
    submitFestiv.addEventListener("click", function() {
        let form = document.querySelector(".addfestiv");
        form.submit();
    });
}

let submitUser = document.querySelector("#submit-user");
if(submitUser != null) {
    submitUser.addEventListener("click", function() {
        let form = document.querySelector(".edit-user");
        form.submit();
    });
}


