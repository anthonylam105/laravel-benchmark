<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Http\Controllers\API\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->safeCall(function() {
            $users = User::all();

            return fractal($users, new UserTransformer)->respond();
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->safeCall(function() {
            return fractal($users, new UserTransformer)->respond();
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->safeCall(function() {
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

            return fractal($users, new UserTransformer)->respond();
        });
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return $this->safeCall(function() use ($request, $user) {
            return fractal($user, new UserTransformer)->respond();
        });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        return $this->safeCall(function() {
            return fractal($user, new UserTransformer)->respond();
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return fractal($user, new UserTransformer)->respond();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return fractal($user, new UserTransformer)->respond();
    }
}
