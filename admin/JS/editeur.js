document.getElementById("delete_button").onclick = function() {
    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette page ?");
    if (confirmation) {
        document.forms["delete_form"].submit();
    }
}