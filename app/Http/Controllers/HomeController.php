<?php

namespace App\Http\Controllers;

use App\User;
use App\Stuff;
use App\History;
use App\Payment;
use App\Service;
use App\Equipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('home',compact('services'));
    }
    public function equipment()
    {
        $equipments = Equipment::paginate(10);
        return view('equipment',compact('equipments'));
    }
    public function stuff()
    {
        $stuffs = Stuff::paginate(10);
        return view('stuff',compact('stuffs'));
    }
    public function add_equipment(Request $request)
    {
        Equipment::create($request->all());
        return back();
    }

    public function add_service(Request $request)
    {
        Service::create($request->all());
        return back();
    }
    public function add_stuff(Request $request)
    {

        Stuff::create($request->all());
        return back();

    }
    public function stuff_delete(Request $request)
    {
        $id = $request['id'];
        Stuff::find($id)->delete();
        return back();
    }
    public function equipment_delete(Request $request)
    {
        $id = $request['id'];
        Equipment::find($id)->delete();
        return back();
    }
    public function service_delete(Request $request)
    {
        $id = $request['id'];
        Service::find($id)->delete();
        return back();
    }
    public function stuff_update(Request $request)
    {
        $id = $request['id'];
        Stuff::find($id)->update($request->all());
        return back();
    }
    public function equipment_update(Request $request)
    {
        $id = $request['id'];
        Equipment::find($id)->update($request->all());
        return back();
    }
    public function service_update(Request $request)
    {
        $id = $request['id'];
        Service::find($id)->update($request->all());
        return back();
    }
    public function finishcart(Request $request)
    {
        $stuffs = $request['stuffs'];
        $username = $request['username'];
        $array = explode(';',$stuffs);
        $length = count($array);
        for($i=0;$i<$length;$i++){
            $haha = explode(',',$array[$i]);
            $name=$haha[0];
            $quantity = $haha[1];
            $price =$haha[2];
            Payment::create(['username'=>$username, 'name'=>$name, 'quantity'=>$quantity, 'price'=>$price]);
        }
        return back();
    }
    public function cart()
    {
        return view('cart');
    }
    public function customer()
    {
        $customers = Payment::all();
        return view('customer',compact('customers'));
    }
    public function search_real(Request $request)
    {
        $customers = Payment::where('username','like','%'.$request['search'].'%')->get();
        return view('customer',compact('customers'));
    }
}
