function DelComment(id){
    if(confirm("Voulez vous vraiment supprimer ce commentaire ?")){
        window.location='index.php?x=del_comment&id='+id
    }
    else{
        alert("Le commentaire n'a pas été supprimé.")
    }
}