function oblicz() {
	const wynik = document.getElementById("wynik");
	const szerokosc = document.getElementById("szerokosc").value;
	const dlugosc = document.getElementById("dlugosc").value;
	const rodzaj = document.querySelector("[name='rodzaj']:checked").value;

	if (szerokosc && dlugosc) {
		let pole = szerokosc * dlugosc;
		let koszt = pole * rodzaj;
		wynik.innerHTML = `
        Pole powierzchni pomieszczenia: ${pole}, koszt montażu ${koszt}
        `;
	} else {
		wynik.innerHTML = "Wprowadź poprawne dane.";
	}
}
