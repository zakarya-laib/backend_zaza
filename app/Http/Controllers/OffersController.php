<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
class OffersController extends Controller
{
    //adding offer
  public function addOffer(Request $request)
  {
      //validate fields
      $attrs = $request->validate([
        'offer_agency_name'=> 'required|string',
        'offer_type'=> 'required|string',
        'offer_price'=> 'required|string',
        'property_type'=> 'required|string',
        'x'=> 'required|string',
        'y'=> 'required|string',
        'address'=> 'required|string',
        'offer_description'=> 'required|string',
        'number_of_rooms'=> 'required|string',
        'surface'=> 'required|string',
        'image1'=> 'required|string',
        'image2'=> 'required|string',
        'image3'=> 'required|string',
        'image4'=> 'required|string',
      ]);
      $image1 = $this->saveImage($request->image1,'offers');
      $image2 = $this->saveImage($request->image2,'offers');
      $image3 = $this->saveImage($request->image3,'offers');
      $image4 = $this->saveImage($request->image4,'offers');
      //create offer
      $offer = Offer::create([
        'offer_agency_name'=>$attrs['offer_agency_name'],
        'offer_type'=>$attrs['offer_type'],
        'offer_price'=>$attrs['offer_price'],
        'property_type'=>$attrs['property_type'],
        'x'=>$attrs['x'],
        'y'=>$attrs['y'],
        'address'=>$attrs['address'],
        'offer_description'=>$attrs['offer_description'],
        'number_of_rooms'=>$attrs['number_of_rooms'],
        'surface'=>$attrs['surface'],
        'image1'=> $image1,
        'image2'=> $image2,
        'image3'=> $image3,
        'image4'=> $image4,
      ]);   
  }
  // get all offers
  public function index()
  {
      return response([
          'offers' => Offer::orderBy('created_at', 'desc')->get()], 200);

  }
  // get agency offers
  public function show($offer_agency_name)
  {
      return response([
          'offers' => Offer::where('offer_agency_name', $offer_agency_name)->orderBy('created_at', 'desc')->get()], 200);

  }
  //delete offer
  public function destroyOffer($id)
  {
      $offer = Offer::find($id);

      if(!$offer)
      {
          return response([
              'message' => 'Post not found.'
          ], 403);
      }
      $offer->comments()->delete();
      $offer->delete();
      return response([
          'message' => 'Post deleted.'
      ], 200);
  }

  // get offer details
  public function offerDetails($id)
  {
      return response([
          'offer' => Offer::where('id', $id)->get()], 200);
  
  }
   // get offer infos
   public function offerInfos($x)
   {
       return response([
           'offer' => Offer::where('x', $x)->get()], 200);
   
   }

  // update offer

public function upOfferType(Request $request, $id)
{
  $attrs = $request->validate([
     'offer_type' => 'required|string',
    
   ]);
   Offer::where('id',$id)->update(array('offer_type'=>$attrs['offer_type']));

  
 }
public function upOfferPrice(Request $request, $id)
{
  $attrs = $request->validate([
     'offer_price' => 'required|string',
    
   ]);
   Offer::where('id',$id)->update(array('offer_price'=>$attrs['offer_price']));
 }

 public function upPropertyType(Request $request, $id)
{
  $attrs = $request->validate([
     'property_type' => 'required|string',
    
   ]);
   Offer::where('id',$id)->update(array('property_type'=>$attrs['property_type']));
 }

 public function upOfferLocation(Request $request, $id)
{
  $attrs = $request->validate([
     'offer_location' => 'required|string',
    
   ]);
   Offer::where('id',$id)->update(array('offer_location'=>$attrs['offer_location']));
 }

 public function upImg1(Request $request, $id)
 {
   $attrs = $request->validate([
      'image1' => 'required|string',
    ]);
    $image1 = $this->saveImage($request->image1, 'offers');
    Offer::where('id',$id)->update(array('image1'=>$image1));
 }

 public function upImg2(Request $request, $id)
 {
   $attrs = $request->validate([
      'image2' => 'required|string',
    ]);
    $image2 = $this->saveImage($request->image2, 'offers');
    Offer::where('id',$id)->update(array('image2'=>$image2));
 }
 
 public function upImg3(Request $request, $id)
 {
   $attrs = $request->validate([
      'image3' => 'required|string',
    ]);
    $image3 = $this->saveImage($request->image3, 'offers');
    Offer::where('id',$id)->update(array('image3'=>$image3));
 }
 
 public function upImg4(Request $request, $id)
 {
   $attrs = $request->validate([
      'image4' => 'required|string',
    ]);
    $image4 = $this->saveImage($request->image4, 'offers');
    Offer::where('id',$id)->update(array('image4'=>$image4));
 }

}