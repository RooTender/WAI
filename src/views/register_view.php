<!DOCTYPE html>
<html lang="pl-PL">
<?php require_once 'include/head.php'; ?>

<body>
    <?php require_once 'include/navigation.php'; ?>

    <header>
        <h1>Rejestracja i logowanie<br/></h1>
    </header>

    <hr/>

    <main>
        <form>
            <div class="box">

                <h1>Rejestracja</h1>                
                <div class="input-styling">
                    <label for="email">Email: </label>
                    <input type="email" name="email" placeholder="example@mail.com" class="textbox" /><br>
    
                    <label for="pass">Hasło: </label>
                    <input type="password" name="pass" class="textbox" /><br>

                    <label for="pass">Powtórz hasło: </label>
                    <input type="password" name="passRepeat" class="textbox" /><br>
                </div>
                <input type="reset" class="btn reset" value="Wyczyść pola">
                <input type="submit" class="btn submit" value="Zarejestruj"><br><br>

                <p>Już masz konto? <a href="login">Zaloguj się</a>!</p><br>
            </div>
        </form>    
    </main>

    <?php require_once 'include/footer.php' ?>
</body>
</html>