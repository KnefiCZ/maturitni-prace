<?php require_once "classes/Model.php";?>
<?php require_once "header.php";?>
<?php 
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');
$SQLbirthdate = date('Y-m-d', strtotime($birthdate));
$address = filter_input(INPUT_POST, 'address');
$id_post = filter_input(INPUT_POST, 'id_post');
$submit = filter_input(INPUT_POST, 'submit');

    $message = "Stránka byla načtena...";
    if(isset($submit)) {
        $message = "Stránka byla načtena odesláním formuláře...";
        $result = UserModel::addUser($firstname, $lastname, $email, $password, $birthdate, $address, $id_post);
        if($result) {
            $message .= "Tásk byl úspěšně přídán...";       
        }
        else {
            $message .= "Nebylo možné přidat!!";
        }
    }

?>

<?php echo $message;?>
<h1>Přidání uživatele...</h1>
<form action="add_user.php"method="post">

    <label for="firstname">Jméno:</label>
            <input type="text" name="firstname"> <br>
    <label for="lastname">Příjmení:</label>
            <input type="text" name="lastname"> <br>
    <label for="email">Email:</label>
            <input name="email" type="email" placeholder="xxxx@yyyy.xy"><br>
    <label for="password">Heslo:</label>
            <input name="password" type="password" placeholder="********"><br>
    <label for="birthdate">Datum narození:</label>
            <input name="birthdate" type="date"><br>
    <label for="address">Adresa:</label>
            <input name="address" type="text" placeholder="..."><br>
    <input type="submit" name="submit" id="submit">  

</form>
    

<? require_once "footer.php"?>

 