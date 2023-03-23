<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        return view('products.index', [
            'products' => Product::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }


    public function create()
    {


        return view('products.create');
    }


    public function store(StoreProductRequest $request)
    {


        $attributes = $request->all();

        $attributes['user_id'] = auth()->id();
        // dd(request()->file('thumbnail'));
        // Storage::disk('image');
        $imageName=request()->file('thumbnail')->getClientOriginalName();
        $FolderName=DB::select("select name from categories where id=(?)",[$request->category_id]);
        // dd($FolderName[0]->name);
        $attributes['thumbnail'] = request()->file('thumbnail')->storeAs($FolderName[0]->name,$imageName,'image');

        $productN=Product::create($attributes);
        // dd($postN);
        // dd(auth()->user()->name);
        $userNotifications=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($userNotifications,new ProductNotification($productN->slug,auth()->user()->name,$productN->title));
        return redirect('/');



    }



    public function show(Product $product)
    {

        return view('products.product', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }


}
