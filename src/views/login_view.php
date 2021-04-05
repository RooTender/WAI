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

                <h1>Logowanie</h1>
                <div class="input-styling">
                    <label for="email">Email: </label>
                    <input type="email" name="email" placeholder="example@mail.com" class="textbox" /><br>
    
                    <label for="pass">Hasło: </label>
                    <input type="password" name="pass" class="textbox" /><br>
                </div>
                <input type="reset" class="btn reset" value="Wyczyść pola">
                <input type="submit" class="btn submit" value="Zaloguj">
                <br><br>

                <p>Nie masz konta? <a href="register">Zarejestruj się</a>!</p>
                <br>
            </div>
        </form>    
    </main>

    <?php require_once 'include/footer.php' ?>
</body>
</html>