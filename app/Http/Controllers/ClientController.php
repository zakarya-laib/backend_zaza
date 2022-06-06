<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    public function addClient(Request $request)
  {
    //validate fields
    $attrs = $request->validate([
      'client_email'=>'required|string', 
        'user_name' => 'required|string',
        'profile_pic' => 'required|string',
    ]);
    $profile_pic = $this->saveImage($request->profile_pic,'clients');
  
    //create client
    $client = Client::create([
      'client_email' => $attrs['client_email'],
        'user_name' => $attrs['user_name'],
        'profile_pic' => $profile_pic,
        
    ]);
  }
  // get client infos
public function clientInfos($client_email)
{
    return response([
        'client' => Client::where('client_email', $client_email)->get()], 200);

}
// update client
public function upClientName(Request $request, $email)
{
  $attrs = $request->validate([
     'user_name' => 'required|string',
    
   ]);
   Client::where('client_email',$email)->update(array('user_name'=>$attrs['user_name']));

  
 }
 public function upProfilePic(Request $request, $email)
 {
   $attrs = $request->validate([
      'profile_pic' => 'required|string',
    ]);
    $profile_pic = $this->saveImage($request->profile_pic, 'clients');
    Client::where('client_email',$email)->update(array('profile_pic'=>$profile_pic));
 }
}
