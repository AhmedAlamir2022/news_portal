@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Social Links</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Social Link</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-link.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Icon</label>
                        <br>
                        <button class="btn btn-primary" name="icon" role="iconpicker"></button>
                        @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Url</label>
                        <input name="url" type="text" class="form-control" id="name">
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
