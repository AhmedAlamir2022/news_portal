@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Footer Info</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Footer Info</h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.footer-info.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <img src="{{ asset(@$footerInfo->logo) }}" width="100px" alt=""><br>
                        <label for="">Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ @$footerInfo->description }}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Copyright text</label>
                        <input type="text" name="copyright" class="form-control" value="{{ @$footerInfo->copyright }}">

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
