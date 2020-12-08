<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\ModelActivity;
use App\User;

class ActivityController extends Controller
{
    private $objActivity;
    private $objUser;

    public function __construct(){
        $this->objUser = new User();
        $this->objActivity = new ModelActivity();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->objUser->find(1)->relActivitys);
        $activitys = $this->objActivity->all();
        return view('index', compact('activitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $cad = $this->objActivity->create([
            'descricao'=>$request->descricao,
            'nivel'=>$request->nivel,
            'status'=>1,
            'categoria'=>$request->categoria,
            'user_id'=>$request->user_id
        ]);
        
        dd($request->status);

        if($cad){
            return redirect('activity');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = $this->objActivity->find($id);
        return view('show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = $this->objActivity->find($id);
        $users = $this->objUser->all();

        return view('create', compact('activity', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $id)
    {
        $this->objActivity->where(['id'=>$id])->update([
            'descricao'=>$request->descricao,
            'nivel'=>$request->nivel,
            // 'status'=>$request->status,
            'status'=>1,
            'categoria'=>$request->categoria,
            'user_id'=>$request->user_id
        ]);

        dd($request->status);
        return redirect ('activity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objActivity->destroy($id);

        return ($del) ? "sim":"não";
    }
}
