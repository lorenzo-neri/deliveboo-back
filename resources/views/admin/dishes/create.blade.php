@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>ADMIN/DISHES/CREATE</h1>
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Create Dishes Page for') }} {{ Auth::user()->name }}.
        </h2>

        <div class="row justify-content-center my-3">

            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    {{-- DISH NAME --}}
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name</strong></label>

                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName"
                            placeholder="New Dish name" required value="{{ old('name') }}">

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH DESCRIPTION --}}
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description</strong></label>

                        <input type="text" class="form-control" name="description" id="description"
                            aria-describedby="helpDescription" placeholder="New dish description" required
                            value="{{ old('description') }}">

                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH INGREDIENTS --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label"><strong>Ingredients</strong></label>

                        <input type="text" class="form-control" name="ingredients" id="ingredients"
                            aria-describedby="helpIngredients" placeholder="Put the ingredients" required
                            value="{{ old('ingredients') }}">

                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH PRICE --}}
                    <div class="mb-3">
                        <label for="price" class="form-label"><strong>Price</strong></label>

                        <input type="number" class="form-control" name="price" id="price"
                            aria-describedby="helpPrice" step="0.01" min="0" max="9999.99" required
                            value="{{ old('price') }}">

                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH AVAILABLE --}}
                    <div class="mb-3">
                        <label for="available" class="form-label">Is Available?</label>
                        <input type="radio" name="available" value="true" checked required>
                        Available
                        <input type="radio" name="available" value="false" required>
                        Not Available
                    </div>

                    {{-- DISH IMG --}}
                    <div class="mb-3">
                        <label for="img" class="form-label"><strong>Choose an image file for your dish</strong></label>

                        <input type="file" class="form-control" name="img" id="img"
                            placeholder="Upload a new image file..." aria-describedby="fileHelpImg">

                        @error('img')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success my-3">SAVE</button>
                    <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">CANCEL</a>

                </form>
            </div>
        </div>

    </div>
@endsection
