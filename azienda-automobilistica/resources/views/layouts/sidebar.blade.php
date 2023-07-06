<div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light p-2" style="height: 57px; display:flex; justify-content:center; align-items:center">
                <a href="{{ route('/') }}" style="color: inherit; text-decoration: none; ">Azienda automobilistica</a>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('officine*') ? 'active' : '' }}" href="{{ route('officine.index') }}">Officine</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('clienti*') ? 'active' : '' }}" href="{{ route('clienti.index') }}">Clienti</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('meccanici*') ? 'active' : '' }}" href="{{ route('meccanici.index') }}">Meccanici</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('consulenti*') ? 'active' : '' }}" href="{{ route('consulenti.index') }}">Consulenti</a>
                 <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('veicoli*') ? 'active' : '' }}" href="{{ route('veicoli.index') }}">Veicoli</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('pezzi_di_ricambio*') ? 'active' : '' }}" href="{{ route('pezzi_di_ricambio.index') }}">Pezzi di ricambio</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('accessori*') ? 'active' : '' }}" href="{{ route('accessori.index') }}">Accessori</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('acquisti_in_store*') ? 'active' : '' }}" href="{{ route('acquisti_in_store.index') }}">Acquisti in store</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3
                 {{ request()->is('recensioni*') ? 'active' : '' }}" href="{{ route('recensioni.index') }}">Recensioni</a>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper" style="width: 100%;">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"  style="height: 57px;">
                <div class="container-fluid">

                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>
    </div>
</div>
