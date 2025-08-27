@component('mail::message')
# Nuevo pedido

Hola {{ $cliente['nombre'] }},

Se ha realizado un nuevo pedido con los siguientes datos:

**Teléfono:** {{ $cliente['telefono'] }}  
**Email:** {{ $cliente['email'] }}  
@if(!empty($cliente['comentarios']))
**Comentarios:** {{ $cliente['comentarios'] }}  
@endif
**Socio:** {{ $cliente['socio'] ? 'Sí' : 'No' }}

## Productos

@component('mail::table')
| Producto | Cantidad | Talla | Precio | Subtotal |
| -------- | -------- | ----- | ------ | -------- |
@foreach($cart as $item)
| {{ $item['nombre'] }} | {{ $item['cantidad'] }} | {{ $item['talla'] ?? '-' }} | {{ number_format($item['precio'],2) }} € | {{ number_format($item['precio'] * $item['cantidad'],2) }} € |
@endforeach
| **Total** | - | - | - | **{{ number_format($total,2) }} €** |
@endcomponent

Gracias por tu pedido. Nos pondremos en contacto contigo próximamente.

Un saludo,

El equipo de {{ config('app.name') }}

@endcomponent
