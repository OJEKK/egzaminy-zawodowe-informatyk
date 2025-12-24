function pokaz(wybrany) {
	numer = wybrany[wybrany.length - 1];
	for (let i = 1; i <= 3; i++) {
		document.querySelector("#blok" + i).style.backgroundColor = "#FFAEA5";
		document.querySelector("#sekcja" + i).style.display = "none";
	}
	document.querySelector("#blok" + numer).style.backgroundColor = "mistyrose";
	document.querySelector("#sekcja" + numer).style.display = "block";
}
