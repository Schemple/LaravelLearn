<?php
namespace App\Http\Controllers;
use App\Models\Test;
class TestController extends Controller
{
    public function index()
    {
        $test = 'John SHIT';
        $a = 1;
        $b = 2;
        $arrays = [1, 2, 3];
        return view('user.index', compact('test', 'a', 'b', 'arrays'));
//        return view('user.index')->with('name', $test); // with only send 1 param
    }

    public function test()
    {
        $test = Test::create([
            'name' => 'Sample Name',
            'status' => 'active',
        ]);


//        $all = Test::all(); // retrieve all product

//        $product = new Product;  // add new product
//        $product->name = 'Product Name';
//        $product->price = 100;
//        $product->save();

//        $product = Product::find(1);  // edit product
//        $product->price = 150;
//        $product->save();

//        $product = Product::find(1);  // delete product
//        $product->delete();
//
        // Retrieving all active records
        $data = Test::active()->get();
        return view('user.test')->with('data', $data);
    }

    public function test1()
    {
        $test = 'John SHIT';
        $arrays = [1, 2, 3];
        $aa = [];
        return view('user.test1', compact('test', 'arrays', 'aa'));
    }
}
