<?php

namespace App\Helper;
use App\Models\Media;
use Intervention\Image\ImageManager;
use GuzzleHttp\Client;
class MediaHelper{

    public static function store($file, $mediable_id, $mediable_type){
        $media = new Media();
        $media->mediable_id = $mediable_id;
        $media->mediable_type = $mediable_type;
        $fileName = time().rand(10,100) . '_'.$mediable_id .".". $file->getClientOriginalExtension();
        $media->file_ext = $file->getClientOriginalExtension();
        $media->file_path = $file->storeAs('assets/products', $fileName);
        $media->save();
        if(in_array($file->getClientOriginalExtension(),['jpg', 'jpeg', 'png', 'gif'])){
            // make a thumbnail of the image with Intervention Image
            $image = ImageManager::gd()->read($file);
            $fileName = time().rand(10,100) . '_'.$mediable_id ."_thum.". $file->getClientOriginalExtension();
            $image->scale(150,150)->save(public_path('assets/products/'.$fileName));
            $media->file_thumbnail = 'assets/products/'.$fileName;
            $media->save();
        }
        return $media;
    }

    public static function url($url,$mediable_id, $mediable_type, $download = false){
        $media = new Media();
        $media->mediable_id = $mediable_id;
        $media->mediable_type = $mediable_type;
        if($download === false){
            $ext = explode('.', $url);
            $media->file_ext = $ext[count($ext)-1];
            $media->file_path = $url;
            $media->save();
            return $media;
        }
        $client = new Client();
        $response = $client->request('GET', $url);
        $ext = explode('.', $url);
        $fileName = time().rand(10,100) . '_'.$mediable_id .".". $ext[count($ext)-1];
        $client->get($url, ['sink' => public_path('assets/products/'.$fileName)]);
        $media->file_ext = $ext[count($ext)-1];
        $media->file_path = 'assets/products/'.$fileName;
        $media->save();
        if(in_array($media->file_ext,['jpg', 'jpeg', 'png', 'gif','webp'])){
            $file = public_path('assets/products/'.$fileName);
            // make a thumbnail of the image with Intervention Image
            $image = ImageManager::gd()->read($file);
            $fileName = time().rand(10,100) . '_'.$mediable_id ."_thum.". $file->getClientOriginalExtension();
            $image->scale(150,150)->save(public_path('assets/products/'.$fileName));
            $media->file_thumbnail = 'assets/products/'.$fileName;
            $media->save();
        }
        return $media;
    }

    public static function update($file, $media){
        $media->file_ext = $file->getClientOriginalExtension();
        $fileName = time().rand(10,100) . '_'.$media->mediable_id .".". $file->getClientOriginalExtension();
        $media->file_path = $file->storeAs('media', $fileName);
        $media->save();
        return $media;
    }

}