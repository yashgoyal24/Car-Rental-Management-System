function checkclick(event){
	var resultsdiv = document.getElementById('resultsdiv');
	var results = document.getElementById('results');
	if(event.target.id != resultsdiv.id){
		results.classList.remove('sho');
	}
}
