<?php
require_once('./kozos.php');
?>

<div class="mt-5">
    <h1 class="text-center">Képeink</h1>

    <?php
        // a képek könyvtára
        $utvonal = '../images';

        // eltávolítjuk a "." és a ".." sorokat
        $files = array_diff(scandir($utvonal), array('.', '..'));
    ?>

    <?php if ( bejelentkezve() ) : ?>
        <div class="my-3">
            <form action="kepfeltolt.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 col-4">
                    <label for="formFile" class="form-label">Tölts fel képet!</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
                <div class="mb-3 col-4">
                    <button type="submit" class="btn btn-primary">Feltöltés indítása</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
    
    <div class="row d-flex justify-content-center">
        <?php foreach ($files as $file) : ?>
            <div class="p-2 col-md-3 d-flex align-items-center justify-content-center">
                <img class="img-thumbnail" src="<?php echo $utvonal . '/' . $file; ?>" alt="kép helye">
            </div>
        <?php endforeach; ?>
    </div>
</div>
