<?php

namespace App\Http\Controllers;

use App\Models\Model\Products;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;


class ProductsController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth:api')->except('index','show');

   }
    public function index()
    {
        return   ProductCollection::collection(Products::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)


    {
        $product = new Products;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->save();

        return response([
            'data'=> new ProductResource($product)
        ],201);



        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        return  new ProductResource(Products::findOrFail($products));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $products)


    {

        $product = Products::findOrFail($products);

         $product->name= $request->name;

         $product->detail= $request->description;

         $product->price= $request->price;

         $product->stock= $request->stock;

         $product->discount= $request->discount;

         $product->save();




         $product->update($request->all());

         return response([

            'data'=> new ProductResource($product)

        ],201);

        return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( $products)
    {
        $product = Products::findOrFail($products)->delete();

        return response(null,204);
    }
}
