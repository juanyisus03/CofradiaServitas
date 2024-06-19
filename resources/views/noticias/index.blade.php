<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-semibold text-texto text-center my-10">Noticias</h1>
            @if ($noticias->isEmpty())
                <div class="bg-darkerprimary overflow-hidden sm:rounded-lg">
                    <h1 class="text-xl font-semibold text-accent text-center my-10">Todavía no hay ninguna noticia</h1>
                </div>
            @else
                @foreach ($noticias as $noticia)
                <a href="{{route('noticias.show', $noticia->id)}}">
                    <div class="bg-darkerprimary p-5 mx-auto mb-4 rounded-xl flex items-start space-x-4">
                        <div class="image-container flex-shrink-0">
                            <img src="{{ asset('storage/'.$noticia->img) }}" alt="{{ $noticia->titulo }}" class="w-24 h-24 object-cover rounded-lg"> <!-- Ajusta el tamaño según tus necesidades -->
                        </div>
                        <div class="text-texto my-auto">
                            <h2 class="text-lg font-bold mb-2">{{ $noticia->titulo }}</h2>
                        </div>
                    </div>
                </a>
                @endforeach

                <div class="mx-auto">
                    {{ $noticias->links('vendor.pagination.noticias') }}
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
