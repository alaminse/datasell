@extends('layouts.app')
@push('css')

@endpush
@section('content')
    <section>
        @if ($message = Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container-fulid">
            <div class="col-lg-12">
                <div class="add-product-area">
                    <h2>Add New product</h2>
                    <form action="" method="POST" enctype="multipart/form-data" class="form form-horizontal mar-top">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Product Information -->
                                <div class="card mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">Product Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label text-dark">Product Name <span
                                                    class="text-danger fs-6">*</span></label>
                                            <input value="{{ old('name') }}" type="input" class="form-control"
                                                id="name" name="name" placeholder="Product Name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cagtegory_id" class="form-label text-dark">Select Category<span
                                                    class="text-danger fs-6">*</span></label>
                                            <select name="cagtegory_id" id="cagtegory_id" class="form-control">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags" class="form-label text-dark">Tags</label>
                                            <div class="tags-input">
                                                <ul id="tags"></ul>
                                                <input type="text" class="form-control" id="input-tag"
                                                    placeholder="Type and hit enter to add a tag" />
                                                <input type="hidden" name="tags[]" id="tags-input" />

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- Product Images -->
                                <div class="card mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">Product Images</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="upload_file" class="form-label text-dark">Upload File</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="upload_files"
                                                    name="upload_files[]" multiple>
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="thumbnail" class="form-label text-dark">Thumbnail Image</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                                <label class="input-group-text">Upload</label>
                                            </div>
                                            <span>These images are visible in product details page gallery</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="card mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">Product Description</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="product_description"
                                                class="form-label text-dark">Description</label>
                                            <textarea name="product_description" id="product_description" cols="30" rows="10">{{ old('product_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!--Active status -->
                                <div class="card mb-3">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">Active Status</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span id="active_status_text">Disable</span>
                                            <label class="switch">
                                                <input type="checkbox" id="active_status" name="active_status"
                                                    value="0">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product price-->
                                <div class="card mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">Product Price + Discount + Highlight</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label text-dark">Price<span
                                                    class="text-danger fs-6">*</span></label>
                                            <input value="{{ old('price') }}" type="number" class="form-control"
                                                id="price" name="price" placeholder="0.00">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label text-dark">Discount price</label>
                                            <input value="{{ old('discount') }}" type="number" class="form-control"
                                                id="discount" name="discount" placeholder="0.00">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="highlight" class="form-label text-dark">Highlight</label>
                                            <input value="{{ old('highlight') }}" type="text" class="form-control"
                                                id="highlight" name="highlight">
                                        </div>
                                    </div>
                                </div>
                                <!-- SEO Meta Tags -->
                                <div class="card mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0 text-dark font-weight-semi-bold">SEO Meta Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label text-dark">Seo Title</label>
                                            <input value="{{ old('seo_title') }}" type="text" class="form-control"
                                                id="seo_title" name="seo_title" placeholder="Elit enim ipsam">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="seo_description" class="form-label text-dark">Description</label>
                                            <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    {{-- DataTables --}}
    <script>
        $(document).ready(function() {
            $('#product_description').summernote();
            $('#seo_description').summernote();
        });
    </script>
    {{-- Product Active Status --}}
    <script>
        $(document).ready(function() {
            let active_status = $('#active_status');

            active_status.on('change', function() {
                if ($(this).prop('checked')) {
                    active_status.val(1);
                    $('#active_status_text').text('Active');
                } else {
                    $('#active_status_text').text('Disable');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const $tagsList = $('#tags');
            const $input = $('#input-tag');
            const $tagsInput = $('#tags-input');

            function updateTagsInput() {
                const tags = $tagsList.find('li').map(function() {
                    return $(this).text().trim();
                }).get();
                $tagsInput.val(JSON.stringify(tags));
            }

            $input.on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();

                    const tagContent = $input.val().trim();

                    if (tagContent !== '') {
                        // Check if the tag already exists
                        if (!$tagsList.find('li:contains("' + tagContent + '")').length) {
                            const $tag = $('<li></li>');
                            $tag.text(tagContent);
                            $tag.append('<button class="delete-button">X</button>');
                            $tagsList.append($tag);
                            $input.val('');
                            updateTagsInput(); // Update the hidden input
                        } else {
                            // Tag already exists, clear the input
                            $input.val('');
                        }
                    }
                }
            });

            $tagsList.on('click', '.delete-button', function() {
                $(this).parent().remove();
                updateTagsInput(); // Update the hidden input
            });
        });
    </script>
@endpush
