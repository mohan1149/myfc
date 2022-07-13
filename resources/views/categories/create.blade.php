@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('t.create_category')])

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
                        <form action="/categories" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __("t.name")}}</label>
                                        <input type="text" id="name" name="name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="file" name="avatar">
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
