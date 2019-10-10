<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;

class PagesController extends Controller
{

	public function __construct() {

		//$this->middleware('auth')->only(['create', 'store', 'update', 'edit', 'delete']);
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function index() {

    	return view('welcome');
    }

    public function create() {

    	return view('create');
    }

    public function store() {

    	//return request()->all();
        request()->validate([

            'name' => 'required',
            'email' => 'required|unique:users' ,
            'password' => ['required', 'min:8']

        ]);

    	$user = new User();

    	$user->name = request('name');
    	$user->email = request('email');
    	$user->password = Hash::make(request('password'));

    	$user->save();

    	return redirect('/show');

    	// try {
     //       request()->validate([

	    //         'name' => 'required',
	    //         'email' => 'required|unique:users' ,
	    //         'password' => ['required', 'min:8']

	    //     ]);

	    // 	$user = new User();

	    // 	$user->name = request('name');
	    // 	$user->email = request('email');
	    // 	$user->password = request('password');

	    // 	$user->save();

	    // 	return redirect('/show');

     //    } catch(\Illuminate\Database\QueryException $e){
     //        $errorCode = $e->errorInfo[1];
     //        if($errorCode == '1062'){
     //            return redirect('create')->withErrors('email.unique', 'email already exists');
     //        }
     //    }
    }

    public function show() {

    	$usernames = User::all();

    	return view('show', compact('usernames'));
    }

    // public function show() {

    // 	return view('views.show');
    // }

     public function edit($id) {

     	$user = User::find($id);


    	return view('edit', compact('user'));
    }

    public function update($id) {

        request()->validate([

        //     'name' => 'required',
             'email' => 'unique:users' //Rule::unique('users')->ignore($id)
        //     //'password' => ['required', 'min:8']

        ]);

    	$user = User::find($id);

    	if(request('name')) {
    		$user->name = request('name');
    	}
    	if(request('email')) {
    		$user->email = request('email');
    	}
    	//$user->password = request('password');

    	$user->save();

    	 return redirect('show');
    }

    public function destroy($id) {

    	User::find($id)->delete();

    	return redirect('show');

    }
}
