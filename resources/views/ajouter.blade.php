@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une nouvelle propriété</h1>
    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group">
            <label for="title">Adresse :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="space">Surface (m²) :</label>
            <input type="number" class="form-control" id="space" name="space" required>
        </div>

        <div class="form-group">
            <label for="bedrooms">Nombre de chambres :</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
        </div>

        <div class="form-group">
            <label for="bathrooms">Nombre de salles de bain :</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
        </div>

        <div class="form-group">
            <label for="status">Statut :</label>
            <select class="form-control" id="status" name="status" required>
                <option value="À vendre">À vendre</option>
                <option value="À louer">À louer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type :</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>

        <div class="form-group">
            <label for="city">Ville :</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
</div>
@endsection
