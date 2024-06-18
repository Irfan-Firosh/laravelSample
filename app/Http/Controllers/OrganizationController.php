<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.org-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255|unique:organizations,name',
            'email' => 'required|email|unique:organizations,email',
            'phone' => 'required|unique:organizations,phone|max:20',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'country' => 'required|max:255',
            'code' => 'required|max:255'
        ]);
        $org = Organization::create($credentials);
        return redirect()->route('admin.orgs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $info = request()->validate([
            'search' => 'required'
        ]);
        $search = $info['search'];
        $orgs = Organization::where('name' , 'like', '%' . $search .'%')->get();
        return view('admin.org-search', ['search' => $search, 'orgs' =>$orgs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $org = Organization::find($id);
        $contacts = $org->contacts;
        return view('admin.org-update' , ['org' => $org, 'contacts' => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $credentials = request()->validate([
            'name' => 'required|max:255|unique:organizations,name,'.$id,
            'email' => 'required|email|unique:organizations,email,'.$id,
            'phone' => 'required|max:20|unique:organizations,phone,'.$id,
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'country' => 'required|max:255',
            'code' => 'required|max:255'
        ]);
        $org = Organization::find($id)->update($credentials);
        return redirect()->route('admin.orgs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Organization::destroy($id);
        return back();
    }
}
