<!DOCTYPE html>
<html lang="pl-PL">
<?php require_once 'include/head.php'; ?>

<body>
    <?php require_once 'include/navigation.php'; ?>

    <header>
        <h1>Tutaj znajdziesz wszystkie udostępniane zdjęcia<br/>
            <i>Rozejrzyj się ;)</i></h1>
    </header>

    <hr/>

    <main>
        <form action="remember" method="POST">
            <button class="btn reset stretch-w">Zapamiętaj wybrane</button>
        
            <div class="gallery">
                <?php if(is_array($images)) foreach($images as $image): ?>
                    <?php if(!($image == '..' || $image == '.' || $image == 'thumbnails')): ?>
                        <div class="image">
                            <a href="<?php echo $image->{'img'} ?>" target="_blank">
                                <img src="<?php echo $image->{'thumbnail'}?>" alt="image">
                            </a>
                            <div class="desc">
                                <p><?php if(isset($image->{'title'})) echo "Tytuł: ".$image->{'title'}?></p>
                                <p><?php if(isset($image->{'author'})) echo "Autor: ".$image->{'author'}?></p>
                                <p>
                                    <input type="checkbox" name="remember[]" value="<?php echo $image->{'_id'}; ?>" 
                                        <?php if(isset($_SESSION['checked']) &&
                                                 in_array($image->{'_id'}, $_SESSION['checked']))
                                        echo "checked"; ?>>
                                    <label for="remember[]">Zapamiętaj</label>
                                </p>
                            </div>  
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </form>

        <ul class="paging">
            <?php for ($i = 0; $i < ceil($allImagesCount / $maxImgOnPage); $i++): ?>
                <li><a href="?page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
            <?php endfor; ?>
        </ul>
    </main>

    <?php require_once 'include/footer.php' ?>
</body>
</html>