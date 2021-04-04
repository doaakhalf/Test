<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shop;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shops=Shop::simplePaginate(10);
        return view('Shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $response = '';


        $request->validate([
            'logo' => 'Mimes:jpeg,jpg,gif,png| dimensions:min_width=100,min_height=100',
            'name' => 'required',
            'email' => 'email|nullable'

        ]);
        $newShop = new Shop();
        if ($request->logo) {
            $date = Carbon::now();
            $logoName = Carbon::parse($date)->format('Y-m-d') . '_' . Carbon::parse($date)->format('h:iA') . '_' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('public/shop', $logoName);

            $url = url('/storage/shop') . '/' . $logoName;
            $newShop->logo = $url;
        }
        $newShop->name = $request->name;
        $newShop->email = $request->email;
        $newShop->website = $request->website;
        $newShop->save();

        $response = response()->json(
            [
                "status" => 200,
                "message" => "created successfly",


            ]
        );
        if ($newShop) {
            return redirect()->back()->with('success', $response);
        } else {
            //throw $th;
            $response = response()->json(
                [
                    "status" => 200,
                    "message" => "Error in creation",


                ]

            );
            return redirect()->back()->with('error', $response);
        }
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
            'logo' => 'Mimes:jpeg,jpg,gif,png| dimensions:min_width=100,min_height=100',
            'name' => 'required',
            'email' => 'email|nullable'

        ]);
        $shop=Shop::where('id',$request->shopId)->first();
        $url=$shop->logo;
        if ($request->logo) {
            $date = Carbon::now();
            $logoName = Carbon::parse($date)->format('Y-m-d') . '_' . Carbon::parse($date)->format('h:iA') . '_' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('public/shop', $logoName);

            $url = url('/storage/shop') . '/' . $logoName;
           
        }
        $shopupdate=$shop->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'logo'=>$url

        ]);
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
        $shop=Shop::find($id);
        if($shop)
        return view('Shop.edit',compact('shop'));
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
            Shop::destroy($id);
            return redirect()->back()->with('delete', 'deleted Successfly');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Error in delete');

        }
       

    }
}
