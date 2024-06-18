<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('ensers.update', $enser->id) }}" class="max-w-sm mx-auto mb-4 flex flex-col bg-darkerprimary space-y-8 border border-secondary rounded-lg p-4">
                @csrf
                @method('PUT') <!-- Indica que es un método PUT -->

                <h1 class="max-w-sm text-2xl font-bold leading-none text-accent">Editar Enser</h1>

                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-accent">Nombre</label>
                    <input autocomplete="off" type="text" name="nombre" id="nombre" value="{{ $enser->nombre }}" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           required />
                </div>

                <div>
                    <label for="Paso" class="block mb-2 text-sm font-medium text-accent">Selecciona a cual paso pertenecerá</label>
                    <select name="paso" id="Paso" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        @foreach($pasos as $paso)
                            <option value="{{ $paso->id }}">{{ $paso->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="estado" class="block mb-2 text-sm font-medium text-accent">Estado</label>
                    <input autocomplete="off" type="text" name="estado" id="estado" value="{{ $enser->estado }}" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           required />
                </div>

                <div>
                    <label for="cantidad" class="block mb-2 text-sm font-medium text-accent">Cantidad</label>
                    <input autocomplete="off" type="number" name="cantidad" id="cantidad" value="{{ $enser->cantidad }}" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                           required />
                </div>

                <div>
                    <button type="submit" class="text-texto bg-primary hover:bg-primary-dark focus:outline-none focus:ring-4 focus:ring-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Actualizar Enser
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
