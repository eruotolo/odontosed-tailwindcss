<?php

    $array = array("name" => "", "email" => "", "phone" => "", "message" => "",  "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = "edgardoruotolo@gmail.com, dravictoria.lapaz@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array["name"] = test_input($_POST["name"]);
        $array["email"] = test_input($_POST["email"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true;
        $emailText = "";


        if (empty($array["name"])) {
            $array["nameError"] = "Campo Nombre Incorrecto";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "Name: {$array['name']}\n";
        }

        if(!isEmail($array["email"])) {
            $array["emailError"] = "El formato del correo electrónico no es correcto";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "Email: {$array['email']}\n";
        }

        if (!isPhone($array["phone"])) {
            $array["phoneError"] = "El formato del correo teléfono no es correcto";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "Phone: {$array['phone']}\n";
        }

        if (empty($array["message"])) {
            $array["messageError"] = "Mensaje muy vacío o muy corto";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "Message: {$array['message']}\n";
        }

        if($array["isSuccess"]) {
            $headers = "From: {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Odontosed - Nuevo mensaje desde la web", $emailText, $headers);
        }

        echo json_encode($array);
    }

    function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone) {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>


