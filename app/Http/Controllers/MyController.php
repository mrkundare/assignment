<?php
namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class MyController extends Controller
{
    public function myform()
    {
        $products = DB::table("product")->pluck("name","id");
        return view('myform',compact('products'));
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $prices = DB::table("price")
                    ->where("product_id",$id)
                    ->lists("name","id");
        return json_encode($price);
    }


    public function index()
    {
        $products = DB::table("product")->pluck("name","id");
        return view('myform',compact('products'));
    }

    public function getPriceList(Request $request)
    {
        $prices = DB::table("price")
        ->where("product_id",$request->product_id)
        ->pluck("price","id");
        return response()->json($prices);
    }

//insert function

    public function insert(Request $req)
    {
        $date = $req("datetime");
        $pname = $req("category_id");
        $pprice = $req("state");
        $qty = $req("qty");
        $total = $req("total");
        $user = $req("user");

        $data =array('datetime'=>$date,"category_id"=>$pname,"state"=>$pprice,"qty"=> $qty,"total"=>$total,"user"=>$user );
        DB::table(orders)->insert($data);
        echo "success";
        
    }

    public function piechart(){
        $pie = DB::table('orders')
            ->join('product','orders.pname','=', 'product.id')
            ->select('name',DB::raw("SUM(total) as count"))
            ->groupBy('pname')
            ->get();
         return view('chart',['pie'=>$pie]);
    }

    public function bargra(){
        $bargraph = DB::table('orders')
            ->join('product','orders.pname','=', 'product.id')
            ->select('name',DB::raw("SUM(qty) as count"))
            ->groupBy('pname')
            ->get();
            //echo $bar;
        return view('barg',['bargraph'=>$bargraph]);
    }
    public function linegra(){
        $linegraph = DB::table('orders')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total) as total'))
            ->groupBy('date')
            ->get();
           // echo $linegraph;
        return view('lineg',['linegraph'=>$linegraph]);
    }

}