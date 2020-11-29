<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Portfolio Demo</title>
    <?= css('assets/css/foundation.css') ?>
    <?= css('assets/css/app.css') ?>
    <?= js('https://kit.fontawesome.com/d9b1babad2.js', ['crossorigin' => 'anonymous']) ?>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div id="navbar" data-sticky-container data-magellan>
        <div class="sticky" data-sticky data-options="marginTop:0;">

            <div class="title-bar" data-responsive-toggle="vertical-response" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle="vertical-response"></button>
                <div class="title-bar-title">Menu</div>
            </div>

            <div class="top-bar" id="vertical-response">
                <ul class="menu menu-hover-lines align-left medium-horizontal dropdown" data-responsive-menu="accordion medium-dropdown">
                    <li><a href="#hero-section">Home</a></li>
                    <li><a href="#history">History</a></li>
                    <li><a href="#members">Members</a></li>
                    <li><a href="#contact">Contact</a></li>
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

    <div class="grid-x">
        <div class="hero-full-screen" id="hero-section" data-magellan-target="hero-section">
        </div>
        <section class="cell family-history" id="history" data-magellan-target="history">
            <div class="family-history-content">
                <?php $familyHistory = $page->familyhistory()->toStructure(); ?>
                <?php foreach ($familyHistory as $content) : ?>
                    <h2><?= $content->section()->html()?></h2>
                    <p><?= $content->description()->html()?></p>
                <?php endforeach ?>
            </div>
        </section>

        <section class="family-members cell large-12" id="members">
            <div class="family-members-content">
                <h2>Family Members</h2>
                <div class="names-list grid-x grid-margin-x">
                    <?php
                    $arr = $site->find('family-members')->children()->sortBy('title');
                    $midpoint = ceil(count($arr) / 2);
                    ?>
                    <ul class="large-5 large-offset-1 medium-6 small-12" id="members-1">
                        <?php for ($i = 0; $i < $midpoint; $i++) : ?>
                            <li>
                                <a href="<?= $arr->nth($i)->url() ?>">
                                    <?= html($arr->nth($i)->title()) ?>
                                </a>
                            </li>
                        <?php endfor ?>
                    </ul>

                    <ul class="large-5 large-offset-1 medium-6 small-12" id="members-2">
                        <?php for ($j = $midpoint; $j < count($arr); $j++) : ?>
                            <li>
                                <a href="<?= $arr->nth($j)->url() ?>">
                                    <?= html($arr->nth($j)->title()) ?>
                                </a>
                            </li>
                        <?php endfor ?>
                    </ul>

                </div>
            </div>
        </section>

        <section class="contact-form-container cell large-12">
            <form class="contact-form" id="contact" method="POST" action="formHandle.php" data-ajax="false" data-abide novalidate>
                <div class="grid-container">
                    <div class="contact-form-header">
                        <h3 class="align-center-middle">Get In Touch</h3>
                    </div>
                    <div class="grid-x form-fields">
                        <div class="medium cell">
                            <input type="text" id="name" name="name" placeholder="Full name" required>
                            <span class="form-error">Please enter a name!</span>
                        </div>
                        <div class="medium cell">
                            <input type="text" id="subject" name="subject" placeholder="Subject" required>
                            <span class="form-error">Please enter a subject</span>
                        </div>
                        <div class="medium cell">
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <span class="form-error">Please enter a valid email!</span>
                        </div>
                        <div class="medium cell">
                            <textarea id="message" name="message" rows="5" placeholder="Message/Comments" required></textarea>
                            <span class="form-error">Please enter a message!</span>
                        </div>
                        <div class="medium cell">
                            <button class="button expanded" id="contact_send" type="submit" name="Send" disabled>Send!</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <div class="footer cell large-12" data-magellan>
            <div class="grid-x">
                <a href="#hero-section" class="medium cell back-to-top">
                    <i class="fas fa-chevron-up"></i>
                    <p>Back to top</p>
                </a>
            </div>
        </div>
    </div>

    <?= js([
        'assets/js/vendor/jquery.js',
        'assets/js/vendor/what-input.js',
        'assets/js/vendor/foundation.js',
        'assets/js/app.js'
    ]) ?>

</body>

</html>