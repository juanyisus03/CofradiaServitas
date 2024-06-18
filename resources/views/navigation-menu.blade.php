<nav x-data="{ open: false }" class="bg-darkerprimary border-b border-secondary">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-18">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('inicio') }}">
                        <x-application-mark class="block w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @php
                        $active = request()->routeIs('inicio');
                    @endphp
                    <a href="{{ route('inicio') }}" class="{{ $active ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary text-sm font-medium leading-5 text-texto focus:outline-none focus:border-primary transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out' }}">
                        {{ __('Inicio') }}
                    </a>
                </div>

                @ifRangoAlto
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        @php
                            $active = request()->routeIs('tronos.index');
                        @endphp
                        <a href="{{ route('tronos.index') }}" class="{{ $active ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary text-sm font-medium leading-5 text-texto focus:outline-none focus:border-primary transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out' }}">
                            {{ __('Tronos') }}
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        @php
                            $active = request()->routeIs('ensers.index');
                        @endphp
                        <a href="{{ route('ensers.index') }}" class="{{ $active ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary text-sm font-medium leading-5 text-texto focus:outline-none focus:border-primary transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out' }}">
                            {{ __('Enseres') }}
                        </a>
                    </div>
                    @admin
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            @php
                                $active = request()->routeIs('users.index');
                            @endphp
                            <a href="{{ route('users.index') }}" class="{{ $active ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary text-sm font-medium leading-5 text-texto focus:outline-none focus:border-primary transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out' }}">
                                {{ __('Usuarios') }}
                            </a>
                        </div>
                    @endadmin
                @endifRangoAlto
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <!-- Settings Dropdown -->
                    <div class="relative ml-3">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button type="button" class="flex items-center text-sm font-medium text-accent border border-transparent focus:outline-none transition duration-150 ease-in-out">
                                    <span class="inline-flex">
                                        {{ Auth::user()->name }}
                                        <svg class="-mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <circle cy="5" cx="10" r="2" />
                                            <circle cy="10" cx="10" r="2" />
                                            <circle cy="15" cx="10" r="2" />
                                        </svg>

                                    </span>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-texto ">
                                    {{ __('Manejar Cuenta') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <!-- Botones de Iniciar Sesión y Registrarse -->
                    <div class="relative ml-3">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out">
                            {{ __('Iniciar Sesion') }}
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-accent hover:text-texto hover:border-primary focus:outline-none focus:text-texto focus:border-secondary transition duration-150 ease-in-out">
                                {{ __('Registrarse') }}
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
