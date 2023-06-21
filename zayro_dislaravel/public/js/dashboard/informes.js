
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
				'Bombera'],
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
		}, credits: {
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
				72.5],
			name: 'Puntaje de popularidad debido a la demanda'
		}]
	});
});