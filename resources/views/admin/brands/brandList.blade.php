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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td><img  style="width:70px;height:50px;" src="{{ asset ('assets/images/fashion/brand') }}/{{ $brand->image }}"></td>

                            <td>
                                <a href="/admin/brand/edit/{{ $brand->id }}" class="btn btn-warning m-2"><i class="fa-solid fa-pencil" style="font-size: 10px"></i></a>
                                <a href="/admin/brand/remove/{{ $brand->id }}" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="font-size: 10px"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>>
    </div>
</div>

@endsection
