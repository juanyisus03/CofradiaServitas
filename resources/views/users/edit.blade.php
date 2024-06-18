<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="max-w-sm mx-auto mb-4 flex flex-col bg-darkerprimary space-y-8 border border-secondary rounded-lg p-4">
                @csrf
                @method('PUT')

                <h1 class="max-w-sm text-2xl font-bold leading-none text-accent">Editar Usuario</h1>

                <div>
                    <label for="rol" class="block mb-2 text-sm font-medium text-accent">Rol</label>
                    <select name="rol" id="rol" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        @foreach($roles as $rol)
                            <option value="{{ $rol }}" {{ $rol == $user->rol ? 'selected' : '' }}>
                                {{ $rol }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-accent">Nombre</label>
                    <input autocomplete="off"  type="name" name="name" id="name" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           value="{{ $user->name }}" required />
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-accent">Correo Electrónico</label>
                    <input autocomplete="off"  type="email" name="email" id="email" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           value="{{ $user->email }}" required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-accent">Contraseña</label>
                    <input autocomplete="off"  type="password" name="password" id="password" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           value="" required />
                </div>

                <div>
                    <button type="submit" class="text-texto bg-primary hover:bg-primary-dark focus:outline-none focus:ring-4 focus:ring-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
