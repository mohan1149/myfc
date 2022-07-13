@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('t.categories')])

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
                                	<a class="btn btn-success" href="/categories/create">{{ __("t.create_category") }}</a>
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
										@foreach ($categories as $category)
											<tr>
												<td>{{ $category->id }}</td>
												<td>
													<img width="75" height="75" src="{{$category->avatar}}" alt="image">
												</td>
												<td>{{ $category->name }}</td>
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
