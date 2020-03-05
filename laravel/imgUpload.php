<?php
// Before using Image class, install intervention image laravel

//  insertion image 
if($request->hasFile('logo')){
    $get_image = $request->file('logo');
    $image = Str::random(10).".".$get_image->getClientOriginalExtension();
    Image::make($get_image)->resize(300, 200)->save(public_path('/backend/upload_image/'.$image));
}
else{
    $image = 'default.png';
}


//  update image 
$icon =Service::where('id',$id)->first();
$service_icon =$icon->icon;
if( $request->hasFile('icon')){
 $get_image = $request->file('icon'); //orginal image;
 $image = Str::random(5).'.'.$get_image->getClientOriginalExtension(); //to get New(custom) image name
 Image::make($get_image)->resize(300, 200)->save(public_path('/backend/upload_image/'.$image));
if(file_exists($service_icon)){
   unlink($service_icon);
}
    Service::findOrFail($id)->update([
    "title"=>$request->title,
    "subtitle"=>$request->subtitle,
    "icon"=>"backend/upload_image/".$image,
    "icon_title"=>$request->icon_title,
    "icon_subtitle"=>$request->icon_subtitle,
    "status"=>$request->status,
    ]);
}
else{
    Service::findOrFail($id)->update([
        "title"=>$request->title,
        "subtitle"=>$request->subtitle,
        "icon_title"=>$request->icon_title,
        "icon_subtitle"=>$request->icon_subtitle,
        "status"=>$request->status,
        ]);
}


//  delete image 
$delete = Header::findOrFail($id)->logo;
unlink($delete);
Header::findOrFail($id)->delete();


// multiple Image insert
if($request->hasFile('banner_image')){
    $get_image = $request->file('banner_image');
    $imgArry = [];
    foreach($get_image as $images){
        $image = Str::random(10).".".$images->getClientOriginalExtension();
        Image::make($images)->resize(724,724)->save(public_path('/backend/banner_images/'.$image));
        array_push($imgArry,"backend/upload_image/".$image);
    }
        BannerModel::insert([
        "banner_image"=>json_encode($imgArry),
        "banner_title"=>$request->banner_title,
        "created_at"=>Carbon::now(),
        ]);

}


?>