<!DOCTYPE html>
<html lang="pl-PL">
<?php require_once 'include/head.php'; ?>

<body>
    <?php require_once 'include/navigation.php'; ?>

    <header>
        <h1>Masz coś czym chcesz się podzielić?<br/>
            Przysyłaj śmiało :D</h1>
    </header>

    <hr/>

    <main>
        <form action="uploadFile" method="POST" enctype="multipart/form-data">
            <div class="box">

                <h1>Formularz do przesyłania zdjęć</h1>     
            
                <?php if(isset($_SESSION['response'])): ?>
                    <?php if($_SESSION['response'] == ""): ?>
                        <p class="success">Plik został przesłany pomyślnie</p>;
                    <?php else: ?> 
                        <p class="fail"><?= $_SESSION['response'] ?></p>
                    <?php endif; ?>
                <?php endif; ?>

                <?php unset($_SESSION['response']); ?>

                <span class="expressText">Plik nie może przekraczać wielkości 1MB oraz musi być w formacie .jpg lub .png</span><br/><br/>
                
                <div class="input-styling">
                    <label for="watermark_text">Znak wodny:</label>
                    <input type="text" name="watermark_text"><br><br>
                    
                    <label for="title">Tytuł:</label>
                    <input type="text" name="title"><br><br>

                    <label for="author">Autor:</label>
                    <input type="text" name="author"><br><br>
                </div>

                <input type="file" name="fileToUpload"><br>
                <button type="submit" name="submit" class="btn submit">Prześlij</button><br/><br/>
            </div>
        </form>    
    </main>

    <?php require_once 'include/footer.php' ?>
</body>
</html>