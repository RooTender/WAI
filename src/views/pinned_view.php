<!DOCTYPE html>
<html lang="pl-PL">
<?php require_once 'include/head.php'; ?>

<body>
    <?php require_once 'include/navigation.php'; ?>

    <header>
        <h1>Zapamiętane zdjęcia<br/></h1>
    </header>

    <hr/>

    <main>
    <form action="forget" method="POST">
            <button class="btn reset stretch-w">Zapomnij zdjęcia</button>

            <div class="gallery">
                <?php if(isset($images)) foreach($images as $img): ?>
                    <?php foreach($img as $image): ?>
                        <?php if(!($image == '..' || $image == '.' || $image == 'thumbnails')): ?>
                            <div class="image">
                                <a href="<?php echo $image->{'img'} ?>" target="_blank">
                                    <img src="<?php echo $image->{'thumbnail'}?>" alt="image">
                                </a>
                                <div class="desc">
                                    <p><?php if(isset($image->{'title'})) echo "Tytuł: ".$image->{'title'}?></p>
                                    <p><?php if(isset($image->{'author'})) echo "Autor: ".$image->{'author'}?></p>
                                    <p>
                                        <input type="checkbox" name="forget[]" value="<?php echo $image->{'_id'}; ?>">
                                        <label for="forget[]">Zapomnij</label>
                                    </p>
                                </div>  
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            
        </form>
    </main>

    <?php require_once 'include/footer.php' ?>
</body>
</html>