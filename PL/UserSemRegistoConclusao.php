<section>
    <p class="titile2">Os Seus Dados</p>
    <div class="divmain">

        <form method="POST">

            <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span>&#160Já sou cliente Melitour</button>
            <div class="form-popup" id="myForm">
                <form method="post" class="form-container" >
                    <h1></h1>

                    <label for="email"><b>Email</b></label>
                    <br>
                    <input id="log2" type="email" placeholder="Enter Email" name="userEmail" required>

                    <label for="psw"><b>Password</b></label>
                    <input id="log" type="password" placeholder="Enter Password" name="signUp_Password" required>
                    <br>
                    <button type="submit" name="Login" class="btn">Login</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
                <script>
                    function openForm() {
                        document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                        document.getElementById("myForm").style.display = "none";
                    }
                </script>
            </div>


           <!-- <a id="jasoucliente" href="#"><span class="glyphicon glyphicon-user"></span>&#160Já sou cliente Melitour</a><br/>-->
            <br/><input class="tamanho-inputXL" type="text" name="nome_login" placeholder="Nome de login"> <br/>
            <br/><input class="tamanho-inputXL" type="text" name="userName" placeholder="Nome Completo"> <br/>
            <br/><input class="tamanho-inputXL" type="text" name="userEmail" placeholder="Email"><br/>
            <br/><input class="tamanho-inputXL" type="password" name="signUp_Password" placeholder="Password"><br/>
            <br/><input class="tamanho-inputXL" type="password" name="signUp_passwordConfirmated" placeholder="Confirmar Password"><br/>
            <br/><input class="tamanho-inputXL" type="text" name="dataNascimento" placeholder="Data de Nascimento (AAAA/MM/DD)"> <br/>
            <br/><input class="tamanho-inputXL" type="text" name="nif" placeholder="NIF"><br/>
           <!-- <div> <input type="radio" name="exampleRadios" value="option1"> <span class="confirma">Confirmo que os meus dados estão correto</div>-->
            <br/> <a href="./index.php?page=PagamentoConclusao"><input class="tamanho-inputXL" type="submit" name="user-signup" value="Pagar"></a>
        </form>
    </div>
</section>
