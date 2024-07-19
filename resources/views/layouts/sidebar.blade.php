<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item" id="sidebarLogo">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar3-range-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2h16a2 2 0 0 0-2-2zM0 8V3h16v2h-6a1 1 0 1 0 0 2h6v7a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-4h6a1 1 0 1 0 0-2z" />
            </svg>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('app-home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients-create') }}">Cadastrar cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients-index') }}">Listagem de clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Realizar reserva</a>
        </li>
    </ul>
</div>