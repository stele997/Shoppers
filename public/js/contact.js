$(document).ready(function(){
    $("#sendMessage").submit(function(){
        $greske=[];

        $firstName=$("#firstName").val();
        $lastName=$("#lastName").val();
        $email=$("#email").val();
        $subject=$("#subject").val();
        $message=$("#message").val();
        $reFirstName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
        $reLastName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
        $reEmail=/^[a-z0-9\.]{1,25}@[a-z0-9]{1,25}(\.[a-z0-9]{1,25})+$/;
        $reSubjectMessage=/^[A-Za-z0-9\s\.\,]+$/;

        if(!$reFirstName.test($firstName)){
            $greske.push("First name is not in correct format!");
            $("#firstName").css("border","1px solid red");
        }
        else{
            $("#firstName").css("border","");
        }
        if(!$reLastName.test($lastName)){
            $greske.push("Last name is not in correct format!");
            $("#lastName").css("border","1px solid red");
        }
        else{
            $("#lastName").css("border","");
        }
        if(!$reEmail.test($email)){
            $greske.push("Email is not in correct format!");
            $("#email").css("border","1px solid red");
        }
        else{
            $("#email").css("border","");
        }
        if(!$reSubjectMessage.test($subject)){
            $greske.push("Subject is not in correct format!");
            $("#subject").css("border","1px solid red");
        }
        else{
            $("#subject").css("border","");
        }if(!$reSubjectMessage.test($message)){
            $greske.push("Message is not in correct format!");
            $("#message").css("border","1px solid red");
        }
        else{
            $("#message").css("border","");
        }
        if($greske.length>0){
            return false;
        }else{
            return true;
        }
    })
})