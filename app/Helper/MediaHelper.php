<?php

namespace App\Helper;
use App\Models\Media;
use Intervention\Image\ImageManager;

class MediaHelper{

    public static function store($file, $mediable_id, $mediable_type){
        $media = new Media();
        $media->mediable_id = $mediable_id;
        $media->mediable_type = $mediable_type;
        $fileName = time() . '_'.$mediable_id .".". $file->getClientOriginalExtension();
        $media->file_ext = $file->getClientOriginalExtension();
        $media->file_path = $file->storeAs('media', $fileName);
        $media->save();
        if(in_array($file->getClientOriginalExtension(),['jpg', 'jpeg', 'png', 'gif'])){
            // make a thumbnail of the image with Intervention Image
            $image = ImageManager::gd()->read($file);
            $fileName = time() . '_'.$mediable_id ."_thum.". $file->getClientOriginalExtension();
            $image->scale(150,150)->save(public_path('media/'.$fileName));
            $media->file_thumbnail = 'media/'.$fileName;
            $media->save();
        }
        return $media;
    }

    public static function update($file, $media){
        $media->file_ext = $file->getClientOriginalExtension();
        $fileName = time() . '_'.$media->mediable_id .".". $file->getClientOriginalExtension();
        $media->file_path = $file->storeAs('media', $fileName);
        $media->save();
        return $media;
    }

}