<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$gender = $_POST['gender'] ?? NULL;
$url = $_POST['url'];
$errors = [];

function cleanDate($input) 
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // validation for name
    if (!empty($name))
    {
        $name = cleanDate($name);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name))
        {
            $errors[] = 'name: You have to enter only alphabets and spaces';
        }
        else {
            $nameCtion = 'Name : '.$name.'<br>';
        }
    }
    else {
        $errors[] = 'name is required';
    }
    // validation for email
    if (!empty($name))
    {
        $email = cleanDate($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors[] = 'Invalid email';
        }
        else {
            $emailCtion = 'Email : '.$email.'<br>';
        }
    }
    else {
        $errors[] = 'email is required';
    }
    // validation for password
    if (!empty($password))
    {
        $password = cleanDate($password);
        if (strlen($password) <= '6')
        {
            $errors[] = 'password is at least 6 charaters !';
        }

        else {
            $passwordCtion = 'Password : '.$password.'<br>';
        }
    }
    else {
        $errors[] = 'password is required';
    }
    // validation for address
    if (!empty($address))
    {
        $address = cleanDate($address);
        if (strlen($address) <= '10')
        {
            $errors[] = 'address is at least 10 charaters !';
        }

        else {
            $addressCtion = 'Address : '.$address.'<br>';
        }
    }
    else {
        $errors[] = 'address is required';
    }
    // validation for gender
    if ($gender != NULL)
    {
        $genderCtion = 'Gender : '.$gender.'<br>';
    }
    else {
        $errors[] = 'gender is required';
    }
    // validation for url
    if (!empty($url))
    {
        $url = cleanDate($url);
        if (filter_var($url, FILTER_VALIDATE_URL))
        {
            if (substr($url, 0, 23) !== 'http://www.linkedin.com') {
                $errors[] = 'Enter linkedin url !';
            }
            else{
                $urlCtion = 'Linkedin url : '.$url.'<br>';
            }
        }
        else{
            $errors[] = 'invalid url';
        }
    }
    else {
        $errors[] = 'url is required';
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        div.card{
            box-shadow: 0 0 15px #cf7182;
            margin: 200px auto;
            font-weight: 500;
            /* text-align: center; */
            color: #8b6b6b;
            padding: 30px 15px;
            border-radius: 10px;
            width: 50%;
            background-color: #eedde5;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
  </head>
<body class="pt-5">
    <?php if (!empty($errors)){
        foreach ($errors as $error) { ?>
            <div class=" container alert alert-danger" role="alert">
                <?php echo $error;?>
            </div>
        <?php }?>
    <?php }?>
        <div class="card" <?php if ($gender != NULL and $gender == 'male') { echo "style='box-shadow: 0 0 15px #1a1e33;background-color: #15192f; color: #ededf2'";}?>>
            <?php if (!empty($nameCtion)) { echo '<h2>'.$nameCtion.'</h2>'; }?>
            <?php if (!empty($emailCtion)) { echo '<h2>'.$emailCtion.'</h2>'; }?>
            <?php if (!empty($passwordCtion)) { echo '<h2>'.$passwordCtion.'</h2>'; }?>
            <?php if (!empty($addressCtion)) { echo '<h2>'.$addressCtion.'</h2>'; }?>
            <?php if (!empty($genderCtion)) { echo '<h2>'.$genderCtion.'</h2>'; }?>
            <?php if (!empty($urlCtion)) { echo '<h2>'.$urlCtion.'</h2>'; }?>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>