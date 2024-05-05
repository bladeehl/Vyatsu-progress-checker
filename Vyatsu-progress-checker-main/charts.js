function MergeRecursive(obj1, obj2) {
	for (var p in obj2) {
		try {
			if ( obj2[p].constructor==Object ) {
				obj1[p] = MergeRecursive(obj1[p], obj2[p]);
			} else {
				obj1[p] = obj2[p];
			}
		} catch(e) {
			obj1[p] = obj2[p];
		}
	}
	return obj1;
}

function HighchartsInit(container, options) {
	let chart = new Highcharts.StockChart(MergeRecursive({
		chart: {
		   renderTo: container,
		   backgroundColor: 'rgba(0, 0, 0, 0)',
		   //borderRadius: '20px',
	      style: {
	         fontFamily: "Dosis, sans-serif"
	      }
		},
		title: {
			style: {
	         fontSize: '10px',
	         color: '#646464'
	      },
		   text: '',
		},
		xAxis: {
			title: {
         	text: null
     		},
     		lineWidth: 0,
		},
		yAxis: [{
			visible: true,
		   title: {
		      text: ''
		   },
		   labels: {
		      formatter: function () {
		         return this.value;
		      },
		      tickInterval: 1
		   },
		   plotLines: [{
		      value: 0,
		      width: 2
		   }],
		}],

		tooltip: {
			enabled: true,
		   pointFormat: '<span style="color:{series.color};font-size:16px;">{series.name}</span>: <b>{point.y}</b><br/>',
		   valueDecimals: 2,
		   shared: true,
		   split: false,
		   useHTML: true,
		   formatter: function() {
		      return "<div style='display: inline-block; white-space:normal;'>" + this.point.y + "</div>";
		   }
		},

		rangeSelector : { // кнопки для навигациии
         enabled : false
		},

		credits: {
		  enabled: false
		},

		series: [{
			data: [],
			stacking: 'normal'
		}],

		navigator : {
			enabled : false,
		},

		scrollbar: {
			enabled: false
		},
	}, options));

	Highcharts.theme = {
		lang: {
			months: [
			   'Январь', 'Февраль', 'Март', 'Апрель','Май', 'Июнь', 'Июль', 'Август','Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
			],
			shortMonths: [
				'Янв', 'Фев', 'Мар', 'Апр','Май', 'Июнь', 'Июль', 'Авг','Сен', 'Окт', 'Ноя', 'Дек'
			],
			weekdays: [
				'Понедельник', 'Вторник', 'Среда', 'Четверг','Пятница', 'Суббота', 'Воскресенье'
			]
		},
	};
	Highcharts.setOptions(Highcharts.theme);

	return chart;
}

(function (H) {
	H.wrap(H.Chart.prototype, 'showResetZoom', function (proceed) {
   });
}(Highcharts)); // скрыть кнопку зумирования

// диаграмма 1
var chart1 = HighchartsInit('container1', {
	xAxis: [{
		lineWidth: 0,
		tickLength: 0,
		labels: {
			align: 'center',
			//enabled: false,
			distance: 30,
			useHTML: true,
			formatter: function () {
			   return `<tspan style="background-color: rgba(149, 171, 188, 1); border-radius: 20px; font-size: ${this.chart.series[0].columnMetrics.width/2}px; padding: ${this.chart.series[0].columnMetrics.width/4}px; padding-left: 20px; padding-right: 20px">${this.chart.series[0].data2[this.pos].name}</tspan>`; // отображение названий дисциплин
			},
			style: {
				whiteSpace: 'nowrap'
			}
		},
		tickInterval: 1,
	}],
	yAxis: [{
		tickmarkPlacement: 0.3,
		visible: false,
		max: 110,
	}],
	series: [{
		minPointLength: 3,
		name: 'Количество работ',
		type: 'bar',
	}],
	plotOptions: {
  		bar: {
  			grouping: true,
      	borderRadiusTopLeft: '50%',
  			borderRadiusTopRight: '50%',
  			borderRadiusBottomLeft: '50%',
  			borderRadiusBottomRight: '50%',
      	dataLabels: { // метки значений у столбцов
      		crop: false,
      		overflow: 'allow',
         	enabled: true,
         	formatter: function () {
		         return Math.round(this.point.y) + " %";
		      },
		      style:{
               textOutline: 'none',
               color: '#ffffff',
               fontSize: '12pt',
               fontWeight: 300
            }
      	},

     	}
   },
   tooltip: {
		enabled: false,
	},
});
// диаграмма 2
var chart2 = HighchartsInit('container2', {
	xAxis: [{
		opposite: true, // инвертировать ось
     	gridLineWidth: 0,
     	
     	labels: { // метки
     		useHTML: true,
			formatter: function () {
				return `${this.chart.series[0].data2[this.pos].name}`;
			},
     		style: {
     			fontSize: "10px",
     		},
     		distance: 5 // дистанция между меткой и осью
     	},
     	tickLength: 0,// длина черточек
     	lineWidth: 0,
   }],
   yAxis: [{
   	labels: { // метки
   		enabled: false,
     	},
     	gridLineWidth: 0,
     	max: 100
   }],
	series: [{
		name: 'Посещение',
		type: 'column'
	}]
});
// диаграмма 3
var chart3 = HighchartsInit('container3', {
	legend: {
		enabled: true,
		layout: 'vertical',
	   align: 'right',
	   verticalAlign: 'middle',
	   x: -15,
	   labelFormat: '<div style="color: {color};text-shadow: #000 0px 0px 1px;-webkit-font-smoothing: antialiased;">{name}</div>',
	   symbolHeight: 0,
	   symbolWidth: 0
	},
	plotOptions: {
  		pie: {
  			borderRadius: 0,
  			borderWidth: 0,
  			dataLabels: {
  				enabled: false,
  			},
  		},
  	},
	series: [{
		showInLegend: true,
		name: 'Количество работ',
		type: 'pie',
		innerSize: '80%',
	}]
});
// 1 горизонтальная диаграмма
data1.forEach((element) => element.color = `rgb(${Math.round(Math.random()*255)}, ${Math.round(Math.random()*255)}, ${Math.round(Math.random()*255)})`); // раскраска колонок в цвета
chart1.series[0].data2 = data1;
chart1.series[0].setData(chart1.series[0].data2); // вставить данные в диаграмму
chart1.redraw();

// 2 столбчатая диаграмма
chart2.series[0].data2 = data2;
chart2.series[0].setData(chart2.series[0].data2)
chart2.redraw();

// 3 диаграмма - пончик
chart3.series[0].setData(data3);
chart3.redraw();