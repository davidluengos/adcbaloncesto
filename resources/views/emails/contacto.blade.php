@component('mail::message')
# Nuevo mensaje de contacto

Se ha recibido un nuevo mensaje desde el formulario de contacto con los siguientes datos:

**Nombre:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  

@if(!empty($data['telefono']))
**Teléfono:** {{ $data['telefono'] }}  
@endif

**Asunto:** {{ ucfirst($data['asunto']) }}  

**Mensaje:**  
{{ $data['message'] }}

@if(!empty($data['website']))
**Honeypot (para control de spam):** {{ $data['website'] }}
@endif

Gracias por revisar este mensaje. Puedes responder directamente al usuario haciendo clic en “Responder”, ya que el correo tiene configurado `replyTo`.

Un saludo,  
El equipo de {{ config('app.name') }}
@endcomponent

