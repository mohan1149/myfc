@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('t.products')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    	<div class="card-header card-header-primary">
                        	<div class="d-flex justify-content-between">
                            	<div>
                                	<h4 class="card-title ">Simple Table</h4>
                                	<p class="card-category"> Here is a subtitle for this table</p>
                            	</div>
                            	<div>
                                	<a class="btn btn-success" href="/products/create">{{ __("t.create_product") }}</a>
                            	</div>
                        	</div>
                      	</div>
                      	<div class="card-body">
                        	<div class="table-responsive">
                          		<table class="table" id="data-table">
									<thead class=" text-primary">
										<th>{{__("t.id")}}</th>
										<th>{{__("t.image")}}</th>
										<th>{{__("t.name")}}</th>
                                        <th>{{__("t.category")}}</th>
                                        <th>{{__("t.brand")}}</th>
                                        <th>{{__("t.price")}}</th>
                                        <th>{{__("t.stock")}}</th>
                                        <th>{{__("t.color")}}</th>
                                        <th>{{__("t.size")}}</th>
										<th>{{__("t.actions") }}</th>
									</thead>
									<tbody>
										@foreach ($products as $product)
											<tr>
												<td>{{ $product->id }}</td>
												<td>
													<img width="75" height="75" src="{{$product ->avatar}}" alt="image">
												</td>
												<td>{{ $product->name }}</td>
												<td>{{ $product->category_name }}</td>
												<td>{{ $product->brand_name }}</td>
												<td>{{ $product->price }}</td>
												<td>{{ $product->stock }}</td>
												<td>{{ $product->color }}</td>
												<td>{{ $product->size }}</td>
												<td>{{ "Action" }}</td>
											</tr>
										@endforeach
									</tbody>
                          		</table>
                        	</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
      $(document).ready( function () {
          $('#data-table').DataTable();
        } 
      );
    </script>
@endsection
