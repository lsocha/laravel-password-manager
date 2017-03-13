<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Password;

class PasswordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $passwords = Password::orderBy('id','DESC')->paginate(5);
        return view('mypasswords.index',compact('passwords'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypasswords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'page' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        Password::create($request->all());
        return redirect()->route('mypasswords.index')
                        ->with('success','Password saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $password = Password::find($id);
        return view('mypasswords.show',compact('password'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $password = Password::find($id);
        return view('mypasswords.edit',compact('password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'page' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        Password::find($id)->update($request->all());
        return redirect()->route('mypasswords.index')
                        ->with('success','Password updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Password::find($id)->delete();
        return redirect()->route('mypasswords.index')
                        ->with('success','Password deleted successfully');
    }
}
