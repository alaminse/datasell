@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="all-product-tittle">
                <div class="d-flex justify-content-between">
                    <h3 class="">All Categories</h3>
                </div>
                <hr />

                <div class="all-product-table py-4">
                    <div class="row">
                        <div class="col-12">
                            @include('backend.include.message')
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SI</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td>
                                                <a href="#">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h2 class="mb-2 text-center text-info">Add New Category</h2>
                            <form action="{{ route('admin.categories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control" id="name" name="name">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
