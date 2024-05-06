@extends('layouts.adminBase')

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
        @endif
<div class="container-fluid">
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Slug</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>featured</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->regular_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td> {{ $product->SKU }} </td>
                            <td>{{ $product->stock_status }}</td>
                            <td>{{ $product->featured }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><img  style="width: 50px;height:50px;" src="{{ asset ('assets/images/fashion/product/front') }}/{{ $product->image }}"></td>
                            <td><img  style="width: 50px;height:50px;" src="{{ asset ('assets/images/fashion/product/back') }}/{{ $product->images }}" ></td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>
                                <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-warning m-2"><i class="fa-solid fa-pencil" style="font-size: 10px"></i></a>
                                <a href="/admin/product/remove/{{ $product->id }}" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="font-size: 10px"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>>
    </div>
</div>

@endsection
