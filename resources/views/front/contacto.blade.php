@extends('front.main')

@section('content')
    <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="mx-auto" style="max-width: 900px;">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h1 class="mb-4 text-center">📬 Contacto</h1>
                    <p class="text-center mb-5">Si tienes dudas, quieres colaborar con nosotros o realizar pedidos, utiliza
                        el formulario o contacta directamente a través de los correos o WhatsApp.</p>

                    <div class="row g-4">

                        <!-- Columna izquierda: Formulario -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm p-4 h-100">
                                <h4 class="mb-3">Formulario de contacto</h4>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form id="enviar-mensaje" action="{{ route('contacto.send') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nombre completo</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Teléfono (opcional)</label>
                                        <input type="text" name="telefono" class="form-control"
                                            value="{{ old('telefono') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Asunto</label>
                                        <select name="asunto" class="form-select" required>
                                            <option value="">Selecciona...</option>
                                            <option value="informacion"
                                                {{ old('asunto') == 'informacion' ? 'selected' : '' }}>Información sobre el
                                                club</option>
                                            <option value="colaboracion"
                                                {{ old('asunto') == 'colaboracion' ? 'selected' : '' }}>Colaboraciones /
                                                Patrocinadores</option>
                                            <option value="tienda" {{ old('asunto') == 'tienda' ? 'selected' : '' }}>Pedidos
                                                de la tienda</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mensaje</label>
                                        <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="aceptar_politica" id="aceptar_politica"
                                            class="form-check-input" required>
                                        <label class="form-check-label" for="aceptar_politica">
                                            He leído y acepto la
                                            <a href="{{ route('front.privacidad') }}" target="_blank">Política de
                                                Privacidad</a>.
                                        </label>
                                    </div>

                                    {{-- Campo oculto para evitar spam, que los bots suelen completar --}}
                                    <input type="text" name="website" style="display:none">

                                    {{-- Campo para el reCAPTCHA, que ya incluye el botón de envío --}}
                                    <div class="mb-3">
                                        {!! NoCaptcha::displaySubmit('enviar-mensaje', 'Enviar mensaje', ['class' => 'btn btn-primary w-100 mb-2']) !!}
                                        @error('g-recaptcha-response')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Columna derecha: Correos y WhatsApp -->
                        <div class="col-lg-6">
                            <div class="card shadow-sm p-4 h-100">
                                <h4 class="mb-3">Contacta directamente</h4>

                                <ul class="list-group list-group-flush mt-3">
                                    <li class="list-group-item">
                                        <strong>Información del club:</strong>
                                        <a href="mailto:adcalqazerescantera@gmail.com">adcalqazerescantera@gmail.com</a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Colaboraciones / Patrocinadores:</strong>
                                        <a
                                            href="mailto:colaboracionesadcalqazeres@gmail.com">colaboracionesadcalqazeres@gmail.com</a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Pedidos de la tienda:</strong>
                                        <a href="mailto:pedidosadcalqazeres@gmail.com">pedidosadcalqazeres@gmail.com</a>
                                    </li>
                                </ul>

                                <div class="mt-4">
                                    <p><strong>O chatea con nosotros por WhatsApp:</strong></p>
                                    <div class="text-center">
                                        <a href="https://wa.me/34699381365?text=Hola,%20quiero%20información%20sobre%20el%20ADC%20Baloncesto"
                                            target="_blank" class="btn-whatsapp">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="white" class="me-2" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.52 3.48A11.88 11.88 0 0012 0C5.37 0 .01 5.36 0 12c0 2.12.56 4.17 1.63 5.97L0 24l6.3-1.65A11.95 11.95 0 0012 24c6.63 0 12-5.36 12-12a11.88 11.88 0 00-3.48-8.52zm-8.5 17.02c-2.11 0-4.13-.55-5.88-1.56l-.42-.25-3.73.97.99-3.63-.27-.39A9.94 9.94 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.29-7.23c-.29-.15-1.7-.83-1.96-.92-.26-.09-.45-.14-.64.14s-.74.92-.91 1.11c-.17.19-.33.21-.62.07s-1.24-.46-2.36-1.45c-.87-.77-1.46-1.72-1.63-1.91-.17-.19-.02-.29.12-.44.12-.12.27-.31.41-.46.14-.15.19-.25.29-.42.09-.17.05-.32-.02-.46-.07-.14-.64-1.54-.88-2.11-.23-.55-.47-.48-.64-.49-.16-.01-.35-.01-.54-.01-.18 0-.46.07-.7.33s-.92.9-.92 2.2.94 2.55 1.07 2.73c.12.18 1.85 2.83 4.48 3.96 2.63 1.14 2.63.76 3.1.71.47-.05 1.54-.63 1.76-1.24.22-.61.22-1.14.15-1.25-.07-.11-.26-.18-.54-.33z" />
                                            </svg> Chatear en WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- row g-4 -->

                </div>
            </div>
        </div>
    </div>
@endsection
