<!DOCTYPE html>
<html lang="pl-PL">
<?php require_once 'include/head.php'; ?>

<body>
    <?php require_once 'include/navigation.php'; ?>

    <header>
        <h1>Chcesz się z czymś ze mną podzielić? Napisz do mnie!</h1>
    </header>

    <hr/>

    <main>
        <section>
            <h2>Kontakt</h2>
            <p>Jedyna aktualna możliwość kontaktu jest przez wysłanie treści poniższym formularzem. Tak zadecydowałem, w celu ochrony swojej prywatności oraz ograniczenia spamu.</p>
        </section>
        <section>
            <h2>Formularz kontaktowy</h2>

            <form action="#" method="POST">
                <label for="messageContent">Treść wiadomości:</label><br>
                <textarea id="messageContent" style="width: 99.25%;" rows="5">
                    
                </textarea><br>

                <input type="reset" class="btn reset" value="Wyczyść tekst">
                <input type="submit" class="btn submit" value="Wyślij">
            </form>
        </section>
        <section>
            <h2>Odpowiedź</h2>
            <p>Jeśli chcesz, abym się z Tobą skontaktował to podaj swój mail w treści wiadomości. W ciągu tygodnia powinienem odczytać wiadomość, w innym przypadku do 2 tygodni. Jeśli wciąż nie było żadnej reakcji z mojej strony to istnieje możliwość, że albo nastąpiła jakaś awaria przy przesyłaniu formularza, albo zwyczajnie przypadkowo ją pominąłem. Nie wahaj się więc wysłać wiadomości ponownie, ale proszę Cię o nie robienie spamu. <span class="expressText">Wysyłanie spamu grozi blokadą możliwości wysyłania formularzy dla danego IP.</span></p>
        </section>
    </main>
    <?php require_once 'include/footer.php' ?>
</body>
</html>