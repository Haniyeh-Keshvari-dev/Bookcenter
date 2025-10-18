<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(3);
        return view('products.index', compact('products'));

    }

    public function create()
    {

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $fromDate = null;
        $toDate = null;

        if ($request->has('date_on_sale_from') && !empty($request->date_on_sale_from)) {
            try {
                $fromDate = getMiladiDate($request->date_on_sale_from);
                $request->merge(['date_on_sale_from' => $fromDate]);
            } catch (\Exception $exception) {
                $request->merge(['date_on_sale_from' => null]);
            }
        }

        if ($request->has('date_on_sale_to') && !empty($request->date_on_sale_to)) {
            try {
                $toDate = getMiladiDate($request->date_on_sale_to);
                $request->merge(['date_on_sale_to' => $toDate]);
            } catch (\Exception $exception) {
                $request->merge(['date_on_sale_to' => null]);
            }
        }
        $request->validate([
            'primary_image' => 'required|image',
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'status' => 'required|integer',
            'quantity' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'date_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
            'date_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
            'images.*' => 'nullable|image'
        ]);
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
        DB::beginTransaction();

        $product = Product::create([
            'name' => $request->name,
            'primary_image' => $primaryImageName,
            'slug' => $this->makeSlug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'sale_price' => $request->has('sale_price') ? $request->sale_price : null,
            'date_on_sale_from' => $fromDate,
            'date_on_sale_to' => $toDate,

        ]);

        if ($request->has('images') && $request->images !== null) {
            foreach ($fileNameImages as $fileNameImage) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'name' => $fileNameImage,
                ]);
            }
        }

        DB::commit();

        return redirect()->route('product.index')->with('success', 'محصول با موفقیت اضافه گردید');

    }

    public function makeSlug($string)
    {
        $slug = slugify($string);
        $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $result = $count ? "{$slug}-{$count}" : $slug;
        return $result;

    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));

    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

        }
        $product->update([

        ]);
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('product.index')->with('success','حذف با موفقیت انجام شد');
    }

}
