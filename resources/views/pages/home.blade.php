@extends('layouts.main')
@section('content')
    @include('components.titlebar')
    <div class="clearfix mt-5">
        <span class="float-left">
            <h3 class="text-primary">Sales Team</h3>
        </span>
        <span class="float-right">
            <button type="button" class="btn btn-sm btn-info mr-1">Refresh</button>
            <button type="button" class="btn btn-sm btn-primary">Add New</button>
        </span>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
            <table class="table">
            <thead class="bg-light">
                <tr>
                    <th>Sales Ref ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone #</th>
                    <th>Sales Route</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            </table>
        </div>
      </div>  
    </div>
@endsection