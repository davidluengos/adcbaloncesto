@extends('front.main')

@section('content')
    <!-- 404 Start -->
    <div class="container-xxl py-5" id="plantilla">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Clasificación Primera Nacional Extremadura</p>
            </div>
        </div>
    </div>
    {{-- Si no hay datos, no mostrar la tabla --}}
    @if (empty($clasificacion))
        <div class="wow fadeInUp text-center" data-wow-delay="0.1s">
            <p>No hay datos disponibles para mostrar.</p>
        </div>
    @else
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Equipo</th>
                                <th>PJ</th>
                                <th>PG</th>
                                <th>PP</th>
                                <th>PF</th>
                                <th>PC</th>
                                <th>PTS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clasificacion as $item)
                                {{-- Resaltar la fila del equipo ADC --}}
                                @if (strpos($item['EQUIPO'], 'ADC BALONCESTO') !== false)
                                    <tr class="table-info">
                                    @else
                                    <tr>
                                @endif
                                <td>{{ $item['posicion'] }}</td>
                                <td>{{ $item['EQUIPO'] }}</td>
                                <td>{{ $item['PJ'] }}</td>
                                <td>{{ $item['PG'] }}</td>
                                <td>{{ $item['PP'] }}</td>
                                <td>{{ $item['PF'] }}</td>
                                <td>{{ $item['PC'] }}</td>
                                <td>{{ $item['PTS'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <iframe src="https://www.feb.es/Pasarela/Controles/clasificacion.aspx?g=67" frameborder="0" allowfullscreen></iframe> -->
                </div>
            </div>
        </div>
    @endif
@endsection
