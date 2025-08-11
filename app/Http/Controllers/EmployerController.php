<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Frontend.employer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req = $request->all();
        //echo "<pre/>"; print_r($req);dd();  
        //form wizard 1 data
        $company_name = $request->input('company_name');
        $industry = $request->input('industry');
        $company_address = $request->input('company_address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $zipcode = $request->input('zip_code');
        $website = $request->input('website');

        //form wizard 2 data
        $official_title = $request->input('official_title');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $mobile_no = $request->input('mobile_no');
        $reach_you = $request->input('reach_you');
        $EmailValid = DB::table('users')->select('*')->where('email', $req['email'])->get()->toArray();
        $fullname = $firstname . ' ' . $lastname;

        if (empty($EmailValid)) {
            $usersdata = array('name' => $fullname, 'email' => $email, 'role_type' => 2);

            $users = DB::table('users')->insert($usersdata);
            $id = $user_id = DB::getPdo()->lastInsertId();

            $employerdata = array('user_id' => $id, 'company_name' => $company_name, 'industry' => $industry, 'company_address' => $company_address, 'city' => $city, 'state' => $state, 'country' => $country, 'zip_code' => $zipcode, 'website' => $website, 'official_title' => $official_title, 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'mobile_no' => $mobile_no, 'reach_you' => $reach_you);

            $employer = DB::table('employers')->insert($employerdata);
        } else {
            return response()->json("Your Email ID is Already Register...");
        }
        return  Redirect::to('employer')->with('success', 'Data insert successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
