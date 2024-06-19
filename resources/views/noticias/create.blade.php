<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-darkerprimary space-y-8 border border-secondary rounded-lg p-4">
                @csrf

                <h1 class="text-2xl font-bold text-accent mb-4">Crear Noticia</h1>

                <div class="mb-4 flex flex-col sm:flex-row sm:items-center">

                    <div class="flex-1 mb-4 sm:mr-4">
                        <label for="titulo" class="block mb-2 text-sm font-medium text-accent">Título</label>
                        <input autocomplete="off" type="text" name="titulo" id="titulo" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required />
                    </div>

                    <div class="flex-1 mb-4">
                        <label for="fecha" class="block mb-2 text-sm font-medium text-accent">Fecha de Publicación</label>
                        <input autocomplete="off" type="date" name="fecha" id="fecha" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required />
                    </div>
                </div>

                <div class="mb-4">
                    <label for="img" class="block mb-2 text-sm font-medium text-accent">Imagen</label>
                    <input type="file" name="img" id="img" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" accept="image/*" />
                </div>

                <div class="mb-4">
                    <label for="editor" class="block mb-2 text-sm font-medium text-accent">Contenido</label>
                    <div name="editor" id="editor" class="bg-background border border-primary text-texto text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 h-48" required></div>
                    <input type="hidden" value="" name="contenido" id="contenido" required />
                </div>

                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" value="1" name="soloHermano" id="soloHermano" class="mr-2">
                        <label for="soloHermano" class="text-sm font-medium text-accent">Es solo para hermanos</label>
                    </div>
                    <button type="submit" class="text-texto bg-primary hover:bg-primary-dark focus:outline-none focus:ring-4 focus:ring-primary font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        Crear Noticia
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'link',
                        '|',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'undo',
                        'redo'
                    ]
                },
                language: 'es', // Cambiar al idioma que desees (ej. 'es' para español)

            } )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
                editor.model.document.on( 'change:data', () => {
                    document.getElementById('contenido').value = editor.getData();
                });
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    @endpush

</x-app-layout>
