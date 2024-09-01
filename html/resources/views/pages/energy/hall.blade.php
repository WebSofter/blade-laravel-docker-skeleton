@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- Navbar Start -->
@include('partials.nav')        
<!-- Navbar End -->

<!-- Sidebar Start -->
@include('partials.sidebar')  
<!-- Sidebar End -->

<!-- Main Content Start -->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 fw-bold fs-3">Конференц-зал</div>

      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/highcharts-more.js"></script>
      <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
      <script src="https://code.highcharts.com/stock/highstock.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/stock/modules/stock.js"></script>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="container2" style="height: 500px; min-width: 310px"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="container2" style="height: 500px; min-width: 310px"></div>
	<script>
		Highcharts.setOptions({
			lang: {
				loading: 'Загрузка...',
				months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
				weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
				shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
				exportButtonTitle: "Экспорт",
				printButtonTitle: "Печать",
				rangeSelectorFrom: "С",
				rangeSelectorTo: "По",
				rangeSelectorZoom: "Период",
				downloadPNG: 'Скачать PNG',
				downloadJPEG: 'Скачать JPEG',
				downloadPDF: 'Скачать PDF',
				downloadSVG: 'Скачать SVG',
				printChart: 'Напечатать график'
			}
		});

		jQuery.getJSON('/api/energy/hall', function (data) {

			// split the data set into voltage and current
			var voltage = [],
				current = [],
				active = [],
				dataLength = data.length,

				i = 0;
			for (i; i < dataLength; i += 1) {
				voltage.push([
					data[i][0] * 1000, // the date
					data[i][1], // voltage
				]);

				current.push([
					data[i][0] * 1000, // the date
					data[i][2] // the current
				]);

				active.push([
					data[i][0] * 1000, // the date
					data[i][3] // the active power
				]);
			}


			// create the chart
			Highcharts.stockChart('container2', {

				rangeSelector: {
					selected: 1,
					buttons: [{
						type: 'minute',
						count: 10,
						text: '10м'
					}, {
						type: 'hour',
						count: 1,
						text: '1час'
					}, {
						type: 'hour',
						count: 6,
						text: '6час'
					}, {
						type: 'day',
						count: 1,
						text: '1дн'
					}, {
						type: 'week',
						count: 1,
						text: 'неделя'
					}, {
						type: 'month',
						count: 1,
						text: 'мес'
					}, {
						type: 'year',
						count: 1,
						text: 'год'
					}, {
						type: 'all',
						text: 'Всё'
					}]
				},

				title: {
					text: 'КОНФЕРЕНЦ-ЗАЛ'
				},

				yAxis: [{
					labels: {
						align: 'right',
						x: -3
					},
					title: {
						text: 'Напряжение'
					},
					height: '50%',
					lineWidth: 1,
					resize: {
						enabled: true
					}
				}, {
					labels: {
						align: 'right',
						x: -3
					},
					title: {
						text: 'Ток'
					},
					top: '52%',
					height: '20%',
					offset: 0,
					lineWidth: 1
				}, {
					labels: {
						align: 'right',
						x: -3
					},
					title: {
						text: 'Мощьность'
					},
					top: '75%',
					height: '20%',
					offset: 0,
					lineWidth: 1
				}],

				tooltip: {
					split: true
				},

				series: [{
					type: 'spline',
					name: 'Вольт',
					data: voltage,
					yAxis: 0
				}, {
					type: 'spline',
					name: 'Ампер',
					data: current,
					yAxis: 1
				}, {
					type: 'spline',
					name: 'Ватт',
					data: active,
					yAxis: 2
				}]
			});
		});
	</script>
</main>
<!-- Main Content End -->
@endsection