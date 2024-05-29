<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('imageUpload');
    }
          
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
          
        $imageName = time().'.'.$request->image->extension();  
           
        // $request->image->move(public_path('images'), $imageName);
        // $request->image->storeAs('images', $imageName);
        $request->image->move(public_path('images'), $imageName);
        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */
          
        return back()->with('success', 'Image uploaded successfully!')
                     ->with('image', $imageName); 
    }
}