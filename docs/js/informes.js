let welcome;
let date = new Date();
let hour = date.getHours();
let minute = date.getMinutes();
let second = date.getSeconds();
if (minute < 10) {
	minute = "0" + minute;
}
if (second < 10) {
	second = "0" + second;
}
if (hour < 12) {
	welcome = "Buenos dias!";
} else if (hour < 17) {
	welcome = "Buenas tardes!";
} else {
	welcome = "Buenas noches!";
}

function display(val) {
	if (event.key === 'Enter') {
		if ((val.value).length > 0) {
			console.log(val.value)
			customAlert(`Buscando: "${val.value}"`, 3500)
		} else {
			customWarn('Escribe lo que deseas buscar', 1500)
		}
	}
}


$(document).ready(function () {
	const body = document.querySelector('body');
	const toggled = document.getElementById('toggle');
	const media = window.matchMedia("(min-width:700px)")

	toggled.onclick = function () {
		body.classList.toggle('light');
		toggled.classList.toggle('active')
	}
	if (media.matches) {
		console.log(true)
		$('#dashboard').mouseenter(function () {
			this.innerHTML = `¡${welcome}`;
		});
		$('#dashboard').mouseleave(function () {
			this.innerHTML = "Panel de control";
		});
		$('#kleenpulse').mouseenter(function () {
			this.innerHTML = "Bienvenido";
		});
		$('#kleenpulse').mouseleave(function () {
			this.innerHTML = "Zayro System";
		});
	} else {
		console.log(false)
	}
})

function customAlert(msg, duration) {
	var styler = document.createElement("div");
	styler.className = 'dis-wrap'

	styler.innerHTML = "<h1 class='display'>" + msg + "</h1>";
	setTimeout(function () {
		styler.parentNode.removeChild(styler);
	}, duration);
	document.body.appendChild(styler);
}

function customWarn(msg, duration) {
	var styler = document.createElement("div");
	styler.className = 'dis-warn'

	styler.innerHTML = "<h1 class='display'>" + msg + "</h1>";
	setTimeout(function () {
		styler.parentNode.removeChild(styler);
	}, duration);
	document.body.appendChild(styler);
}



$(function () {
	$('#highchart_container').highcharts({
		chart: {
			type: 'bar'
		},
		title: {
			text: 'Disfraces más populares'
		},
		subtitle: {
			text: 'Fuente: Inventario'
		},
		xAxis: {
			categories: ['Camuflaje Militar',
				'Miles Morales - Hombre araña',
				'Monstruo de Frankenstein',
				'Aprendiz de bruja',
				'Espantapájaros',
				'Pirata',
				'Vampiro',
				'Zombie',
				'Payaso',
				'Superhéroe',
				'Princesa',
				'Superheroína',
				'Ninja',
				'Mimo',
				'Estrella del rock',
				'Dinosaurio',
				'Enfermera',
				'Robot',
				'Mujer de negocios',
				'Bombera',
				'Muñeca de porcelana',
				'Demonio',
				'Harry Potter',
				'Caballero',
				'Hombre lobo',
				'Marinero',
				'Bailarina de ballet',
				'Discovery Charter',
				'Piloto de avión',
				'Dama de honor',
				'Héroe de cómic',
				'Futbolista',
				'Caperucita Roja'],
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: '*Inventario',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},  credits: {
			enabled: false
		},
		series: [{
			data: [89.2,
				88.4,
				87.7,
				86.6,
				86.1,
				83.9,
				83.8,
				81.8,
				81.5,
				79.5,
				79.5,
				77,
				76.7,
				74.8,
				74.7,
				74.6,
				74.1,
				74.1,
				73.9,
				72.5,
				72.4,
				72.4,
				71.9,
				71.7,
				71.2,
				70.2,
				69.9,
				69.8,
				69.8,
				69.4,
				67.9,
				67.6,
				66.9],
			name: 'Puntaje de popularidad debido a la demanda'
		}]

	});
});