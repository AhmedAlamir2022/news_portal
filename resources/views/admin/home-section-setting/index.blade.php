@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home Section Setting</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Home Section Setting</h4>

            </div>

            <div class="card-body">
                <form action="{{ route('admin.home-section-setting.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Category Section one</label>
                        <select name="category_section_one" id="" class="form-control select2">
                            <option value="">--- Select ---</option>
                            @foreach ($categories as $category)
                                <option {{ @$homeSectionSetting->category_section_one == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Category Section Two</label>
                        <select name="category_section_two" id="" class="form-control select2">
                            <option value="">--- Select ---</option>
                            @foreach ($categories as $category)
                                <option {{ @$homeSectionSetting->category_section_two == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for=""> Category Section Three </label>
                        <select name="category_section_three" id="" class="form-control select2">
                            <option value="">--- Select ---</option>
                            @foreach ($categories as $category)
                                <option
                                    {{ @$homeSectionSetting->category_section_three == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="">Category Section Four</label>
                        <select name="category_section_four" id="" class="form-control select2">
                            <option value="">--- Select ---</option>
                            @foreach ($categories as $category)
                                <option
                                    {{ @$homeSectionSetting->category_section_four == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary"> Save </button>
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
