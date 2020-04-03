<?php 

//Phase 2: Step # 2
require_once 'config.php';

//Check the if the subscribe button clicked or set
if(isset($_POST['subscribe'])){

    //Phase 2: Step # 3
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    //Phase 3: Step # 1
    $result = $objDB->query("SELECT * FROM subscribers WHERE email = '$email'");
    
    if($result->num_rows){
       $_SESSION['msg'] = 'Hi! Email already exists';
    }else{
        
        //Phase 3: Step # 2
        $code = md5(crypt(rand(), 'aa'));
        
        //Phase 2: Step # 4
        $objDB->query("INSERT INTO subscribers (email, reset_code) VALUES ('$email', '$code')");

        //Phase 2: Step # 5
        $_SESSION['msg'] = 'Please, check your email to get free ebook.';
        
        //Phase 3: Step # 5
        
        $message = "Hi! You just subscribed for our ebook. In order to get that you need to verify your email. Please, verify by clicking <a href='http://localhost/jscourse/verify_email.php?code=$code'>here</a>.";

         send_mail([
             'to' => $email,
             'from' => 'Creative Tools',
             'message' => $message,
             'subject' => 'Verify Email'
         ]);
    }
    
    
    
    header('Location:index.php');
}

