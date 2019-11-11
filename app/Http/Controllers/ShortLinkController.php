<?php
  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Str;
  
class ShortLinkController extends Controller
{ 
    public function index() // Get Latest Link
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
    }
     
    public function store(Request $request) //When Requesting short link 
    {
        $request->validate([ //Validate link
           'link' => 'required|url'
        ]);
        // Genarate string for link
        $input['link'] = $request->link; 
        $input['code'] = Str::random(6); 
   
        ShortLink::create($input);
  
        return redirect('generate-shorten-link') // refresh, and add ->
             ->with('success', 'Short Link Generated Successfully!');
    }
   
    public function shortenLink($code) 
    {
        $find = ShortLink::where('code', $code)->first(); //Find code, redirect to link
   
        return redirect($find->link); // Return Link
    }   
}