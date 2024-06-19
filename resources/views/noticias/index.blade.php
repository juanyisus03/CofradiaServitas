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
                    <div class="bg-darkerprimary p-5 mx-auto mb-4 flex flex-row">
                        <div class="image-container">
                            <img src="{{asset($noticia->img)}}" alt="{{$noticia->titulo}}">

                        </div>
                        <div class="text-texto">
                            <h2>{{$noticia->titulo}}</h2>

                        </div>
                    </div>
                @endforeach


            @endif
        </div>
    </div>
</x-app-layout>
