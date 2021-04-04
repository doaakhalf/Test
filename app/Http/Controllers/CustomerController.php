<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // First name (required), last name (required), shop (foreign key to Companies), email, phone
    public function index()
    {
        //
        $customers=Customer::with('shop')->simplePaginate(10);
       
        return view('Customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shops=Shop::all();
        return view('Customer.create',compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           
            'first_name' => 'required',
            'last_name' => 'required',
            'phone'=>'number|nullable',
            'email' => 'email|nullable'

        ]);
        $newCustomer=Customer::create($request->all());
      if($newCustomer){
        $response = response()->json(
            [
                "status" => 200,
                "message" => "created successfly",


            ]
        );
        return redirect()->back()->with('success', $response);

      }
      else{
        $response = response()->json(
            [
                "status" => 200,
                "message" => "Error in creation",


            ]

        );
        return redirect()->back()->with('error', $response);
      }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $request->validate([
           
            'first_name' => 'required',
            'last_name' => 'required',
            'phone'=>'number|nullable',
            'email' => 'email|nullable'

        ]);
        $customer=Customer::where('id',$request->customerId)->first();
       
        
        $customerupdate=$customer->update($request->all());
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer=Customer::find($id);
        $shops=Shop::all();

        if($customer)
        return view('Customer.edit',compact('customer','shops'));
        else
        return view('errors.404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            Customer::destroy($id);
            return redirect()->back()->with('delete', 'deleted Successfly');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Error in delete');

        }
    }
}
