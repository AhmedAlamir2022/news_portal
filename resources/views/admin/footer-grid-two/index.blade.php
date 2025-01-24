@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Footer</h1>
        </div>
        <div class="card card-primary">

            <div class="card-body">
                <form action="{{ route('admin.footer-grid-two-title') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Footer Title</label>
                        <input type="text" class="form-control" name="title" value="{{ @$footerTitle->value }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Footer grid two links</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.footer-grid-two.create') }}" class="btn btn-primary">
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
                                <th>Name</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footer as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-primary">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{ route('admin.footer-grid-two.edit', $item->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.footer-grid-two.destroy', $item->id) }}"
                                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
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
