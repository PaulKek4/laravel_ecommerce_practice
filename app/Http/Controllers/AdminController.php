<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function addProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.addproduct',compact('categories','brands'));
    }

    public function storeProduct(Request $request)
    {
      $request->validate([
        'product_name'=> 'required',
        'product_slug' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required',
        'sku' => 'required',
        'featured' => 'required',
        'quantity' => 'required',
        'image' => 'required|mimes:jpg,png,jpeg',
        'images' => 'required|mimes:jpg,png,jpeg',
      ]);

      if($request->has('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'assets/images/fashion/product/front/';
        $file->move($path, $filename);
       }
       if($request->has('images'))
       {
        $file = $request->file('images');
        $extension = $file->getClientOriginalExtension();
        $filenames = time().'.'.$extension;
        $path = 'assets/images/fashion/product/back/';
        $file -> move($path,$filenames);
       }

    $product = new Product();
        $product->name = $request->product_name;
        $product->slug = $request->product_slug;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->sku;
        $product->stock_status = $request->stock;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->image = $filename;
        $product->images = $filenames;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->save();
      return redirect()->back()->with('success','Product Added Successfully');
    }

    public function productList()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('admin.product.productList',compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin..product.updateProduct',compact('product','categories','brands'));
    }

    public function updateProduct( Request $request)
    {
        $request->validate([
            'product_name'=> 'required',
            'product_slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sku' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'images' => 'required|mimes:jpg,png,jpeg',
          ]);

          if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'assets/images/fashion/product/front/';
            $file->move($path, $filename);
           }
           if($request->has('images'))
           {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filenames = time().'.'.$extension;
            $path = 'assets/images/fashion/product/back/';
            $file -> move($path,$filenames);
           }

        $product = Product::find($request->id);
            $product->name = $request->product_name;
            $product->slug = $request->product_slug;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->regular_price = $request->regular_price;
            $product->sale_price = $request->sale_price;
            $product->SKU = $request->sku;
            $product->stock_status = $request->stock;
            $product->featured = $request->featured;
            $product->quantity = $request->quantity;
            $product->image = $filename;
            $product->images = $filenames;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand;
            $product->update();

        return view('admin.product.productList')->with('success','Product updated Successfully');
    }




    public function removeProduct($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->back();
    }

    public function addCategory()
    {
        return view('admin.category.category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        if($request->has('image'))
        {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $path = 'assets/images/fashion/category/';
          $file->move($path,$filename);
        }

        $categories = new Category();
        $categories->name = $request->category_name;
        $categories->slug = $request->category_slug;
        $categories->image = $filename;
        $categories->save();

        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function categoryList()
    {
        $categories = Category::orderBy('created_at','DESC')->get();
        return view('admin.category.categoryList',compact('categories'));
    }

    public function editCategory($id)
    {
        $categories = Category::find($id);
        return view('admin.category.updateCategory',compact('categories'));
    }

    public function updateCategory( Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        if($request->has('image'))
        {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $path = 'assets/images/fashion/category/';
          $file->move($path,$filename);
        }

        $categories =  Category::find($request->id);
        $categories->name = $request->category_name;
        $categories->slug = $request->category_slug;
        $categories->image = $filename;
        $categories->update();

        return redirect()->route('category.list')->with('success','Category updated Successfully');
    }

    public function removeCategory($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back();
    }

    public function addBrand()
    {
        return view('admin.brands.brand');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        if($request->has('image'))
        {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $path = 'assets/images/fashion/brand/';
          $file->move($path,$filename);
        }

        $brands = new Brand();
        $brands->name = $request->brand_name;
        $brands->slug = $request->brand_slug;
        $brands->image = $filename;
        $brands->save();

        return redirect()->back()->with('success','Brand Added Successfully');
    }

    public function brandList()
    {
        $brands = Brand::orderBy('created_at','DESC')->get();
        return view('admin.brands.brandList',compact('brands'));
    }

    public function editBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brands.updateBrand',compact('brands'));
    }

    public function updateBrand( Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        if($request->has('image'))
        {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $path = 'assets/images/fashion/brand/';
          $file->move($path,$filename);
        }

        $brands =  Category::find($request->id);
        $brands->name = $request->brand_name;
        $brands->slug = $request->brand_slug;
        $brands->image = $filename;
        $brands->update();

        return redirect()->route('brand.list')->with('success','Brand updated Successfully');
    }

    public function removeBrand($id)
    {
        $brands = Brand::find($id);
        $brands->delete();
        return redirect()->back();
    }
}
