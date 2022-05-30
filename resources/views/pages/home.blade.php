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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    </script>
@endsection