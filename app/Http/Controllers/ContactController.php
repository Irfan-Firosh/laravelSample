<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::paginate(5);
        return view('admin.contacts', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgs = DB::table('organizations')->select('name')->groupBy('name')->get();
        return view('admin.contacts-create')->with('orgs',$orgs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = request()->validate([
            'first_name' => 'required|max:255|unique:contacts,first_name',
            'last_name' => 'required|max:255|unique:contacts,last_name',
            'organization' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|max:20|unique:contacts,phone',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
        ]);

        Contacts::create($credentials);
        return redirect()->route('admin.contacts')->with('$success', 'Succesfully Created');
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
        $contact = Contacts::find($id);
        $orgs = DB::table('organizations')->select('name')->groupBy('name')->get();
        return view('admin.contacts-update', ['contact' => $contact, 'orgs' => $orgs]);
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
        $credentials = request()->validate([
            'first_name' => 'required|max:255|unique:contacts,first_name,' . $id,
            'last_name' => 'required|max:255|unique:contacts,last_name,' . $id,
            'organization' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone' => 'required|max:20|unique:contacts,phone,' . $id,
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
        ]);
        $contact = Contacts::find($id)->update($credentials);
        return redirect()->route('admin.contacts')->with('success', "Succesfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacts::destroy($id);
        return redirect()->route('admin.contacts')->with('success', "Deleted Succesfully");
    }
}
