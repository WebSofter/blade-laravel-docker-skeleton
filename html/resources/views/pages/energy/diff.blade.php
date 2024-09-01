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
                <div class="col-md-12 fw-bold fs-3">Разница расхода</div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-5" style="max-width: 750px;margin:0 auto;">
                                <div class="card-header">
                                    Калькулятор энергии
                                </div>
                                <img src="https://img.freepik.com/premium-photo/energy-saving-calculating-house-energy-efficiency-rate-calculator-led-light-bulbs-money-yellow-background-banner-flat-lay-photo_526934-3126.jpg"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Выберите промежуток времени для расчета</h5>
                                    <div class="mb-3 row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">От</label>
                                        <div class="col-sm-10">
                                            <input type="datetime-local" class="datepicker-here form-control"
                                                id="datetime-start" data-date-format="dd/mm/yyyy" data-language='ru'
                                                placeholder="начальное время">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">До</label>
                                        <div class="col-sm-10">
                                            <input type="datetime-local" class="datepicker-here form-control"
                                                id="datetime-end" data-date-format="dd/mm/yyyy" data-language='ru'
                                                placeholder="конечное время">
                                        </div>
                                    </div>
                                    <p class="card-text">Расход: <span id="calc-result">Нет данных</span></p>
                                    <button id="do-calc" class="btn btn-primary">Расчитать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery('#do-calc').click(e => {
                const dStart = jQuery('#datetime-start').val()
                const dEnd = jQuery('#datetime-end').val();
                jQuery.post('/api/energy/diff', {
                    dStart,
                    dEnd,
                }, function(response) {
                    // Handle the response here
                    console.log(response);
                    if(response.status == 'success') jQuery('#calc-result').html(response.result + ' кВтч')
                    else jQuery('#calc-result').html(response.result)
                });
            })
        </script>
    </main>
    <!-- Main Content End -->
@endsection
