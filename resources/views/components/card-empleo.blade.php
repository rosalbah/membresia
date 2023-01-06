@props(['empleo'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($empleo->image)
        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($empleo->image->url) }}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('empleos.show',$empleo) }}">{{ $empleo->name }}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!! $empleo->extracto !!}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($empleo->modos as $modo)
            <a href="{{ route('empleos.modo',$modo) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{ $modo->name }}</a>
        @endforeach
    </div>
    
</article>