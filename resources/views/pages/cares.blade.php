@extends('layouts.base')

@section('title', 'Pagina principal')

@section('content')


<!-- Publicaciones -->
<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title">Aseo de tu mascota</h4>
        <h6 class="card-subtitle mb-2 text-muted">Juan M. Hernandez</h6>
        <p class="card-text">Una mascota no es un objeto más de la casa, es otro miembro
            de la familia y como tal debe tener todos los cuidados, más allá de solo
            hacerlo cuando se presentan enfermedades o se percibe que el animal lo necesita de urgencia.</p>
            <img class="mb-3" src="https://picsum.photos/600" alt="">
        <p class="card-text" >La médico veterinaria Eliana Molineros, de Mansión Mascota, 
            indica que el control, tanto en perros y gatos, por lo general inicia a
            las cuatro semanas de edad, cuando el animal está cambiando su alimentación de líquida 
            a sólida. Aunque lo ideal sería que la observación empiece desde el útero.</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Salud</h4>
        <h6 class="card-subtitle mb-2 text-muted">Juan M. Hernandez</h6>
        <p class="card-text">Todos los animales, estén en la etapa de 
            la vida en la que estén, necesitarán ciertos cuidados para mantener su salud. 
            Pon de tu parte para mantener el calendario de vacunación y desparasitación al día. 
            Además, aunque tu peludo goce de buena salud acude, al menos, una vez al año al 
            veterinario para que le hagan una revisión general, hay enfermedades que no 
            tienen síntomas evidentes y pueden estar dañando a tu compañero.</p>
            <img class="mb-3" src="https://picsum.photos/600?random=3" alt="">
        <p class="card-text">Si tienes un cachorro tendrás que atender a las primeras vacunas, 
            tal vez alguna diarrea que sufra por el cambio de alimentación al llegar a tu hogar, 
            problemas en los dientes… Si tu mascota es anciana deberás prestar atención a problemas 
            en sus huesos, su oído y visión, un estómago más delicado…</p>
    </div>
</div>

@endsection
