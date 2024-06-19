<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-darkerprimary lg:p-8">

                    <h1 class="mt-8 text-3xl text-center font-bold text-texto">
                        {{ $noticia->titulo }}
                    </h1>

                    <div class="mx-auto my-4 text-center">
                        <img class="mx-auto" src="{{ asset('storage/' . $noticia->img) }}" alt="{{ $noticia->titulo }}">
                    </div>

                    <div class="text-accent text-center leading-relaxed">
                        {!! $noticia->contenido !!}
                    </div>

                    @auth
                        <div class="mt-4 text-center">
                            <form action="{{ route('suscribir', ['noticia' => $noticia->id]) }}" method="POST">
                                @csrf
                                @if (Auth::user()->noticias->contains($noticia))
                                    <button type="submit"
                                        class="bg-primary text-texto font-bold py-2 px-4 rounded">
                                        Desuscribirse
                                    </button>
                                @else
                                    <button type="submit"
                                        class="bg-primary  text-texto font-bold py-2 px-4 rounded">
                                        Suscribirse
                                    </button>

                                @endif
                            </form>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
