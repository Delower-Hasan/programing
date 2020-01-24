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
if( $request->hasFile('logo')){
    $get_image = $request->file('logo'); //orginal image;
    $image = Str::random(5).'.'.$get_image->getClientOriginalExtension(); //to get New(custom) image name
    Image::make($get_image)->resize(300, 200)->save(public_path('/backend/upload_image/'.$image));
    if($request->file("logo")){
        $new_image = Header::findOrFail($id)->logo;
        unlink($new_image);
    }
    }
else{
$image = 'default.png';
}

//  delete image 
$delete = Header::findOrFail($id)->logo;
unlink($delete);
Header::findOrFail($id)->delete();


?>