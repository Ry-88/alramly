<?php


namespace App\Helpers;



class ImageUploder {

    public static function uploadOneImage($request, $folder) {
        $extension = $request->image->getClientOriginalExtension();
        $image = $request->image->move($folder, time().'-'.rand(10, 10000).'.'.$extension);

        return $image;
    }

  public static function uploadMultipleImages($request, $folder) {
        $images = [];
        foreach ($request->images as $image) {
            $extension = $image->getClientOriginalExtension();
            $images[] = $image->move($folder, time().'-'.rand(10, 10000).'.'.$extension);
        }

        return $images;
    }

}