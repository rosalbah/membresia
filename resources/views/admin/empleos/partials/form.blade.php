<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del empleo']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoría:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Modalidad</p>

    @foreach ($modos as $modo)

        <label class="mr-2">
            {!! Form::checkbox('modos[]', $modo->id, null) !!}
            {{ $modo->name }}
        </label>
        
    @endforeach

    @error('modos')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        BORRADOR
    </label>
    
    <label>
        {!! Form::radio('status', 2) !!}
        PUBLICADO
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($empleo->image)
                <img id="picture" src="{{ Storage::url($empleo->image->url) }}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg" alt="">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <p>Puede seleccionar una imagen alusiva a la oferta de empleo o dejar la imagen predeterminada</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extracto', 'Extracto:') !!}
    {!! Form::textarea('extracto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extracto del empleo']) !!}
   
    @error('extracto')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del empleo']) !!}
    
    @error('descripcion')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>