<?php 

$error = "";

if(!empty($_COOKIE['role'])){
    $role = $_COOKIE['role'];
    if($role == "c"){
        $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = ".$_COOKIE["id"]."");
        $reqCompanies->execute();
        $resultCompanies = $reqCompanies->fetchAll();
        $email = $resultCompanies[0]["email"];
        $name = $resultCompanies[0]["name"];
        $description = $resultCompanies[0]["description"];
        $ville = $resultCompanies[0]["ville"];
        $passwordHash = $resultCompanies[0]["password"];
        $pic = $resultCompanies[0]["photo"];

        echo '
        <form method="post">
    <div class="form-group">
        <label for="InputEmailCompanies">Email address</label>
        <input name="EmailUpdateCompanies" type="email" class="form-control" id="InputEmailCompanies" value="'.$email.'">
    </div>
    <div class="form-group">
        <label for="InputName">Name</label>
        <input name="NameUpdate" type="text" class="form-control" id="InputName" value="'.$name.'">
    </div>
    <div class="form-group">
        <label for="InputDescription">Description</label>
        <input name="DescriptionUpdate" type="textarea" class="form-control" id="InputDescription" value="'.$description.'">
    </div>
    <div class="form-group">
        <label for="inputCity">City</label>
        <input name="CityUpdate" type="text" class="form-control" id="inputCity" value="'.$ville.'">
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input name="Password1Update" type="password" class="form-control" id="InputPassword1" placeholder="Last password">
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2Update" type="password" class="form-control" id="InputPassword2" placeholder="New password">
    </div>
    <div class="form-group">
        <label for="InputPassword3">Password</label>
        <input name="Password3Update" type="password" class="form-control" id="InputPassword3" placeholder="Repeat new password">
    </div>
    <button name="SubmitUpdate" type="submit" class="btn btn-primary">Change</button>
    </form>
    ';
    if (isset($_POST['SubmitUpdate']) AND isset($_POST['EmailUpdateCompanies'])) {
        if (isset($_POST['NameUpdate']) and isset($_POST['CityUpdate']) and isset($_POST['Password1Update']) and isset($_POST['Password2Update']) and isset($_POST['Password3Update']) and isset($_POST['DescriptionUpdate'])) {
            $submit = $_POST['SubmitUpdate'];
            $email = $_POST['EmailUpdateCompanies'];
            $name = $_POST['NameUpdate'];
            $description = $_POST['DescriptionUpdate'];
            $city = $_POST['CityUpdate'];
            $password1 = hash("sha256", $_POST['Password1Update']);
            $password2 = hash("sha256", $_POST['Password2Update']);
            $password3 = hash("sha256", $_POST['Password3Update']);
            $request = $dbh->prepare('SELECT email FROM Companies WHERE email=?');
            $request->execute(array($dbh->quote($email)));
            $result = $request->fetchAll();
            if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
                $regex = "/[a-zA-Z]{3,30}$/";
                if (preg_match($regex, $name)) {
                    $regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
                    if (preg_match($regex, $city)) {
                        $regex = "/[a-zA-Z0-9]{8,}$/";
                        $request = $dbh->prepare('SELECT * FROM Companies WHERE id=? AND password=?');
                        $request->execute(array($dbh->quote($_COOKIE["id"]), $dbh->quote($password1)));
                        $result = $request->fetchAll();
                        print_r($result);
                        if(isset($result[0])){
                            if (preg_match($regex, $password2)) {
                                if ($password2 == $password3) {
                                                $count = $request = $dbh->exec('UPDATE companies (`email`, `password`, `name`, `description`, `ville`, `photo`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($name) . ',' . $dbh->quote($description) . ', ' . $dbh->quote($city) . ',' . $dbh->quote($pic['name']) . ') WHERE id='.$_COOKIE["id"].'');
                                                print_r($count);
                                           
                                } else {
                                    $error = "Both passwords must match.";
                                }
                            } else {
                                $error = "Invalid Password.";
                            }
                        }else{
                            $error = "Invalid last password.";
                        }
                    } else {
                        $error = "Invalid city.";
                    }
                } else {
                    $error = "Name not valid.";
                }
            } else {
                $error = "Invalid Email or already exist.";
            }
        } else {
            $error = "Fill all the blanks.";
        }
    }
    }else if($role == "p"){
        
    }
}

echo $error;
?>