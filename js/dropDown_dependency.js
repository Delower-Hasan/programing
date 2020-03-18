<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('ajax/country')}}/"+countryID,
           success:function(res){
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city").append(`<option value='${value.id}'> ${value.name}</option>`);
                });

            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }
   });

    $('#city').on('change',function(){
    var stateID = $(this).val();
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('ajax/city')}}/"+stateID,
           success:function(res){
            if(res){
                $("#state").empty();
                $.each(res,function(key,value){
                    $("#state").append(`<option value='${value.id}'> ${value.name}</option>`);
                });

            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
    }

   });
</script>

// ******************routes************

Route::get('/ajax/country/{country_id}', 'HomeController@country_azax');
Route::get('/ajax/city/{state_id}', 'HomeController@state_aax');

// ********************controllers***************
function country_azax($country_id){
    $city = states::where('country_id',$country_id)->get();
    return response()->json($city);
}
function state_aax($state_id){
    $city = cities::where('state_id',$state_id)->get();
    return response()->json($city);
}
