<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{ $category->name }}</h1>
        
        @foreach ($empleos as $empleo)
            <x-card-empleo :empleo="$empleo"/>
        @endforeach

        <div class="mt-4">
            {{ $empleos->links() }}
        </div>
        
    </div>
</x-app-layout>