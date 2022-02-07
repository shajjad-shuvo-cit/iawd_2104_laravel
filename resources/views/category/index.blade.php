@extends('dashboard.dashboard_master')


@section('content')

    <div class="row">

        <div class="col-lg-12 m-auto">
          <div class="card">
              <div class="card-header">
                  role list
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <th>sl</th>
                    <th>catageory name</th>
                    <th>status</th>
                    <th>createad at</th>
                    <th>added by</th>
                    <th>action</th>
                  </thead>
                  <tbody>
                    @forelse($all_categories as $categeries)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $categeries->category_name }}</td>
                      <td>
                          @if($categeries->status == 1)
                            <span class="badge bg-success">active</span>
                          @else
                          <span class="badge bg-warning">de-active</span>
                          @endif
                      </td>
                      <td>{{ $categeries->created_at->format('d-m-Y') }}</td>
                      <td>{{ $categeries->relationToUser->name }}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ url('/category/edit') }}/{{ $categeries->id }}" class="btn btn-primary btn-sm">edit</a>

                          <a href="{{ url('/category/delete') }}/{{ $categeries->id }}" class="btn btn-danger btn-sm">delete</a>
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
