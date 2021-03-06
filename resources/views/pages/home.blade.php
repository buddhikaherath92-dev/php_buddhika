@extends('layouts.main')
@section('content')
    @include('components.titlebar')
    <div class="clearfix mt-5">
        <span class="float-left">
            <h3 class="text-primary">Sales Team</h3>
        </span>
        <span class="float-right">
            <button type="button" class="btn btn-sm btn-info mr-1">Refresh</button>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" id="open-add-new-modal" 
                data-target="#addSalesRep">
                Add New
            </button>
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
                    <th>Joined Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesRepresentatives as $index => $salesRepresentative)
                    <tr>
                        <td>{{$salesRepresentative->id}}</td>
                        <td>{{$salesRepresentative->name}}</td>
                        <td>{{$salesRepresentative->email}}</td>
                        <td>{{$salesRepresentative->telephone}}</td>
                        <td>{{$salesRepresentative->joined_at}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" id="open-view-modal" 
                            data-target="#viewSalesRep"
                            data-id="{{$salesRepresentative->id}}"
                            data-name="{{$salesRepresentative->name}}" 
                            data-email="{{$salesRepresentative->email}}"
                            data-telephone="{{$salesRepresentative->telephone}}"
                            data-joined_at="{{$salesRepresentative->joined_at}}"
                            data-sales_route="{{$salesRepresentative->salesRoute?->route}}"
                            data-comment="{{$salesRepresentative->latestComment?->comment}}"
                            >
                                View
                            </button>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" id="open-edit-modal" 
                            data-target="#editSalesRep"
                            data-id="{{$salesRepresentative->id}}"
                            data-name="{{$salesRepresentative->name}}" 
                            data-email="{{$salesRepresentative->email}}"
                            data-telephone="{{$salesRepresentative->telephone}}"
                            data-joined_at="{{$salesRepresentative->joined_at}}"
                            data-sales_route="{{$salesRepresentative->salesRoute?->id}}"
                            data-comment="{{$salesRepresentative->latestComment?->comment}}"
                            >
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" id="open-delete-confirmation"
                            data-target="#deleteConfirmationModal" data-id="{{$salesRepresentative->id}}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            {{ $salesRepresentatives->links() }}
        </div>
      </div>  
    </div>
    <!-- View Sales Rep Modal -->
    <div class="modal" id="viewSalesRep">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sales Member Detailed View</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    Name 
                                <td>
                                <td>
                                   <span id="nameViewLabel"></span> 
                                <td>
                            <tr>
                            <tr>
                                <td>
                                    Email 
                                <td>
                                <td>
                                    <span id="emailViewLabel"></span> 
                                <td>
                            <tr>
                            <tr>
                                <td>
                                    Telephone # 
                                <td>
                                <td>
                                    <span id="telephoneViewLabel"></span> 
                                <td>
                            <tr>
                            <tr>
                                <td>
                                    Joined Date
                                <td>
                                <td>
                                    <span id="jonedDateViewLabel"></span> 
                                <td>
                            <tr>
                            <tr>
                                <td>
                                    Sales Route
                                <td>
                                <td>
                                    <span id="salesRouteViewLabel"></span> 
                                <td>
                            <tr>
                            <tr>
                                <td>
                                    Latest Comment
                                <td>
                                <td>
                                <span id="latestCommentViewLabel"></span> 
                                <td>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Sales Rep Modal -->
    <div class="modal" id="addSalesRep">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Sales Team Member</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" 
                            action="{{ route('store_sales_rep') }}" name="add_sales_rep_form">
                            @csrf
                            <div class="row form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" id="name" name="name" placeholder="Name"
                                        value="{{ old('name') }}" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="label text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-9">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="label text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="telephone" class=" form-control-label">Telephone</label>
                                </div>
                                <div class="col-9">
                                    <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}"
                                        class="form-control" placeholder="Telephone">
                                    @if ($errors->has('telephone'))
                                        <span class="label text-danger">
                                            {{ $errors->first('telephone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('joined_at') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="joined_at" class=" form-control-label">Joined At</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" id="joined_at" value="{{ old('joined_at') }}"
                                        name="joined_at" class="form-control">
                                    @if ($errors->has('joined_at'))
                                        <span class="label text-danger">
                                        {{ $errors->first('joined_at') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('sales_route_id') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="sales_route_id" class=" form-control-label">Sales Route</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control" id="sales_route_id" name="sales_route_id">
                                        <option value="">Select Sale Route</option>
                                        @foreach($salesRoutes as $index => $salesRoute)
                                        <option value="{{$salesRoute->id}}">{{$salesRoute->route}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sales_route_id'))
                                        <span class="label text-danger">
                                            {{ $errors->first('sales_route_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="comment" class=" form-control-label">Comment</label>
                                </div>
                                <div class="col-9">
                                    <textarea class="form-control" rows="5" id="comment" name="comment">{{old('comment')}}</textarea>
                                    @if ($errors->has('comment'))
                                        <span class="label text-danger">
                                            {{ $errors->first('comment') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Sale manager ID was hard coded, later to be dynamic with auth -->
                            <input type="hidden" value="1" name="sales_manager_id" />
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button class="btn btn-info" type="reset" >Refresh</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Sales Rep Modal -->
    <div class="modal" id="editSalesRep">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Sales Team Member</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST"
                                action="" name="edit_sales_rep_form" id="edit_sales_rep_form">
                                @method('PUT')
                                @csrf
                                <div class="row form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="edit_name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" id="edit_name" name="name" placeholder="Name"
                                        value="{{ old('name') }}" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="label text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="edit_email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-9">
                                    <input type="email" id="edit_email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="label text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="edit_telephone" class=" form-control-label">Telephone</label>
                                </div>
                                <div class="col-9">
                                    <input type="tel" id="edit_telephone" name="telephone" value="{{ old('telephone') }}"
                                        class="form-control" placeholder="Telephone">
                                    @if ($errors->has('telephone'))
                                        <span class="label text-danger">
                                            {{ $errors->first('telephone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('joined_at') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="jedit_oined_at" class=" form-control-label">Joined At</label>
                                </div>
                                <div class="col-9">
                                    <input type="date" id="edit_joined_at" value="{{ old('joined_at') }}"
                                        name="joined_at" class="form-control">
                                    @if ($errors->has('joined_at'))
                                        <span class="label text-danger">
                                        {{ $errors->first('joined_at') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('sales_route_id') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="edit_sales_route_id" class=" form-control-label">Sales Route</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control" id="edit_sales_route_id" name="sales_route_id">
                                        <option value="">Select Sale Route</option>
                                        @foreach($salesRoutes as $index => $salesRoute)
                                        <option value="{{$salesRoute->id}}">{{$salesRoute->route}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sales_route_id'))
                                        <span class="label text-danger">
                                            {{ $errors->first('sales_route_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <div class="col-3">
                                    <label for="edit_comment" class=" form-control-label">Comment</label>
                                </div>
                                <div class="col-9">
                                    <textarea class="form-control" rows="5" id="edit_comment" name="comment">{{old('comment')}}</textarea>
                                    @if ($errors->has('comment'))
                                        <span class="label text-danger">
                                            {{ $errors->first('comment') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Sale manager ID was hard coded, later to be dynamic with auth -->
                            <input type="hidden" value="1" name="sales_manager_id" />
                            <input type="hidden" value="" id="edit_id" name="id" />
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteConfirmationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure to delete the sales representative</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="" id="delete_sales_rep_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                             Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#open-view-modal", function () {
            var  name = $(this).data('name');
            var  email = $(this).data('email');
            var  telephone = $(this).data('telephone');
            var  joined_date = $(this).data('joined_at');
            var  sales_route = $(this).data('sales_route');
            var  latest_comment = $(this).data('comment');
        
            document.getElementById("nameViewLabel").innerHTML = name;
            document.getElementById("emailViewLabel").innerHTML = email;
            document.getElementById("telephoneViewLabel").innerHTML = telephone;
            document.getElementById("jonedDateViewLabel").innerHTML = joined_date;
            document.getElementById("salesRouteViewLabel").innerHTML = sales_route;
            document.getElementById("latestCommentViewLabel").innerHTML = latest_comment;
        });
        $(document).on("click", "#open-edit-modal", function () {
            var  name = $(this).data('name');
            var  id = $(this).data('id');
            var  email = $(this).data('email');
            var  telephone = $(this).data('telephone');
            var  joined_date = $(this).data('joined_at');
            var  sales_route = $(this).data('sales_route');
            var  latest_comment = $(this).data('comment');
        
            document.getElementById("edit_name").value = name;
            document.getElementById("edit_email").value = email;
            document.getElementById("edit_telephone").value = telephone;
            document.getElementById("edit_joined_at").value = joined_date;
            document.getElementById("edit_sales_route_id").value = sales_route;
            document.getElementById("edit_comment").value = latest_comment;
            document.getElementById("edit_id").value = id;
            $('#edit_sales_rep_form').attr('action', '/post/'+id);
        });
        $(document).on("click", "#open-delete-confirmation", function () {
            var  id = $(this).data('id');
            $('#delete_sales_rep_form').attr('action', '/post/'+id);
        });
    </script>
@endsection