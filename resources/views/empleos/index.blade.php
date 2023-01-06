<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6">
            @foreach ($empleos as $empleo)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image:url( @if($empleo->image) {{ Storage::url($empleo->image->url) }} @else https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg @endif )">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach ($empleo->modos as $modo)
                                
                                <a href="{{ route('empleos.modo',$modo) }}" class="inline-block px-3 h-6 bg-{{ $modo->color }}-600 text-white rounded-full">{{ $modo->name }}</a>                    

                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href={{ route('empleos.show',$empleo) }}>
                                {{ $empleo->name }}
                            </a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $empleos->links() }}
        </div>

    </div>

</x-app-layout>