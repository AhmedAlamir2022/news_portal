@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Social Count</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Social Counts</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-count.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create new
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-sub">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socialCounts as $socialCount)
                                <tr>
                                    <td>{{ $socialCount->id }}</td>
                                    <td><i style="font-size: 20px;" class="{{ $socialCount->icon }}"></i>
                                    </td>
                                    <td>{{ $socialCount->url }}</i></td>

                                    <td>
                                        @if ($socialCount->status == 1)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.social-count.edit', $socialCount->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.social-count.destroy', $socialCount->id) }}"
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
