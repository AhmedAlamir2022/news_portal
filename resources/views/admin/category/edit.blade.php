@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Category Info</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" value="{{ $category->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Show at Nav </label>
                        <select name="show_at_nav" id="" class="form-control">
                            <option {{ $category->show_at_nav === 0 ? 'selected' : '' }} value="0">No</option>
                            <option {{ $category->show_at_nav === 1 ? 'selected' : '' }} value="1">Yes</option>
                        </select>
                        @error('show_at_nav')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $category->status === 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{ $category->status === 0 ? 'selected' : '' }} value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
