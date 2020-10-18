<?php

declare(strict_types=1);

require_once './Picture.php';
require_once './PictureStorage.php';

$pictures = new PictureStorage();

$array = $pictures->getAllPics();

$picture = $array[0];

if(isset($_POST['result'])) {
    $pictures->changeLikes($_POST['result'], $_POST['picture']);
    Header('Location: ' . $_SERVER['PHP_SELF']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Likes</title>
</head>
<style>
    body {
        background-color: lightcyan;
    }

    h1 {
        color: black;
        text-align: center
    }

    .container {
        width: 200px;
        position: absolute;
        left: 50%;
        margin-left: -200px; /* Half of width */
        padding-top: 10px;
        padding-bottom: 10px;
        display: table;
        overflow: hidden;
    }
</style>
<body>
<div class="container">
    <h1>
        Likes
    </h1>
    <table>
        <?php foreach ($array as $picture): ?>
            <tr>
                <td><img src="<?php echo 'Images//' . $picture->getName() . '.jpg' ?>" alt="" height="200"
                         width="300"</td>
            </tr>
            <tr>
                <td>Likes: <b><?php echo $picture->getLikes() ?></b></td>
            </tr>
            <tr>
                <td>
                   <table width="100%">
                       <tr>
                       <td align="left">
                    <form action="/" method="post">
                        <div class="image">
                            <input type="hidden" name="picture" value="<?php echo $picture->getName()?>">
                            <input type="hidden" name="result" value="1">
                            <input type="image" class="image" src="./like.jpg" alt="" height="100" width="100">
                        </div>
                    </form>
                       </td>
                           <td align="right">
                    <form action="/" method="post">
                        <div class="image">
                            <input type="hidden" name="picture" value="<?php echo $picture->getName()?>">
                            <input type="hidden" name="result" value="-1">
                            <input type="image" class="image" src="./dislike.png" alt="" height="100" width="100">
                        </div>
                    </form>
                           </td>
                       </tr>
                   </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <hr>
    <br>
</div>
</body>
</html>

