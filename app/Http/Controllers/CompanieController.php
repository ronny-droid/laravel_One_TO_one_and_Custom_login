<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use App\Models\Employee;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companie = Companie::all();
        // $employee = Employee::all();
        return view('crud.home',['companie'=>$companie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // validate request
        $request->validate([
            'name'=>'required',
            'First_name'=>'required',
            'last_name'=>'required',
            // 'logo'=>'minimum 100*100'
        ]);

        $companie = new Companie();
        $companie->name = $request->name;
        $companie->email = $request->email;
        $companie->logo = $request->logo->store('Companies');
        $companie->website = $request->website;

        $employee = new Employee();
        $employee->First_name = $request->First_name;
        $employee->last_name = $request->last_name;
        $employee->Company = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $companie->save();
        $companie->Employee()->save($employee);
        return redirect(route('index'));
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
        $companie = Companie::find($id);
        return view('crud.edit',['companie'=>$companie]);
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
        $companie = Companie::find($id);
        $companie->name = $request->name;
        $companie->email = $request->email;
        $companie->logo = $request->logo->store('Companies');
        $companie->website = $request->website;

        $employee = new Employee();
        $employee->First_name = $request->First_name;
        $employee->last_name = $request->last_name;
        $employee->Company = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $companie->save();
        $companie->Employee()->save($employee);
        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Companie::destroy($id);
        return redirect(route('index'));
    }
}
