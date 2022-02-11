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

                    <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                          <label class="form-label text-uppercase ">product name</label>
                          <input type="hidden" name="id" value="{{ $product_info->id }}">
                            <input type="text" class="form-control"  name="product_name" value="{{ $product_info->product_name }}">
                            @error('product_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">old price</label>
                            <input type="text" class="form-control"  name="old_price" value="{{ $product_info->old_price }}">
                            @error('old_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">new price</label>
                            <input type="text" class="form-control"  name="new_price" value="{{ $product_info->new_price }}">
                            @error('new_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">product image</label>
                            <input type="file" class="form-control"  name="product_image">
                            @error('product_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="text-primary d-block mt-2">product image dimension : w - 270 h-310 px</small>
                        </div>
                        <div class="mb-3">
                          <img src="{{ asset('uploads/product_photo') }}/{{ $product_info->product_image }}" alt="" width="100">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



@endsection
