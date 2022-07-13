@extends('layouts.app', ['activePage' => 'vendors', 'titlePage' => __('t.create_vendor')])

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
                        <form action="/vendors/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">{{ __("t.name")}}</label>
                                        <input type="text" id="username" name="username" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __("t.email")}}</label>
                                        <input type="email" id="email" name="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __("t.phone")}}</label>
                                        <input type="text" id="phone" name="phone" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __("t.password")}}</label>
                                        <input type="text" id="password" name="password" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
