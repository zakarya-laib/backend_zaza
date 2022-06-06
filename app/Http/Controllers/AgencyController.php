<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Agency;
class AgencyController extends Controller
{
  //adding agency
  public function addAgency(Request $request)
  {
      //validate fields
      $attrs = $request->validate([
        'agency_email'=>'required|string', 
          'agency_name' => 'required|string',
          'agency_logo' => 'required|string',
          'commercial_register' => 'required|string',
          'agency_phone_number'=> 'required|string',
      ]);
      $agency_logo = $this->saveImage($request->agency_logo,'agency');
      $commercial_register= $this->saveImage($request->commercial_register,'agency');
      //create Agency
      $agency = Agency::create([
        'agency_email' => $attrs['agency_email'],
          'agency_name' => $attrs['agency_name'],
          'agency_logo' => $agency_logo,
          'commercial_register'=> $commercial_register,
          'agency_phone_number'=>$attrs['agency_phone_number'],
      ]);
    }

// get agency name
public function show($agency_email)
{
    return response([
        'agency' => Agency::where('agency_email', $agency_email)->get('agency_name')], 200);

}
// get agency infos
public function agencyInfos($agency_name)
{
    return response([
        'agency' => Agency::where('agency_name', $agency_name)->get()], 200);

}
// update agency

public function upAgencyName(Request $request, $email)
{
  $attrs = $request->validate([
     'agency_name' => 'required|string',
    
   ]);
   Agency::where('agency_email',$email)->update(array('agency_name'=>$attrs['agency_name']));

  
 }
 public function upAgencyLogo(Request $request, $email)
 {
   $attrs = $request->validate([
      'agency_logo' => 'required|string',
    ]);
    $agency_logo = $this->saveImage($request->agency_logo, 'agency');
    Agency::where('agency_email',$email)->update(array('agency_logo'=>$agency_logo));
 }

 public function upAgencyNum(Request $request, $email)
 {
   $attrs = $request->validate([
      'agency_phone_number' => 'required|string',
    ]);
    Agency::where('agency_email',$email)->update(array('agency_phone_number'=>$attrs['agency_phone_number']));
 }




  }
