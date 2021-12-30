<?php

namespace App\Traits;

use App\Models\BenefitRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Essentials
{
    public function greet()
    {
        $hour = Carbon::now()->hour;
        if ($hour < 12) {
            return 'Good morning';
        }
        if ($hour >= 12 && $hour < 17) {
            return 'Good afternoon';
        }

        return 'Good evening';
    }

    //Work on images here....
    public function getUploadedImages(Request $request)
    {
        $images = Collection::wrap($request->file('product_images'));
        $files = array();

        foreach ($images as $index => $image) {
            //create random string to use as filename then use it together with the file's extension to save it
            $basename = Str::random();
            $actualFileName = $basename . "." . $image->getClientOriginalExtension();

            //store filename in array to save to database
            $files[$index] = $actualFileName;

            //now save to folder
            $image->move(public_path('/images'), $actualFileName);
        }

        //dd(json_encode($files));
        return json_encode($files);
    }

    /** THis function is used to generate
     * the RequestID for benefits
     * @param charset is set of accepted characters used in generation
     * @param length is the length of characters to generate
     * @param random_character is character generated per loop run
     * @param gened is final code generated
     */
    public function generateRequestId()
    {
        $charset = '0123456789';
        $length = 4;
        $input_length = strlen($charset);
        $random_string = '';

        for ($i = 0; $i < $length; $i++) {
            $random_character = $charset[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        //die($gened);

        return "BRI" . Carbon::now()->format('YmdH') . $random_string;
    }

    public function updateMedia(BenefitRequest $benefitRequest)
    {
//        dd($benefitRequest);
//        dd(request());

        //check if the request has a file(s). If it does, upload
        //the file(s) based on the request type and update the record
        if (request()->has('poster') || request()->has('birth_certificate')) {
            //check if there is a media for the request and delete the file(s)
            if (isset($benefitRequest->media)) {
                Storage::disk('public')->delete($benefitRequest->media);
            }

            if ($benefitRequest->request_type == 'Child Birth') {
                $benefitRequest->media = request()->birth_certificate->store('childbirths', 'public');
            } elseif ($benefitRequest->request_type == 'Death of Parent') {
                $benefitRequest->media = request()->poster->store('deathofparents', 'public');
            } else {
                $benefitRequest->media = request()->poster->store('deathofspouses', 'public');
            }

            $benefitRequest->save();

//            dd($benefitRequest);
        }
    }
}
