@extends('layouts.adminBase')

@section('content')

<div class="container-fluid"">
        <h1 class="text-center">Update Products</h1>
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
                <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="mt-3" >
                        <label for="name">Product Name</label>
                        <input type="text" name="product_name" id="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="mt-3">
                        <label for="slug">Product Slug</label>
                        <input type="text" name="product_slug" id="slug" class="form-control" value="{{ $product->slug }}">
                    </div>
                    <div class="mt-3">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" cols="10" rows="10" class="form-control">{{ $product->short_description }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="10" rows="10" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="regular_price">Regular Price</label>
                        <input type="number" name="regular_price" id="regular_price" class="form-control" value="{{ $product->regular_price }}">
                    </div>
                    <div class="mt-3">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $product->sale_price }}">
                    </div>
                    <div class="mt-3">
                        <label for="sku">Product SKU</label>
                        <input type="text" name="sku" id="sku" class="form-control" value="{{ $product->SKU }}">
                    </div>
                    <div class="mt-3">
                        <label for="stock">Stock</label>
                        <select name="stock" id="stock" class="form-control">
                            <option value="instock">InStock</option>
                            <option value="outofstock">Out Of Stock</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="featured">Featured Product</label>
                        <input type="number" name="featured" id="featured" class="form-control" value="{{ $product->featured }}">
                    </div>
                    <div class="mt-3">
                        <label for="quantity">Quantity</label >
                        <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
                    </div>
                    <div class="mt-3">
                        <label for="image">Product image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="images">Product images</label>
                        <input type="file" name="images" id="images" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="category">Product category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="brand">Product Brand</label>
                        <select name="brand" id="brand" class="form-control">
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" style="width:200px;color:white;padding:10px;border:none;border-radius:20px;background-color:#4e73df;">Add Product</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
