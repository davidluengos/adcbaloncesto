{{-- Banner de cookies – ADC Baloncesto (solo estadísticas) --}}
@if (!request()->cookie('cookies_stats_accepted') && !request()->cookie('cookies_stats_declined'))
    <div id="cookie-banner" class="alert alert-warning text-center fixed-bottom m-0 p-3" style="z-index: 1050;">
        En <strong>ADC Baloncesto</strong> utilizamos cookies de estadísticas para conocer de forma anónima cómo se
        usa la web y mejorar la experiencia.
        <button id="accept-cookies" class="btn btn-sm btn-primary ms-2">Aceptar</button>
        <button id="reject-cookies" class="btn btn-sm btn-secondary ms-2">Rechazar</button>
        <a href="{{ url('/politica-cookies') }}" class="btn btn-sm btn-link ms-2">Más información</a>
    </div>

    <script>
        (function() {
            const banner = document.getElementById('cookie-banner');

            function getCookie(name) {
                const value = "; " + document.cookie;
                const parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
                return null;
            }

            if (getCookie('cookies_stats_accepted') || getCookie('cookies_stats_declined')) {
                if (banner) banner.style.display = 'none';
                return;
            }

            function setCookie(name, days) {
                const d = new Date();
                d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
                document.cookie = name + "=1; expires=" + d.toUTCString() + "; path=/";
            }

            document.getElementById('accept-cookies').addEventListener('click', function() {
                setCookie('cookies_stats_accepted', 30);
                if (banner) banner.style.display = 'none';
            });

            document.getElementById('reject-cookies').addEventListener('click', function() {
                setCookie('cookies_stats_declined', 30);
                if (banner) banner.style.display = 'none';
            });
        })();
    </script>
@endif
{{-- Fin banner de cookies --}}