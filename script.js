function addMessage(pseudo, contenu) {
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