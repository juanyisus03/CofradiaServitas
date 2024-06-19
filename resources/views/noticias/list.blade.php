
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-semibold text-texto text-center my-10">Listado de Noticias</h1>
            <div class="bg-darkerprimary overflow-hidden sm:rounded-lg">
                @if(count($noticias) === 0)
                    <h1 class="text-xl font-semibold text-accent text-center my-10">Todavía no has añadido ninguna Noticia</h1>
                @else
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-center text-texto uppercase bg-lighterprimary">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Título
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-s text-center text-accent">
                            @foreach($noticias as $noticia)
                                <tr class="m-4">
                                    <td class="p-4 pt-5">
                                        {{$noticia->titulo}}
                                    </td>

                                    <td class="p-4 pt-5">
                                        <div class="space-y-2">
                                            @if($noticia->rol !== 'Administrador')
                                            <a href="{{route('noticias.edit', $noticia->id) }}" class="text-white m-2 bg-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                                Editar Noticia
                                            </a>
                                                <form action="{{route('noticias.destroy', $noticia->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white m-2 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                                        Borrar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <div class="mx-7 mb-5">
                   {{$noticias->links('vendor.pagination.custom')}}
                </div>
                <div class="mx-7 mb-5">
                    <a href="{{route('noticias.create')}}" class="text-white bg-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Añadir Noticia nuevo
                    </a>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
