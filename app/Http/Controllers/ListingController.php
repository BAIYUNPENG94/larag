<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    //public function index(Request $request) {
    public function index() {
        //dd(request(['tag'])); // Both method is okay
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show listing creration form
    public function create() {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        // rules for input
        $formFields = $request->validate([
            'title' => 'required',
            //'company' => ['required', Rule::unique('listings', 'company')],
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            //dd($formFields);
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Job has been added successfully');
    }
}