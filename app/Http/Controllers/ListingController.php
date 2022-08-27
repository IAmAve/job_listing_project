<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //Show all Listing
    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);
    }

    //Show Single Listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form 
    public function create(){
        return view('listings.create');
    }

    //Store Listing data
    public function store(Request $request){
        //dd($request->all()); -> for Debugging forms or testing
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        //creating logos folder in public where logos forwarded
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        
        //
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'New Job Created for All');
    }

    //Show edit form
    public function edit(Listing $listing){
        return view('listings.edit',['listing' => $listing]);
    }


    //update listing data
    public function update(Request $request, Listing $listing){
        //dd($request->all()); //-> for Debugging forms or testing

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        //creating logos folder in public where logos forwarded
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Job Succesfully Updated');
    }

    //Delete Function
    public function destroy(Listing $listing){

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Job has been Deleted');
    }

    //manage function
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
