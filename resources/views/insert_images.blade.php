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
<div class="container">
    <h1>Insérer une image</h1>

    <!-- Form to upload images -->
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf

        <!-- Hidden input for property ID -->
        <input type="hidden" name="property_id" value="{{ $properties->id }}">

        <!-- Image upload field -->
        <div class="form-group">
            <label for="image_path">Sélectionner des images :</label>
            <input type="file" id="image_path" name="image_path[]" class="form-control" multiple required>
        </div>

        <!-- Validation errors display -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-3">Télécharger l'image</button>
    </form>
</div>
@endsection

