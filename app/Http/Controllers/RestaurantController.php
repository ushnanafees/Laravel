<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestaurantModel;
use Session;
use App\User;
use Crypt;

class RestaurantController extends Controller
{
    function index(){
        return view('home');
    }

    function list(){
        $data = RestaurantModel::all();
        return view('list', ['data'=>$data]);

    }
    function addform(Request $req) {

        $addresto = new RestaurantModel;
        $addresto->name = $req->input('name');
        $addresto->email = $req->input('email');
        $addresto->address= $req->input('address');
        $addresto->save();
        $req->session()->flash('status', 'Restaurant submitted succesfully');
        return redirect('/list');
    }
    function delete($id) {
        RestaurantModel::find($id)->delete();
        Session::flash('status', 'Restaurant deleted succesfully');
        return redirect('/list');

    }

    function edit($id) {
       $data = RestaurantModel::find($id);
       return view('edit', ['data'=>$data]);
}
    function update(Request $req) {

        $addresto = RestaurantModel::find($req->input('id'));
        $addresto->name = $req->input('name');
        $addresto->email = $req->input('email');
        $addresto->address= $req->input('address');
        $addresto->save();
        $req->session()->flash('status', 'Restaurant updated succesfully');
        return redirect('/list');
    }
    function register(Request $req) {
        $user = new User;
        $user->name= $req->input('name');
        $user->email= $req->input('email');
        $user->password= Crypt::encrypt($req->input('password'));
        $user->contact= $req->input('contact');
        $user->save();
        $req->session()->put('user', $req->input('name'));
        return redirect('/');
    }
    function login(Request $req) {
        $user = User::where("email", $req->input('email'))->get();
        if (Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user', $user[0]->name);
            return redirect('/');
        }
    }

}
