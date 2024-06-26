{{-- @extends('layouts.app')
@section('content')

<h1>image form</h1>
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


        <!-- Input field for property ID -->
    <input type="hidden" name="property_id" value="{{ $properties->id }}">

    <!-- Affichage de l'identifiant de la propriété pour vérification -->
    {{ $properties->id }}

    <!-- Champ pour le fichier image -->
    <div class="form-group">
        <label for="image_path">Image:</label>
        <input type="file" class="form-control-file" id="image_path" name="image_path[]" multiple>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection --}}

@extends('layouts.app')

@section('content')

<h1>Insérer d'image</h1>
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="custom-form">
    @csrf

    <!-- Input field for property ID -->
    <input type="hidden" name="property_id" value="{{ $properties->id }}">

    <!-- Affichage de l'identifiant de la propriété pour vérification -->
    {{-- <p>Identifiant de la propriété : {{ $properties->id }}</p> --}}

    <!-- Champ pour le fichier image -->
    <div class="form-group">
        <label for="image_path">Image :</label>
        <input type="file" id="image_path" name="image_path[]" multiple>
    </div>

    <button type="submit" class="btn-submit">Soumettre</button>
</form>

@endsection

