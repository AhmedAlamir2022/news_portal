@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Social Count</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Social Link</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-count.store') }}" method="POST">
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
                        <label for="">Fan Count</label>
                        <input name="fan_count" type="text" class="form-control" id="name">
                        @error('fan_count')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Fan Type</label>
                        <input name="fan_type" type="text" class="form-control" id="name"
                            placeholder="ex: liks, fans, followers">
                        @error('fan_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Button Text</label>
                        <input name="button_text" type="text" class="form-control" id="name">
                        @error('button_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pick Your Color</label>
                        <div class="input-group colorpickerinput">
                            <input name="color" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                            @error('color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
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
