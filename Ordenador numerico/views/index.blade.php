<!DOCTYPE html>
<html lang="es">
	<head>
			<title>@yield('title', 'Proyecto Uno')</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<link rel="stylesheet" href="{{mix('css/app.css')}}">
			<script src="{{mix('js/app.js')}}" defer></script>

	</head>
	<body>

        @section('title', 'Proyecto Uno')

        @section('content')
        <div class="container">
                <div class="row">
                        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                                <form class="bg-white shadow rounded py-3 px-4">
                                        <h1 class="display-6">@lang('Ordena los números en forma ascendete o descendente')</h1>
                                                <hr>

                                                <div class="form-group">
                                                        <label for="name">Ingresa una cadena de núemeros separados por comas. Ejem. 1,2,34,12,67</label>
                                                                <input
                                                                class="form-control bg-light shadow-sm"
                                                                value="{{old('numbers')}}"
                                                                name="numbers"
                                                                type="text"
                                                                id="numbers">
                                                </div>

                                                <div  class="form-group"class="form-control bg-light shadow-sm">

                                                        <select class="form-control bg-light shadow-sm"
                                                        name="order_numeric"
                                                        id="order_numeric" >
                                                                <option disabled="disabled" selected="selected" value="selecciona"  >Selecciona</option>
                                                                <option value="ascendente" >Ascendente </option>
                                                                <option value="descendente">Descendente</option>
                                                        </select>


                                                </div>
                                                <button class="btn btn-primary btn-lg btn-block"
                                                        type="submit"
                                                        name="procesar"
                                                        value="procesar"
                                                        id="enviar" >Procesar
                                                </button>
                                                <hr>
                                                @isset($desarrollo)
                                                        <ul class="align-items-center">
                                                                @foreach($desarrollo as $desarrolloItem)
                                                                        <li class="list-group-item border-0 mb-1 shadow-sm mx-auto">
                                                                                {{$desarrolloItem}}
                                                                        </li>

                                                                @endforeach
                                                        </ul>
                                                @endisset

        </body>
</html>
