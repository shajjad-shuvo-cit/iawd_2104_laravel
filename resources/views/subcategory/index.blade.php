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
                    <th>sub category name4</th>
                    <th>createad at</th>
                    <th>action</th>
                  </thead>
                  <tbody>
                    @forelse($all_subcategories as $subcategeries)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $subcategeries->relationToCategories->category_name }}</td>
                      <td>{{ $subcategeries->subcategory_name }}</td>
                      <td>{{ $subcategeries->created_at->format('d-m-Y') }}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ url('/subcategory/edit') }}/{{ $subcategeries->id }}" class="btn btn-primary btn-sm">edit</a>

                          <a href="{{ url('/subcategory/delete') }}/{{ $subcategeries->id }}" class="btn btn-danger btn-sm">delete</a>
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
