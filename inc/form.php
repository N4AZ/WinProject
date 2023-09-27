<?php
    if(isset($_POST['firstName']))
        $firstName = $_POST['firstName'];
    if(isset($_POST['lastName']))
        $lastName = $_POST['lastName'];
    if(isset($_POST['email']))
        $email = $_POST['email'];

    $errors = 
    [
        'firstNameError' => '',
        'lastNameError' => '',
        'emailError' => '',
    ];

    if(isset($_POST['submit']))
    {
        if(empty($firstName))
        {
            $errors['firstNameError'] = '<span style="color:red;">الرجاء إدخال الأسم الأول</span>';
        }

        if(empty($lastName))
        {
            $errors['lastNameError'] = '<span style="color:red;">الرجاء إدخال الأسم الأخير</span>';
        }
        
        if(empty($email))
        {
            $errors['emailError'] = '<span style="color:red;">الرجاء إدخال الإيميل</span>';
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['emailError'] = '<span style="color:red;">الرجاء إدخال إيميل صحيح</span>';
        }

        if(!array_filter($errors))
        {
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lasttName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            
            $sql = "INSERT INTO users(firstName, lastName, email) 
            VALUES ('$firstName', '$lasttName', '$email')";

            if(mysqli_query($conn,$sql))
            {
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
            else
            {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }