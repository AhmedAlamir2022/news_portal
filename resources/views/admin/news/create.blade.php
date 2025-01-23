@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>News</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create News</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control main-category" name="category_id">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Title</label>
                        <input name="title" type="text" class="form-control" id="name">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" class="summernote-simple"></textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="">Tags</label>
                        <input name="tags" type="text" class="form-control inputtags">
                        @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input name="meta_title" type="text" class="form-control" id="name">
                        @error('meta_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control"></textarea>
                        @error('meta_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">Status</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">Is Breaking News</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="is_breaking_news"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">Show At Slider</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="show_at_slider" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <div class="control-label">Show At Popular</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="show_at_popular"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>

                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
