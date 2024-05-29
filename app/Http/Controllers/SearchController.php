<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
 
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('searchDemo');
    }
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request): JsonResponse
    {
        $data = [];
     
        if($request->filled('q')){
            $data = User::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->take(10)
                        ->get();
        }
      
        return response()->json($data);
    }
}