<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use App\User;

class MainController extends Controller
{
    // main page
    public function index()
    {
        // $category = Category::find(1);
        // $products = $category->products;
        // dd($products->count());

        // $product = Product::find(1);
        // dd($product->category->name);
        // # Category::find($product->category_id)->name)

        $categories = Category::with('products')->get();
        # dd($categories);
        $products = Product::with('category')->where('recommended', '=', 1)->get();
        $comments = Review::latest()->limit(5)->get();
        # dd($comments);
        # dd($products);

        return view('main.index', compact('categories', 'products', 'comments'));
    }

    public function category(string $slug)
    {
        $category = Category::firstWhere('slug', $slug);
        $products = Product::where('category_id', $category->id)->paginate(8); # simplePaginate

        return view('shop.category', compact('category', 'products'));
    }

    public function product(string $slug)
    {
        // $reviews = Review::find(1);
        // dd($reviews->review);

        $product = Product::where('slug', $slug)->first();
        $review = $product->reviews;
        $user = User::find($review[count($review) - 1]->user_id)->name;

        return view('shop.product', compact('product', 'review', 'user'));
    }

    public function getReview(Request $request)
    {
        $review = new Review();
        $review->review = $request->comment;
        $review->user_id = $request->user;
        $review->product_id = $request->product;
        $review->save();
        return back();
    }

    function test(){
        
    }
}
