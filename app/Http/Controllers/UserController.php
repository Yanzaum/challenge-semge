<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use App\Phone;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->with('address', 'phones')->paginate(5);
        return view('crud', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
            'cpf' => 'unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->route('all_users')->with('error', 'Ops, não foi possível criar o usuário, aparentemente o e-mail ou CPF informado já está em uso!');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->cpf = $request->cpf;
        $user->birthday = $request->birthday;
        $user->profile = $request->profile;
        $user->save();

        $address = new Address;
        $address->street = $request->street;
        $address->complement = $request->complement;
        $address->number = $request->number;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->zipcode = $request->zipcode;
        $address->user_id = $user->id;
        $address->save();

        $phone = new Phone;
        $phone->phone = $request->phone;
        $phone->user_id = $user->id;
        $phone->save();

        return redirect()->route('all_users')->with('success', 'Usuário criado com sucesso!');
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
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->cpf = $request->cpf;
        $user->birthday = $request->birthday;
        $user->profile = $request->profile;
        $user->save();

        $address = Address::where('user_id', $id)->first();
        $address->street = $request->street;
        $address->complement = $request->complement;
        $address->number = $request->number;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->zipcode = $request->zipcode;
        $address->save();

        $phone = Phone::where('user_id', $id)->first();
        $phone->phone = $request->phone;
        $phone->save();

        return redirect()->route('all_users')->with('success', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Address::where('user_id', $id)->delete();
        Phone::where('user_id', $id)->delete();
        return redirect()->route('all_users')->with('success', 'Usuário deletado com sucesso!');
    }
}
