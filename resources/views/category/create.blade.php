@extends('dashboard.dashboard_master')


@section('content')

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    catgegory add form
                </div>
                <div class="card-body">

                  @if(session('InsErr'))
                  <div class="alert alert-danger" role="alert">
                    <strong>{{ session('InsErr') }}</strong>
                  </div>
                  @endif

                  @if(session('InsDone'))
                  <div class="alert alert-success" role="alert">
                    <strong>{{ session('InsDone') }}</strong>
                  </div>
                  @endif

                    <form action="{{ url('/category/store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control"  name="category_name" placeholder="enter catgory name">
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
