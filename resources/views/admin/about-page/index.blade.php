@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About Page</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>About Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">About Content</label>
                        <textarea name="content" class="summernote" id="" cols="30" rows="10">{!! @$about->content !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: "{{ $error }}"
                });
            @endforeach
        @endif
    </script>
@endpush
