@extends('layouts.adminBase')

@section('content')

<div class="container-fluid"">
        <h1 class="text-center">Add Category</h1>
        <hr>
        @if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="mt-3 border rounded p-5">
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3" >
                        <label for="name">Category Name</label>
                        <input type="text" name="category_name" id="name" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="slug">Category Slug</label>
                        <input type="text" name="category_slug" id="slug" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="images">Category images</label>
                        <input type="file" name="image" id="images" class="form-control ">
                    </div>

                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" style="width:200px;color:white;padding:10px;border:none;border-radius:20px;background-color:#4e73df;">Add Category</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
