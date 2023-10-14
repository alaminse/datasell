@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="all-product-tittle">
                <div class="d-flex justify-content-between">
                    <h3 class="">All Categories</h3>
                    <a class="btn btn-info" href="{{ route('admin.products.create') }}">Add New</a>
                </div>
                <hr />

                <div class="all-product-table py-4">
                    <div class="row">
                        <div class="col-12">
                            @include('backend.include.message')
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SI</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Highlight</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td><img src="{{ asset($product->thumnail_image) }}" height="150" width="150"></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount }}</td>
                                            <td>{{ $product->tags }}</td>
                                            <td>{{ $product->highlight }}</td>

                                            <td>
                                                <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
