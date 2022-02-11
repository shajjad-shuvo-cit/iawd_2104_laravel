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
                    <th>product name</th>
                    <th>old price</th>
                    <th>new price</th>
                    <th>product image</th>
                    <th>createad at</th>
                    <th>action</th>
                  </thead>
                  <tbody>
                    @forelse($all_products as $product)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->old_price }}</td>
                      <td>{{ $product->new_price }}</td>
                      <td>
                        <img src="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" alt="not found" width="100">
                      </td>
                      <td>{{ $product->created_at->format('d-m-Y') }}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">edit</a>

                          <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm">delete</a>
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
