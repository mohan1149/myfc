@extends('layouts.app', ['activePage' => 'brands', 'titlePage' => __('t.brands')])

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
                                	<a class="btn btn-success" href="/brands/create">{{ __("t.create_brand") }}</a>
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
										<th>{{__("t.actions") }}</th>
									</thead>
									<tbody>
										@foreach ($brands as $brand)
											<tr>
												<td>{{ $brand->id }}</td>
												<td>
													<img width="75" height="75" src="{{$brand->avatar}}" alt="image">
												</td>
												<td>{{ $brand->name }}</td>
												<td>
													<a href="/brands/{{$brand->id}}/edit">{{ __("t.edit") }}</a>
												</td>
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
