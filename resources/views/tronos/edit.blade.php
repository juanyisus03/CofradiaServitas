<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('tronos.update', $trono->id) }}" class="max-w-sm mx-auto mb-4 flex flex-col space-y-8 bg-darkerprimary border border-secondary rounded-lg p-4">
                @csrf
                @method('PUT')

                <h1 class="max-w-sm text-2xl font-bold leading-none text-accent">Editar Trono</h1>

                <div>
                    <label for="Paso" class="block mb-2 text-sm font-medium text-accent">Selecciona a cual paso pertenecerá</label>
                    <select name="paso" id="Paso" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        @foreach($pasos as $paso)
                            <option value="{{ $paso->id }}" {{ $paso->id == $trono->paso_id ? 'selected' : '' }}>
                                {{ $paso->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="cofradia" class="block mb-2 text-sm font-medium text-accent">Cofradía a la que Pertenece</label>
                    <input autocomplete="off"  type="text" name="cofradia" id="cofradia" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           placeholder="Ej: Cofradía Servitas" value="{{ $trono->cofradia }}" required />
                </div>

                <div>
                    <label for="estado" class="block mb-2 text-sm font-medium text-accent">Estado del Trono</label>
                    <input autocomplete="off"  type="text" name="estado" id="estado" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           placeholder="Ej: En perfectas Condiciones" value="{{ $trono->estado }}" required />
                </div>

                <div>
                    <button type="submit" class="text-texto bg-primary hover:bg-primary focus:outline-none focus:ring-4 focus:ring-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Actualizar Trono
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
