{{-- Alertas del juego --}}
@if (session('mensaje') && session('tipo'))
    <div class="alert alert-{{ session('tipo') }} alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
    </div>
@endif
