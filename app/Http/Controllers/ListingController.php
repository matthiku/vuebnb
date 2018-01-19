<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;

class ListingController extends Controller
{

    private function add_image_urls($model, $id) 
    {
        for ($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset('images/' . $id . '/Image_' . $i . '.jpg');
        }
        return $model;
    }

    // get a single resource for the API
    public function get_listing_api(Listing $listing) 
    {
        /* The payload for each listing in the web service should include 
        links to the images so a client app knows where to find them.

        First, use our model's toArray method to make an array representation of the model */
        $model = $listing->toArray();
        $model = $this->add_image_urls($model, $listing->id);

        /*  
            create an instance of the Response class by calling the response helper
            returning the result using the json method by passing in the array of fields
        */
        return response()->json($model);
    }


    // get a single resource for the Web
    public function get_listing_web(Listing $listing)
    {
        $model = $listing->toArray();
        $model = $this->add_image_urls($model, $listing->id);

        return view('app', ['model' => $model]);
    }
}
