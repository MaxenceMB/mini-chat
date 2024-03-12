function addMessage() {
    pseudo  = document.getElementById("txtPseudo").value;
    contenu = document.getElementById("txtMessage").value;

    $.ajax({
		type: 'GET',
		url: 'enregistrer.php',
		data: {
			pseudo: pseudo,
            phrase: contenu
		},
		success: function(data){
			alert(data);
		}
	})
}