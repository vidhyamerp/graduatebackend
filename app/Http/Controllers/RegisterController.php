<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Graduates;
use Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use File;
use App\User;
use Auth;
use Hash;
use ZipArchive;
use Intervention\Image\Facades\Image;
use App\Http\CustomHelper;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selected()
    {
        $get = Graduates::whereNotNull('photo');
        $get = $get->orWhereNotNull('signature');
        $get = $get->orWhereNotNull('deg_provitional_cerificate');
        $get = $get->orWhereNotNull('aadhar_proof');
        $get = $get->orWhereNotNull('signature');
        $json['sucess'] = true;
        $json['data'] =  $get->get();
        return response($json);
    }

    public function rejected()
    {
        $get = Graduates::where('photo','=',NULL);
        $get = $get->Where('signature','=',NULL);
        $get = $get->Where('deg_provitional_cerificate','=',NULL);
        $get = $get->Where('aadhar_proof','=',NULL);
        $get = $get->Where('signature','=',NULL)->get();
        $json['sucess'] = true;
        $json['data'] =  $get;
        return response($json);
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
        $json = [];
        $string1 = '';
        $string2 = '';
        $string3 = '';
        $string4 = '';
        $string5 = '';
        $get = '';
        if(!$request->id){
        $validator = Validator::make($request->all(), [
            'aadhar_number' => 'required|unique:registration_details,aadhar_number,',
            'mobile_no' => 'required|unique:registration_details,mobile_no,',
            'mail_id' => 'required|unique:registration_details,mail_id,',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors'=>$errors]);
        }
      }
        foreach($request->get('present_address') as $a)
         {    
            foreach($a as $b=>$c)
            {
                $string1 .= $c.',';
            }
        }
        $present_address = substr($string1,0,-1);
        foreach($request->get('residential_add') as $a)
         {    
            foreach($a as $b=>$c)
            {
                $string2 .= $c.',';
            }
        }
        $res_address = substr($string2,0,-1);
        foreach($request->get('name_of_degree') as $a)
         {    
                $string3 .= $a.',';
        }
        $degree = $string3;
        foreach($request->get('name_of_university') as $a)
         {    
                $string4 .= $a.',';
        }
        $university = $string4;
        foreach($request->get('year_of_passing') as $a)
        {    
               $string5 .= $a.',';
       }
       $year_pass = $string5;
        if(!$request->id){
            $store = new Graduates();
        }
        else{
            $store = Graduates::find($request->id);
        }
        $store->name = strtoupper($request->input('name'));
        $store->aadhar_number = $request->input('aadhar_number');
        $store->father_or_husband_name = strtoupper($request->input('father_or_husband_name'));
        $store->present_address =  $present_address;
        $store->declaration = $request->input('declaration');
        $store->mobile_no = $request->input('mobile_no');
        $store->mail_id = $request->input('mail_id');
        $store->gender = $request->input('gender');
        $store->occupation = $request->input('occupation');
        $store->degree_name =   strtoupper($degree);
        $store->university =  strtoupper($university);
        $store->year_of_passing =  $year_pass ;
        $store->residential_add =  $res_address;
        $store->certificate_decl = $request->input('certificate_decl');
        $store->challan_no = $request->input('challan_no');
        $store->amount = $request->input('amount');
        $store->bank_name = $request->input('bank_name');
        $store->date = $request->input('date');
        $store->dd_check = $request->input('dd_check');
        $store->district = $request->input('districts');
        $store->date_of_birth = $request->input('date_of_birth');
        $store->address_proof = $request->input('address_proof');
        $store->aadhar_proof = $request->input('aadhar_proof');
        $store->deg_provitional_cerificate = $request->input('deg_provitional_cerificate');
        $store->signature = $request->input('signature');
        $store->photo = $request->input('photo');
        $rand = rand(1,10000);
        $store->application_no = 'OGR'.$rand;
        $store->is_submit = 1;
        // return $store;
        $store->save();
        // $get = $store->id;
        // if($get){
        //     $show = Graduates::find($get->id);
        //     $pdf = PDF::loadView('pdf', compact('show'));
        //     $pdf->save(storage_path('app/public/pdffiles/registered').'_'.$id.'.pdf');
        //     $show->pdf = $api_url.'storage/pdffiles/registered'.'_'.$id.'.pdf';
        //     $show->save();
        // }
        $json['sucess'] = true;
        $json['data'] =  $store;
        return response($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = [];
        $show = Graduates::where('id',$id)->first();
        $json['data'] = $show;
        $json['success'] = true;
        return response($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $json = [];
        $edit = Graduates::where('user_id',$id)->first();
        $json['data'] = $edit;
        $json['success'] = true;
        return response($json);
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
    public function storeuser(Request $request)
    {
        $json = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile_no' => 'required|unique:users,mobile_no,',
            'email' => 'required|unique:users,email,',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors'=>$errors]);
        }
        $store = new User();
        $store->name = $request->name;
        $store->mobile_no = $request->mobile_no;
        $store->email = $request->email;
        $store->password =  Hash::make($request->password);
        $store->save();
        $json['data'] = $store;
        $json['success'] = true;
        return response($json);
    }
    public function login(Request $request)
    {
        $json= [];
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
          $id = User::where('email',$request->post('email'))->first();
          // $this->swapping($id);
          // return  $this->swapping($id);
          $remember = $request->has('remember_token') ? true : false;
          if ($id) {
              $json['data'] = $id;
              $json['success'] = true;
            return response($json);
           }
           else{
            $json['falied'] = true;
            return response($json);
           }
        }
   public function save(Request $request)
    {
        $json = [];
        $string1 = '';
        $string2 = '';
        $string3 = '';
        $string4 = '';
        $string5 = '';
        $get = '';
        foreach($request->get('present_address') as $a)
         {    
            foreach($a as $b=>$c)
            {
                $string1 .= $c.',';
            }
        }
        $present_address = substr($string1,0,-1);
        foreach($request->get('residential_add') as $a)
         {    
            foreach($a as $b=>$c)
            {
                $string2 .= $c.',';
            }
        }
        $res_address = substr($string2,0,-1);
        foreach($request->get('name_of_degree') as $a)
         {    
                $string3 .= $a.',';
        }
        $degree = $string3;
        foreach($request->get('name_of_university') as $a)
         {    
                $string4 .= $a.',';
        }
        $university = $string4;
        foreach($request->get('year_of_passing') as $a)
         {    
                $string5 .= $a.',';
        }
        $year_of_passing = $string5;
      $store = Graduates::where('user_id',$request->user_id)->first();
        if(!$store){
            $store = new Graduates();
            $rand = rand(1,10000);
            $store->application_no = 'OGR'.$rand;
        }
        $store->name = strtoupper($request->input('name'));
        $store->aadhar_number = $request->input('aadhar_number');
        $store->father_or_husband_name = strtoupper($request->input('father_or_husband_name'));
        $store->present_address =  $present_address;
        $store->declaration = $request->input('declaration');
        $store->mobile_no = $request->input('mobile_no');
        $store->mail_id = $request->input('mail_id');
        $store->gender = $request->input('gender');
        $store->occupation = $request->input('occupation');
        $store->degree_name =   $degree;
        $store->university =  $university;
        $store->year_of_passing = $year_of_passing;
        $store->residential_add =  $res_address;
        $store->challan_no = $request->input('challan_no');
        $store->amount = $request->input('amount');
        $store->bank_name = $request->input('bank_name');
        $store->date = $request->input('date');
        $store->dd_check = $request->input('dd_check');
        $store->certificate_decl = $request->input('certificate_decl');
        $store->district = $request->input('districts');
        $store->date_of_birth = $request->input('date_of_birth');
        $store->address_proof = $request->input('address_proof');
        $store->aadhar_proof = $request->input('aadhar_proof');
        $store->deg_provitional_cerificate = $request->input('deg_provitional_cerificate');
        $store->signature = $request->input('signature');
        $store->photo = $request->input('photo');
        $store->application_no = $store->application_no;
        $store->user_id = $request->user_id;
        $store->save();
        $json['sucess'] = true;
        $json['data'] =  $store;
        return response($json);
    }
    public function extract(Request $request){
        return $request->file;
        $zip = new ZipArchive();
        if ($zip->open('offlineaadhaar20210502074138346.zip') === true) {
            $zip->extractTo(public_path('extract'));
            $zip->close();
        }
        $xmlString = file_get_contents(public_path('extract/offlineaadhaar20210502074138346.xml'));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 
          
       return  $phpArray;
    }
    public function aadharupload(Request $request){
        $json = [];
          $get = '';
        //   return $request->file('file')->getSize();
        //   $api_url = "http://budca.in/links/";
          $api_url = env('API_URL');
          $validator = Validator::make($request->all(), [
            'file' => 'max:50',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors'=>$errors]);
        }
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $originalname = $file->getClientOriginalName();
            $get = 'storage/app/public/offlinezips'.'/'.$originalname;
            $path = $file->storeAs('public/offlinezips', $originalname);
        }
        $file_path = $api_url.$get;
        $json['sucess'] = true;
        $json['data'] =  $file_path;
        $json['file_name'] =  $originalname;
        return response($json);
    }
}
