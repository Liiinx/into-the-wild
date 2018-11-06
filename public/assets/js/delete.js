/* Suppression article */

function deleteArticle (id, title){
    let response = prompt("Attention vous allez supprimer l'article : " + title + '\n' + " Merci de mettre le message 'confirmer' afin de supprimer.").toLowerCase();
    if(response === "confirmer"){
        window.location.replace("http://localhost:8080/admin/article/delete/" + id);
        return false;
    } else {
        alert("Anulation de la suppression !");
    }
}

/* Supprimer Category*/
function deleteCategory (id, name){
    let response = prompt("Attention vous allez supprimer la catégorie : " + name + '\n' + " Merci de mettre le message 'confirmer' afin de supprimer.").toLowerCase();
    if(response === "confirmer"){
        window.location.replace("http://localhost:8080/admin/category/delete/" + id);
        return false;
    } else {
        alert("Anulation de la suppression !");
    }
}

/*Supprimer USER*/
function deleteUser (id, name, firstame){
    let response = prompt("Attention vous allez supprimer l' user : " + name + ' ' + firstame +'\n' + " Merci de mettre le message 'confirmer' afin de supprimer.").toLowerCase();
    if(response === "confirmer"){
        window.location.replace("http://localhost:8080/admin/user/delete/" + id);
        return false;
    } else {
        alert("Anulation de la suppression !");
    }
}

/*Supprimer Comment*/
function deleteComment (id, comment){
    let response = prompt("Attention vous allez supprimer le commentaire : " + comment +'\n' + " Merci de mettre le message 'confirmer' afin de supprimer.").toLowerCase();
    if(response === "confirmer"){
        window.location.replace("http://localhost:8080/admin/comment/delete/" + id);
        return false;
    } else {
        alert("Anulation de la suppression !");
    }
}
