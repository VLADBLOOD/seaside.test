@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <form enctype="multipart/form-data"  class="form-signin" action="/product" method="POST">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Add new product</h1>

            <span>Cover</span>
            <input name="cover"  type="file" id="inputCover" class="form-control mb-2" placeholder="Cover" required>

            <span>Images</span>
            <input name="images[]"  type="file" id="inputImages" class="form-control mb-2" multiple="multiple" placeholder="Images" required>

            <label for="inputName" class="sr-only">Name</label>
            <input name="name"  type="text" id="inputName" class="form-control" placeholder="Name" required>

            <label for="inputPrice" class="sr-only">Price</label>
            <input name="price"  type="number" id="inputPrice" class="form-control" placeholder="Price" required>

            <label for="inputDescription" class="sr-only">Description</label>
            <input name="description"  type="text" id="inputDescription" class="form-control mb-2" placeholder="Description" required>

            <span>Category</span>
            <select name="category" id="inputSize" class="form-select form-select-lg mb-3" aria-label=".form-select-lg" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>

            <span>Size</span>
            <select name="size" id="inputSize" class="form-select form-select-lg mb-3" aria-label=".form-select-lg" required>
                @foreach($sizes as $size)
                    <option value="{{ $size->value }}">{{ $size->name }}</option>
                @endforeach
            </select>

            <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Add</button>
        </form>
    </div>
@endsection
