function addMessage() {
    pseudo  = document.getElementById("txtPseudo").value;
    contenu = document.getElementById("txtMessage").value;

    $.ajax({
		type: 'GET',
		url: 'enregistrer.php',
		data: {
			pseudo: pseudo,
            phrase: contenu
		}
	})

    document.getElementById("txtMessage").value = "";
}