@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('t.create_product')])

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
                        </div>
                      </div>
                      <div class="card-body p-4">
                        <form action="/products" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __("t.name")}}</label>
                                        <input type="text" id="name" name="name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">{{ __("t.price")}}</label>
                                        <input type="text" id="price" name="price" required class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="category" class="form-control" id="" required>
                                            @foreach ($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="brand" class="form-control" id="" required>
                                            @foreach ($brands as $key => $brand)
                                                <option value="{{ $key }}">{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock">{{ __("t.stock")}}</label>
                                        <input type="number" id="stock" name="stock" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">{{ __("t.size")}}</label>
                                        <input type="text" id="size" name="size" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">{{ __("t.color")}}</label>
                                        <input type="text" id="color" name="color" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __("t.description")}}</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="file" name="avatar" required>
                                </div>
                                <div class="col-md-12 p-3">
                                    <input type="submit" value="{{ __("t.add") }}" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
