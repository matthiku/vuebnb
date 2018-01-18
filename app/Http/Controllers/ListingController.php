<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;

class ListingController extends Controller
{
    // get a single resource
    public function get_listing_api(Listing $listing) 
    {
        /*  
        The payload for each listing in the web service should include 
        links to the images so a client app knows where to find them.
        We are adding the image paths to our listing API payload like this:
            {
                "id": 1,
                "title": "...",
                "description": "...",
                ...
                "image_1": "http://vuebnb.oo/app/image/1/Image_1.jpg",
                "image_2": "http://vuebnb.oo/app/image/1/Image_2.jpg",
                "image_3": "http://vuebnb.oo/app/image/1/Image_3.jpg",
                "image_4": "http://vuebnb.oo/app/image/1/Image_4.jpg"
            }

        */
        // first, use our model's toArray method to make an array representation of the model
        $model = $listing->toArray();
        // use a for loop and the asset helper to generate fully-qualified URLs to files in the public folder
        for($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset(
                'images/' . $listing->id . '/Image_' . $i . '.jpg'
            );
        }
        /*  
            create an instance of the Response class by calling the response helper
            returning the result using the json method by passing in the array of fields
        */
        return response()->json($model);
    }
}
