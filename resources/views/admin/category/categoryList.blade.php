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
                        @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->name }}</td>
                            <td>{{ $categorie->slug }}</td>
                            <td><img  style="width:70px;height:50px;" src="{{ asset ('assets/images/fashion/category') }}/{{ $categorie->image }}"></td>

                            <td>
                                <a href="/admin/category/edit/{{ $categorie->id }}" class="btn btn-warning m-2"><i class="fa-solid fa-pencil" style="font-size: 10px"></i></a>
                                <a href="/admin/category/remove/{{ $categorie->id }}" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="font-size: 10px"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>>
    </div>
</div>

@endsection
