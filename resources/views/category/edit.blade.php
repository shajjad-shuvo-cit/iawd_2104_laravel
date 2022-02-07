@extends('dashboard.dashboard_master')


@section('content')

    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    catgegory add form
                </div>
                <div class="card-body">

                  @if(session('InsErr'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('InsErr') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif

                  @if(session('InsDone'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('InsDone') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif

                    <form action="{{ route('category.update') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" class="form-control"  name="category_id"  value="{{ $single_info->id }}">
                            <input type="text" class="form-control"  name="category_name"  value="{{ $single_info->category_name }}">
                            @error('category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



@endsection
