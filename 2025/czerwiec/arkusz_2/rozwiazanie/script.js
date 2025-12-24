function dodaj() {
	const zadanie = document.getElementById("zadanie").value;
	const lista = document.getElementById("lista");
	lista.innerHTML += `
        <li>
            <span>${zadanie}</span>
            <button onclick="wykonane(this)">Wykonane</button>
        </li>
    `;
}

function wykonane(el) {
	const text = el.previousElementSibling;
	text.style.textDecoration = "line-through";
}
