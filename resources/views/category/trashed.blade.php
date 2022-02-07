@extends('dashboard.dashboard_master')


@section('content')

    <div class="row">

        <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  role list
              </div>
              <div class="card-body">
                @if(session('delDone'))
                <div class="alert alert-danger" role="alert">
                  {{ session('delDone') }}
                </div>
                @endif

                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @forelse($all_trashed as $trashed_category)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $trashed_category->category_name }}</td>
                                                <td>
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/category/restore') }}/{{ $trashed_category->id }}" class="btn btn-primary btn-sm">restore</a>

                                                    <a href="{{ url('/category/vanish') }}/{{ $trashed_category->id }}" class="btn btn-danger btn-sm">delete</a>
                                                  </div>
                                                </td>

                                            </tr>
                                          @empty
                                          <tr>
                                            <td class="text-danger text-center" colspan="10">no data added yet</td>
                                          </tr>
                                          @endforelse
                                        </tbody>
                                    </table>
              </div>
          </div>
        </div>
    </div>



@endsection
