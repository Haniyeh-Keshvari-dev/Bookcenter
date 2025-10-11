<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('product.index',compact('products','categories'));
    }
    public function create(){

        $categories = Category::all();
        return view('products.create',compact('categories'));
    }
    public function store(Request $request)
    {

//        $request->validate([
//             'primary_image' => 'required|image',
//             'name' => 'required|string',
//             'category_id' => 'required|integer',
//             'description' => 'required',
//             'price' => 'required|integer',
//             'status' => 'required|integer',
//             'quantity' => 'required|integer',
//             'sale_price' => 'nullable|integer',
//             'date_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
//             'date_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
//             'images.*' => 'nullable|image'
//         ]);
        $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
        $request->primary_image->storeAs('images/products/', $primaryImageName);

        if ($request->has('images') && $request->images !== null) {
            $fileNameImages = [];
            foreach ($request->images as $image) {
                $fileNameImage = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                $image->storeAs('images/products/', $fileNameImage);

                array_push($fileNameImages, $fileNameImage);
            }
        }

       dd( $this->makeSlug($request->name));
    }

    public function makeSlug($string)
    {
        $slug=slugify($string);
        $count=Product::whereRaw("slug RLIKE '^{$slug}(-[0-90+]?)$'")->count();

        $result=$count ? "{$slug}-{$count}" : $slug;
        return $result;
    }


    public function show(Product $product){
        return view('products.show',compact('product'));

    }
    public function edit(Product $product){
        $categories = Category::all();
        return view('products.edit',compact('product','categories'));

    }
    public function update(Request $request, Product $product){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'

        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

        }
        $product->update([

        ]);
    }

}
