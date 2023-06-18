<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Districts;
use App\Models\Documents;
use App\Models\Municipals;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['details'] = Documents::paginate(30);
        return view('documents.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Countries::orderByRaw("CASE WHEN name LIKE 'Nepal' THEN 0 ELSE 1 END, id")->get(['id','name','nationality']);
        $data['provinces'] = Provinces::get(['id','province_name']);
        $data['districts'] = Districts::get(['id','district_name']);
        $data['municipals'] = Municipals::get(['id','municipal_name']);
        return view('documents.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'father_name' => ['required'],
            'father_name_dev' => ['required'],
            'mother_name' => ['required'],
            'mother_name_dev' => ['required'],
            'father_nationality' => ['required'],
            'mother_nationality' => ['required'],
            'gender' => ['required'],
            'weight' => ['required'],
            'birth_date_bs' => ['required'],
            'birth_date' => ['required'],
            'birth_time' => ['required'],
            'province_id' => ['required'],
            'district_id' => ['required'],
            'municipality_id' => ['required'],
            'ward_no' => ['required'],
            'address' => ['required'],
            'certificate_no' => ['required'],
            'ip_no' => ['required'],
            'registered_date_bs' => ['required'],
            'registered_date_ad' => ['required'],
            'approved_by' => ['required'],
            'verified_by' => ['required']
        ]);

        $data = $request->except('_method','_token');

        $details = Documents::create($data);
        return redirect()->route('documents.index')->with('success','Details Added Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['document'] = Documents::with('province','district','municipality','motherNationality','fatherNationality')->findOrFail($id);
        return view('documents.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $documents)
    {
        //
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = DB::table('districts')->where("province_id", $request->province_id)->orderBy('district_name', 'ASC')->get(["district_name", "id"]);
        return response()->json($data);
    }

    public function fetchMunicipality(Request $request)
    {
        $data['municipalities'] = DB::table('municipals')->where("district_id", $request->district_id)->orderBy('municipal_name', 'ASC')->get(["municipal_name", "id"]);
        return response()->json($data);
    }
}
