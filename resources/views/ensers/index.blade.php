<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-xl font-semibold text-texto text-center my-10">Listado de Enseres</h1>
        <div class="bg-darkerprimary overflow-hidden sm:rounded-lg">
            @if($enseres->isEmpty())
                <h1 class="text-xl font-semibold text-accent text-center my-10">Todavía no hay ningún enser guardado</h1>
            @else
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-center text-texto uppercase bg-lighterprimary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-s text-center text-accent">
                        @foreach($enseres as $enser)
                            <tr class="m-4">
                                <td class="p-4 pt-5">
                                    {{$enser->nombre}}
                                </td>
                                <td class="p-4 pt-5">
                                    {{$enser->estado}}
                                </td>
                                <td class="p-4 pt-5">
                                    {{$enser->cantidad}}
                                </td>
                                <td class="p-4 pt-5">
                                    <div class="space-y-2">
                                        <a href="{{route('ensers.edit', $enser->id) }}" class="text-white m-2 bg-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                            Editar Enser
                                        </a>
                                        <form action="{{route('ensers.destroy', $enser->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este enser?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white m-2 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="mx-7 mb-5">
               {{$enseres->links('vendor.pagination.custom')}}
            </div>
            <div class="mx-7 mb-5">
                <a href="{{route('ensers.create')}}" class="text-white bg-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                    Añadir Enser nuevo
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
