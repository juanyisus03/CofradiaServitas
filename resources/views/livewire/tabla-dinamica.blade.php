
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-xl font-semibold text-texto text-center my-10">Listado de {{$objetoClass.'s'}}</h1>
        <div class="bg-darkerprimary overflow-hidden sm:rounded-lg">
            @if(count($objetos) === 0)
                <h1 class="text-xl font-semibold text-accent text-center my-10">Todavía no hay ningún {{$objetoClass}} guardado</h1>
            @else
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-center text-texto uppercase bg-lighterprimary">
                        <tr>

                            @if($objetoClass === 'Trono')
                                <th scope="col" class="px-6 py-3">
                                    Paso Asignado
                                </th>
                            @elseif($objetoClass === 'User')
                                <th scope="col" class="px-6 py-3">
                                    Rol
                                </th>
                            @endif
                            @foreach($objetos[0]->getAttributes() as $atributo => $value)
                                @if($atributo !== 'id' && $atributo !== 'created_at' && $atributo !== 'updated_at' && !Str::contains($atributo, '_') && $atributo !== 'password')
                                    <th scope="col" class="px-6 py-3">
                                        {{ $atributo }}
                                    </th>
                                @endif
                            @endforeach

                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-s text-center text-accent">
                        @foreach($objetos as $objeto)
                            <tr class="m-4">
                                @if($objetoClass === 'Trono')
                                    <td scope="col" class="px-6 py-3">
                                        {{ $objeto->paso->nombre }}
                                    </td>
                                @elseif($objetoClass === 'User')
                                    <td scope="col" class="px-6 py-3">
                                        {{ $objeto->rol }}
                                    </td>
                                @endif
                                @foreach($objeto->getAttributes() as $atributo => $value)
                                    @if($atributo !== 'id' && $atributo !== 'created_at' && $atributo !== 'updated_at' && !Str::contains($atributo, '_') && $atributo !== 'password')
                                        <td>{{$objeto->$atributo}}</td>
                                    @endif
                                @endforeach
                                <td class="p-4 pt-5">
                                    <div class="space-y-2">
                                        <a href="{{ route(Str::lower($objetoClass).'s.edit', $objeto->id) }}" class="text-white m-2 bg-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                            Editar {{ class_basename($objetos[0]::class) }}
                                        </a>
                                        <form action="{{ route(Str::lower($objetoClass).'s.destroy', $objeto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white m-2 bg-red-700 font-medium rounded-full text-sm px-5 py-2.5 text-center">
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
            <a href="{{route(Str::lower($objetoClass).'s.create')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                Añadir {{$objetoClass}} Nuevo
            </a>
        </div>
        </div>
    </div>
</div>
