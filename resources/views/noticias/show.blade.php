<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-darkerprimary lg:p-8">

                    <h1 class="mt-8 text-3xl text-center font-bold text-texto">
                        {{$noticia->titulo}}
                    </h1>


                    <div class="mx-auto my-4 text-center">
                        <img class="mx-auto" src="{{ asset('storage/'.$noticia->img) }}" alt="{{ $noticia->titulo }}" > <!-- Ajusta el tamaño según tus necesidades -->
                    </div>

                    <div class="text-accent text-center leading-relaxed">
                        {!!$noticia->contenido!!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
