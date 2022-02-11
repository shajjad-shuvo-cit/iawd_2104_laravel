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

                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                          <label class="form-label text-uppercase ">product name</label>
                            <input type="text" class="form-control"  name="product_name">
                            @error('product_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">old price</label>
                            <input type="text" class="form-control"  name="old_price">
                            @error('old_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">new price</label>
                            <input type="text" class="form-control"  name="new_price">
                            @error('new_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">category</label>
                          <select  name="category_id" class="custom-select" id="catId">
                            <option value=""> select a catagory</option>
                            @foreach($all_categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                            @endforeach
                          </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">sub category</label>
                          <select  name="sub_category_id" class="custom-select">
                            <option value=""> select a sub catagory</option>
                            @foreach($all_sub_categories as $subcategory)
                            <option value="{{ $subcategory->id }}"> {{ $subcategory->subcategory_name }}</option>
                            @endforeach
                          </select>
                            @error('sub_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label text-uppercase ">short description</label>
                          <textarea name="short_description" class="form-control"></textarea>
                            @error('sub_category_id')
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
                            <button type="submit" class="btn btn-primary">add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer_script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#catId').select2();
  });
</script>
@endsection
