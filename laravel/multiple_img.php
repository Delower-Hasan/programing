<?

// ************INSERT******************

function postBanner(Request $request){
    $request->validate([
        'banner_image'=>['required'],
        'banner_title'=>['required'],
       ]);
       if($request->hasFile('banner_image')){
        $get_image = $request->file('banner_image');
        $imgArry = [];
        foreach($get_image as $images){
            $image = Str::random(10).".".$images->getClientOriginalExtension();
            Image::make($images)->resize(724,724)->save(public_path('/backend/banner_images/'.$image));
            array_push($imgArry,"backend/banner_images/".$image);
        }
            BannerModel::insert([
            "banner_image"=>json_encode($imgArry),
            "banner_title"=>$request->banner_title,
            "created_at"=>Carbon::now(),
            ]);
    }
    return redirect('/view/banner')->with('added','Product Submited successfully');
}

// ************VIEW******************

function viewBanner(){
    $banners = BannerModel::paginate();
    $banner_arr = [];
    foreach($banners as $banner){
        $images =json_decode($banner['banner_image']);
        array_push($banner_arr,$images);
    }
    return view('backend.view_banner',compact('banners','banner_arr'));
}


// ************EDIT******************


function PostEditBanner(Request $request, $id){

       if($request->hasFile('banner_image')){
        $get_image = $request->file('banner_image');
        $imgArry = [];
        foreach($get_image as $images){
            $image = Str::random(10).".".$images->getClientOriginalExtension();
            Image::make($images)->resize(724,724)->save(public_path('/backend/banner_images/'.$image));
            array_push($imgArry,"backend/banner_images/".$image);
        }
        $image_items = BannerModel::where('id',$id)->first();
        $images = $image_items->banner_image;
        $arr_img = json_decode($images);
        foreach($arr_img as $img){
        if(file_exists($img)){
                unlink($img);
            }
        }
            BannerModel::findOrFail($id)->update([
            "banner_image"=>json_encode($imgArry),
            "banner_title"=>$request->banner_title,
            "updated_at"=>Carbon::now(),
            ]);
    }
    else{
        BannerModel::findOrFail($id)->update([
            "banner_title"=>$request->banner_title,
            "updated_at"=>Carbon::now(),
            ]);
    }
    return redirect('/view/banner')->with('edited','Product edited successfully');


}

// ************DELETE******************


function Delete_banner($id){
    $image_items = BannerModel::where('id',$id)->first();
    $images = $image_items->banner_image;
    $arr_img = json_decode($images);
    foreach($arr_img as $img){
    if(file_exists($img)){
            unlink($img);
        }
    }
    BannerModel::where('id',$id)->delete();
    return redirect('/view/banner')->with('deleted','Product Deleted successfully');
}














?>