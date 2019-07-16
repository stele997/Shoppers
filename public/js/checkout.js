$(document).ready(function(){
        $("#naruci").submit(function(){
            $greske=[];

            $firstName=$("#firstName").val();
            $lastName=$("#lastName").val();
            $address=$("#address").val();
            $phone=$("#phone").val();
            $email=$("#email").val();

            $reFirstName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
            $reLastName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
            $reAddress=/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/;
            $rePhone=/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/;
            $reEmail=/^[a-z0-9\.]{1,25}@[a-z0-9]{1,25}(\.[a-z0-9]{1,25})+$/;

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
            if(!$reAddress.test($address)){
                $greske.push("Address is not in correct format!");
                $("#address").css("border","1px solid red");
            }
            else{
                $("#address").css("border","");
            }
            if(!$rePhone.test($phone)){
                $greske.push("Phone is not in correct format!");
                $("#phone").css("border","1px solid red");
            }
            else{
                $("#phone").css("border","");
            }
            if(!$reEmail.test($email)){
                $greske.push("Email is not in correct format!");
                $("#email").css("border","1px solid red");
            }
            else{
                $("#email").css("border","");
            }
            if($greske.length>0){
                console.log($greske)
                return false;
            }else{
                return true;
            }

        })
})