<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <?= css('assets/css/foundation.css' , ['filetime' => 'assets/css/foundation.css']) ?>
    <link rel="stylesheet" type="text/css" href="assets/css/app.css?<?=filemtime('assets/css/app.css');?>">
    <?= js('https://kit.fontawesome.com/d9b1babad2.js', ['crossorigin' => 'anonymous']) ?>
</head>

<body>
    <div id="navbar" data-sticky-container data-magellan>
        <div class="sticky" data-sticky data-options="marginTop:0;">

            <div class="title-bar" data-responsive-toggle="vertical-response" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle="vertical-response"></button>
                <div class="title-bar-title">Menu</div>
            </div>

            <div class="top-bar" id="vertical-response">
                <ul class="menu menu-hover-lines align-left medium-horizontal dropdown" data-responsive-menu="accordion medium-dropdown">
                    <?php $homePage = $site->children()->listed()->nth(0);
                    $history = "#history";
                    $members = "#members";
                    $contact = "#contact";
                    ?>
                    <li><a href="<?= html($homePage->url()) ?>">Home</a></li>
                    <li><a href="<?= html($homePage->url()) . $history ?>">History</a></li>
                    <li><a href="<?= html($homePage->url()) . $members ?>">Members</a></li>
                    <li><a href="<?= html($homePage->url()) . $contact ?>">Contact</a></li>
                    <?php
                    $listedPages = $site->children()->listed();
                    for ($i = 2; $i < count($listedPages); $i++) : ?>
                        <li>
                            <a<?php e($listedPages->nth($i)->isOpen(), ' class="active"') ?> href="<?= $listedPages->nth($i)->url() ?>"><?= html($listedPages->nth($i)->title()) ?></a>
                        </li>
                    <?php endfor ?>
                </ul>
            </div>
        </div>
    </div>
    <section class="recipes">
        <?php if (empty($recipeList)) : ?>
            <h3 class="empty-recipe">Nothing here yet, Don't worry we're working on it!</h3>
        <?php endif ?>
        <?php $recipeList = $page->recipes()->toStructure(); ?>
        <?php foreach ($recipeList as $recipe) : ?>
            <div class="recipe-container grid-x grid-margin-x">
                <div class="recipe-information large-7">
                    <h2><a class="recipe-title" href="<?= $recipe->File()->toFiles() ?>"><?= $recipe->Name()->html() ?></a></h2>
                    <p class="recipe-description"><?= $recipe->Description()->html() ?></p>



                </div>
                <!-- Use this section to include images in the if requested 
                <div class="recpipe-pictures large-auto">
            </div> -->
            </div>
        <?php endforeach ?>
    </section>

    <?= js([
        'assets/js/vendor/jquery.js',
        'assets/js/vendor/what-input.js',
        'assets/js/vendor/foundation.js',
        'assets/js/app.js'
    ]) ?>
</body>

</body>

</html>