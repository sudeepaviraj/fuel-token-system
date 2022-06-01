<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Person::all();
        return view('admin\user\index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function find_user(Request $request){
        $person = Person::where('nic',$request->nic)
        ->first();
        return response()->json($person);
    }

    public function new_user(Request $request){
        $new = Person::where('nic',$request->nic)
        ->count();
        if($new>0){
            $user = Person::where('nic',$request->nic)->first();
            $reserve = Reserve::create([
                'people_id'=> $user->id,
                'date_time'=>$request->date_time
            ]);
            // $response = Http::asForm()->get('http://www.textit.biz/sendmsg', [
            //     'id' => 'your textit username',
            //     'pw' => 'your textit passworf',
            //     'to'=> $user->mobile,
            //     'text'=>'Dear '.$user->name.'\nFuel Reservation Added Successfully!\nDate&Time :'.$request->date_time.\n'Token :'.$reserve->id
            // ]);
            return response()->json('User Already Exists',200);
        }
        else{
        $user = Person::create([
            'name'=>$request->name,
            'nic'=>$request->nic,
            'mobile'=>$request->mobile
        ]);
        $reserve = Reserve::create([
            'people_id'=> $user->id,
            'date_time'=>$request->date_time
        ]);
        // $response = Http::asForm()->get('http://www.textit.biz/sendmsg', [
        //     'id' => 'your textit username',
        //     'pw' => 'your textit password',
        //     'to'=> $request->mobile,
        //     'text'=>'Dear '.$user->name.'\nFuel Reservation Added Successfully!\nDate&Time :'.$request->date_time.\n'Token :'.$reserve->id
        // ]);
        return response()->json('User Created & Rserved',200);
        }
    }
    public function test(){
        $response = Http::asForm()->get('http://www.textit.biz/sendmsg', [
            'id' => 'your textit username',
            'pw' => 'your textit password',
            'to'=> 'reciever',
            'text'=>'Testing'
        ]);
    }
}

