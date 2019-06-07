
<?php
    $info=User::getInformUser();
?>
<div xmlns="http://www.w3.org/1999/html">
    <!--            <p class="titile2">Sign Up</p>-->

    <div class="form-row">

        <div class="container">

            <p class="titile2">Definições Da Conta</p>

            <div class="row">

                <div class="col-sm">

                    <div class="col-md-6">
                        <div class="divmain">
                        <!--begin display user account information-->
                            <label><h6 class="PASS">Nome de login</h6></label>
                           <input type="" class="form-control" disabled="disabled" name="userLoginName" value="<?php echo $info["nome_login"]?>" >
                            </br>
                            <label><h6 class="PASS">Nome Proprio</h6></label>
                            <input type="" class="form-control"  disabled="disabled" name="userRealName" value="<?php echo $info["nome"]?>">
                            </br>
                            <label><h6 class="PASS">Email</h6></label>
                            <input type="email" class="form-control"  name="userEmail" disabled="disabled" value="<?php echo $info["email"]?>">
                            </br>
                            <label><h6 class="PASS">Password</h6></label>
                            <input type="password" class="form-control" id="col- col-form-label" name="password" disabled="disabled" value="<?php echo $info["password"]?>">
                            <h6 style="color: white"><input type="checkbox" onclick="myFunction()"> &#160 Show Password</h6>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("col- col-form-label");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                            <br>
                            <label><h6 class="PASS">Data de nascimento</h6></label>
                            <input type="txt" class="form-control"  name="userBirth" disabled="disabled" value="<?php echo $info["dataNascimento"]?>">
                            </br>
                            <label><h6 class="PASS">NIF</h6></label>
                            <input type="txt" class="form-control"  name="userNif" disabled="disabled" value="<?php echo $info["nif"]?>">
                            </br>
                        </div>
                            <!--end display user account information-->
                            <!--Alterar Password-->
                        <form method="post">
                        <div class="divmain">
                            <h3><b>Alterar Password</b></h3>
                            </br>
                            <input type="password" class="form-control" id="col- col-form-label"  placeholder="Password Antiga" name="old_password" required>
                            </br>
                            <input type="password" class="form-control" id="col- col-form-label"  placeholder="Nova Password" name="new_password" required>
                            </br>
                            <input type="password" class="form-control" id="col- col-form-label" placeholder="Confirmar Password" name="repeatNewPass" required>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Atualizar Password" name="changepass" width="inherit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
