<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $products = Product::orderBy('id','DESC')->paginate(5);

        return view('admin.products.index',compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
       $validated = $request->validate(['name' => 'required', 'detail' => 'required']);
       Product::create($validated);
      return to_route('admin.products.index');
    }
    public function edit(Product $product)
    {
      return view('admin.products.edit', compact('product'));
    } 
    public function update(Request $request, Product $product)
    {
      $validated = $request->validate(['name' => 'required', 'detail' => 'required']);
      $product->update($validated);
      return to_route('admin.products.index');
    }
}

