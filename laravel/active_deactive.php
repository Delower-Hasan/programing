<?php

About::where('status',1)->update([
    'status'=>0,
]);
About::where('id',$id)->update([
'status'=>1,
]);

?>