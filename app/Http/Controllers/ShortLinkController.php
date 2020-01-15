<?php
  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Str;
  
class ShortLinkController extends Controller
{   // Get Link Input
    public function index() 
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
    }
     //Store link 
    public function store(Request $request) 
    {   //Validate link
        $request->validate([ 
           'link' => 'required|url'
        ]);
        // Genarate code for link
        $input['link'] = $request->link; 
        $input['code'] = Str::random(6); 
   
        ShortLink::create($input);
  
        return redirect('/') // refresh, and add ->
             ->with('success', 'Short Link Generated Successfully!');
    }
   // code to redirect
    public function shortenLink($code) 
    {
        $find = ShortLink::where('code', $code)->first();
   
        return redirect($find->link);
    }   
}