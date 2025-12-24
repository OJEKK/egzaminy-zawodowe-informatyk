function oblicz() {
	const react = document.getElementById("react").checked;
	const js = document.getElementById("js").checked;
	const raty = document.getElementById("raty").value;
	const miasto = document.getElementById("miasto").value;
	const wynik = document.getElementById("wynik");
	let suma = 0;
	if (react) suma += 5000;
	if (js) suma += 3000;
	let rata = suma / raty;
	wynik.innerHTML = `
        Kurs odbędzie się w ${miasto}. 
        Koszt całkowity: ${suma} zł. 
        Płacisz ${raty} rat po ${rata} zł
    `;
}
