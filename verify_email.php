<?php

//Phase 4: Step # 2
require_once 'config.php';

//Phase 4: Step # 3
if(isset($_GET['code'])){
    
    $code = $_GET['code'];
    
    //Phase 4: Step # 4
    $result = $objDB->query("SELECT * FROM subscribers WHERE reset_code='$code'");
    
    
     if($result->num_rows==1){
        
        $data = $result->fetch_object();
        
        if($data->reset_code==$code){
            
            //update the record of subscriber from is_active 0 to 1 and reset_code to empty
            $objDB->query("UPDATE subscribers SET is_active=1, reset_code='' WHERE reset_code='$code'");
            
            //Send email
             $message = "Hi! You can download your ebook from <a href='http://localhost/jscourse/ebook.pdf'>here</a>.";

             send_mail([
                 'to' => $data->email,
                 'from' => 'Creative Tools',
                 'message' => $message,
                 'subject' => 'Verify Email'
             ]);
            
            //send message back to home page
            $_SESSION['msg'] = 'Congratulations! eBook has been sent to your email address. Please, check your email and download your free ebook.';
        }
  
    }else{
        $_SESSION['msg']='Record not found';
       
    }
    
     header('Location:index.php');
}