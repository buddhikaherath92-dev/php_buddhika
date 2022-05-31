<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSalesRepresentativeRequest;
use App\Models\SalesRoute;
use App\Models\SalesRepresentative;
use App\Models\SalesManagerComment;

class SalesRepresentativeController extends Controller
{
    /**
     * Show home page with logged in sales manager's sales team records
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.home', [
            // getting all sales route for the add new sales representative -> sales route drop down
            'salesRoutes' => SalesRoute::all(),
            // passing a hard coded value '1' temporaly untill authentication module implemented
            'salesRepresentatives' => SalesRepresentative::where('sales_manager_id', 1)->with('salesRoute')->with('latestComment')
            ->paginate(10)
        ]);
    }

    /**
     * Store a new sales representative.
     *
     * @param  App\Requests\StoreSalesRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRepresentativeRequest $request)
    {
        $validated = $request->validated();
        $comment = $validated['comment'];
        unset($validated['comment']);
        $salesRepresentative = SalesRepresentative::create($validated);
        // todo:: replaced with create when auth has been implemented
        SalesManagerComment::updateOrCreate([
            'commentor_id' => 1, //hard coded untill authentication is implemented
            'sales_representative_id' => $salesRepresentative->id
        ], [
            'comment' => $comment
        ]);
        return back();
    }

    /**
     * Update a  sales representative.
     *
     * @param  App\Requests\StoreSalesRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSalesRepresentativeRequest $request, $id)
    {
        $validated = $request->validated();
        $comment = $validated['comment'];
        unset($validated['comment']);
        $salesRepresentative = SalesRepresentative::find($id)->update($validated);
        // todo:: replaced with create when auth has been implemented
        SalesManagerComment::updateOrCreate([
            'commentor_id' => 1, //hard coded untill authentication is implemented
            'sales_representative_id' => $id
        ], [
            'comment' => $comment
        ]);
        return back();
    }


}
