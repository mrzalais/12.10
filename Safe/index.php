<?php

declare(strict_types=1);

require_once 'Safe.php';

$safe = new Safe;

$safe->updateEnteredCode();

$length = strlen($_SESSION['digit']);

$safe->getStatus();

$safe->resetSafe();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Safe pin</title>
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
        width: 540px;
        position: absolute;
        left: 50%;
        margin-left: -270px; /* Half of width */
        padding-top: 10px;
        padding-bottom: 10px;
        display: table;
        overflow: hidden;
    }

    .button {
        float: left;
        width: 150px;
        height: 100px;
        background: white;
        padding: 10px;
        display: table-cell;
        text-align: center;
        margin: 40px;
    }

    .button {
        vertical-align: middle;
        height: 100px;
        width: 100px;
        line-height: 150px;
    }

</style>
<body>

<div class="container">
    <h1>
        <?php echo $title = $safe->getTitle();?>
    </h1>
    <h1>
        <?php echo $hiddenCode = $safe->updateHidden();?>
    </h1>

    <form method="post" action="/">
        <input type="hidden" name="result" value="1">
        <input type="Submit" class="button" value="1">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="2">
        <input class="button" type="Submit" value="2">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="3">
        <input class="button" type="Submit" value="3">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="4">
        <input class="button" type="Submit" value="4">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="5">
        <input class="button" type="Submit" value="5">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="6">
        <input class="button" type="Submit" value="6">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="7">
        <input class="button" type="Submit" value="7">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="8">
        <input class="button" type="Submit" value="8">
    </form>
    <form method="post" action="/">
        <input type="hidden" name="result" value="9">
        <input class="button" type="Submit" value="9">
    </form>
</div>
<br>
</body>
</html>
