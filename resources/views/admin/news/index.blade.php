@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>News</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All News</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create new
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>In Breaking</th>
                                <th>In Slider</th>
                                <th>In Popular</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($news as $item)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" width="100" alt="">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input {{ $item->is_breaking_news === 1 ? 'checked' : '' }}
                                                data-id="{{ $item->id }}" data-name="is_breaking_news" value="1"
                                                type="checkbox" class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input {{ $item->show_at_slider === 1 ? 'checked' : '' }}
                                                data-id="{{ $item->id }}" data-name="show_at_slider" value="1"
                                                type="checkbox" class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input {{ $item->show_at_popular === 1 ? 'checked' : '' }}
                                                data-id="{{ $item->id }}" data-name="show_at_popular" value="1"
                                                type="checkbox" class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input {{ $item->status === 1 ? 'checked' : '' }}
                                                data-id="{{ $item->id }}" data-name="status" value="1"
                                                type="checkbox" class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>


                                    <td>
                                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-primary"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.news.destroy', $item->id) }}"
                                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                        <a href="{{ route('admin.news-copy', $item->id) }}" class="btn btn-primary"><i
                                                class="fas fa-copy"></i></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>

        $(document).ready(function() {
            $('.toggle-status').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.toggle-news-status') }}",
                    data: {
                        id: id,
                        name: name,
                        status: status
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
