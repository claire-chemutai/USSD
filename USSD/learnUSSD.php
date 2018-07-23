<?php
        #We obtain the data which is contained in the post url on our server.
        $text=$_GET['USSD_STRING'];
        $phonenumber=$_GET['DIRECTORY'];
        $serviceCode=$_GET['serviceCode'];
        $level = explode("*", $text);
        if (isset($text)) {
   
        if ( $text == "" ) {
            $response="Welcome to the registration portal.\nPlease enter you full name";
        }
        if(isset($level[0]) && $level[0]!="" && !isset($level[1])){
          $response="Hi ".$level[0].", Please enter your ward name";
             
        }
        else if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
                $response="CON Please enter you national ID number\n"; 
        }
        else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
            //Save data to database
            $data=array(
                'phonenumber'=>$phonenumber,
                'fullname' =>$level[0],
                'electoral_ward' => $level[1],
                'national_id'=>$level[2]
                );
            
            $response="END Thank you ".$level[0]." for registering.\nWe will keep you updated"; 
    }
        header('Content-type: text/plain');
        echo $response;
    }
    // <!-- MSISDN=0713038301&USSD_STRING=Claire&serviceCode=*144# -->
// <!-- Mobile Station International Subscriber Directory Number (MSISDN)  -->
?>


