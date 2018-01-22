<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;

class ListingController extends Controller
{

    /*
    Abstract any common logic from our listing route methods into a new helper method.
    Nest the Listing model inside a Laravel Collection under the listing ke
    */
    private function get_listing($listing) 
    {
        $model = $listing->toArray();
        for ($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset(
                'images/' . $listing->id . '/Image_' . $i . '.jpg');
        }
        return collect(['listing' => $model]);
    }



    // homepage route
    public function get_home_web() {
        $collection = Listing::all([
            'id', 'address', 'title', 'price_per_night'
        ]);
        $collection->transform(function($listing) {
            $listing->thumb = asset(
                'images/' . $listing->id . '/Image_1_thumb.jpg'
            );
            return $listing;
        });
        $data = collect(['listings' => $collection->toArray()]);
        return view('app', ['data' => $data]);
    }



    // get a single resource for the API
    public function get_listing_api(Listing $listing) 
    {
        /* The payload for each listing in the web service should include 
        links to the images so a client app knows where to find them.

        First, use our model's toArray method to make an array representation of the model */
        $data = $this->get_listing($listing);

        /*  
            create an instance of the Response class by calling the response helper
            returning the result using the json method by passing in the array of fields
        */
        return response()->json($data);
    }



    // get a single resource for the Web
    public function get_listing_web(Listing $listing)
    {
        $model = $this->get_listing($listing);

        return view('app', ['data' => $model]);
    }
}
