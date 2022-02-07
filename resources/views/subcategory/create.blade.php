@extends('dashboard.dashboard_master')


@section('content')

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    sub catgegory add form
                </div>
                <div class="card-body">

                  @if(session('InsDone'))
                  <div class="alert alert-success" role="alert">
                    <strong>{{ session('InsDone') }}</strong>
                  </div>
                  @endif

                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select class="custom-select" name="category_id">
                              <option value="">Selec a category</option>
                              @foreach($all_categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control"  name="subcategory_name" placeholder="enter sub catgory name">
                            @error('subcategory_name')
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
