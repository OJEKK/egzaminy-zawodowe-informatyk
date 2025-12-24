function dodaj() {
	let plik = document.getElementById("plik");
	const kopie = document.getElementById("kopie").value;
	const rodzaj = document.querySelector("[name='rodzaj']:checked").value;
	const cena = kopie * rodzaj;
	const koszyk = document.getElementById("koszyk");

	let nazwaPliku = "";
	// 1 OPCJA NA POBRANIE NAZWY PLIKU
	nazwaPliku = plik.files[0].name;
	// 2 OPCJA NA POBRANIE NAZWY PLIKU (PRZEZ USUNIĘCIE PRZEDROSTKA 'X:\fakepath\')
	plik = String(plik.value);
	nazwaPliku = plik.split("\\");
	nazwaPliku = nazwaPliku[nazwaPliku.length - 1];
	// 3 OPCJA NA POBRANIE NAZWY PLIKU (PRZEZ USUNIĘCIE PRZEDROSTKA 'X:\fakepath\')
	for (let i = 0; i < plik.length; i++) {
		nazwaPliku += plik[i];
		if (plik[i] == "\\") nazwaPliku = "";
	}

	koszyk.innerHTML += `
		<div>
			<img src="${nazwaPliku}">
			<p>Liczba kopii: ${kopie}</p>
			<p>Cena: ${cena}</p>
		</div>
	`;
}
