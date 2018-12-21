<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('User/index',['users' => $users]);
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
        //
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

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index');
    }

    public function table(){
        $users = User::all();
        return Datatables::of($users)

        ->addColumn('action', function ($users) {
              return '<center><a href="#" data-id="'.$users->id.'" rel="tooltip" title="Edit" 
                        class="btn btn-warning btn-simple btn-xs editSupplier"><i class="fa fa-pencil"></i></a>
                    &nbsp<a href="/admin/users/'.$users->id.'/delete" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$users->nama.'"><i class="fa fa-trash-o"></i></a></center>';
            })
        ->rawColumns(['action'])
        ->make(true);
    }
}
