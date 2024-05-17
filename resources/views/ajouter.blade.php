@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إضافة عقار جديد</h1>
    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

        @csrf
        <div class="form-group">
            {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

            <label for="title">العنوان:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">السعر:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="bedrooms">عدد غرف النوم:</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
        </div>
        <div class="form-group">
            <label for="bathrooms">عدد الحمامات:</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
        </div>
        <div class="form-group">
            <label for="status">الحالة:</label>
            <select class="form-control" id="status" name="status">
                <option value="للبيع">للبيع</option>
                <option value="للإيجار">للإيجار</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">النوع:</label>
            <select class="form-control" id="type" name="type">
                <option value="فيلا">فيلا</option>
                <option value="شقة">شقة</option>
                <option value="منزل">منزل</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">المدينة:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>
@endsection
