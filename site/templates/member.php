<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title() ?></title>
  <?= css([
    'assets/css/foundation.min.css',
    'assets/css/member.css',
    "https://unpkg.com/swiper/swiper-bundle.min.css"
  ]) ?>

  <?= js('https://kit.fontawesome.com/d9b1babad2.js', ['crossorigin' => 'anonymous']) ?>
  <?= js("https://unpkg.com/swiper/swiper-bundle.min.js") ?>

  <?php
  $dir    = 'assets/images/backgrounds';
  $files = scandir($dir, 1);
  ?>
  <script type="text/javascript">
    window.onload = function() {
      bodyBackgroundSelection(<?php echo json_encode($files) ?>);
    }
  </script>

</head>

<body>

  <div id="navbar">
    <div class="title-bar">
      <?php $homePage = $site->children()->listed()->nth(0);
      $members = "#members";
      ?>
      <a href="<?= html($homePage->url()) . $members ?>">
        <i class="fas fa-arrow-left"></i>
        <div class="title-bar-title">Back to Family Members</div>
      </a>
    </div>
  </div>

  <div class="member-container">
    <div class="cell large-12 member-header ">
      <?php foreach ($page->primaryphoto()->toFiles() as $image) : ?>
        <img src="<?= $image->url() ?>" alt="">
      <?php endforeach ?>
      <h2><?= $page->title() ?></h2>
    </div>
    <div class="grid-x member-information">
      <div class="cell large-6 medium-12 ">
        <i class="far fa-calendar-check"></i>
        <h3>Date of Birth</h3>
        <ul>
          <?php if ($page->Born()->isNotEmpty()) : ?>
            <li><?= $page->Born() ?></li>
          <?php endif ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-calendar-check"></i>
        <h3>Date of Death</h3>
        <ul>
          <?php if ($page->Died()->isNotEmpty()) : ?>
            <li><?= $page->Died() ?></li>
          <?php endif ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="far fa-map"></i>
        <h3>Place of Birth</h3>
        <ul>
          <?php if ($page->birthplace()->isNotEmpty()) : ?>
            <li><?= $page->birthplace() ?></li>
          <?php endif ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-users"></i>
        <h3>Parents</h3>
        <ul>
          <?php foreach ($page->parentstructure()->toStructure() as $parents) : ?>
            <li><?= $parents->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-heart"></i>
        <h3>Marital Status</h3>
        <ul>
          <?php if ($page->maritalstatus()->isEmpty()) : ?>
            <? elseif($page->maritalstatus()=='married'): ?>
            <li>Married</li>
            <? else: ?>
            <li>Not married or N/A</li>
          <?php endif ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-pen-fancy"></i>
        <h3>Spouse</h3>
        <ul>
          <?php if ($page->spouse()->isNotEmpty()) : ?>
            <li><?= $page->spouse() ?></li>
          <?php endif ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-child"></i>
        <h3>Children</h3>
        <ul>
          <?php foreach ($page->childrenstructure()->toStructure() as $child) : ?>
            <li><?= $child->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-user-friends"></i>
        <h3>Grandchildren</h3>
        <ul>
          <?php foreach ($page->grandchildrenstructure()->toStructure() as $grandchild) : ?>
            <li><?= $grandchild->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-user-graduate"></i>
        <h3>Accomplishments</h3>
        <ul>
          <?php foreach ($page->accomplishments()->toStructure() as $accomplishment) : ?>
            <li><?= $accomplishment->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="cell large-6 medium-12 ">
        <i class="fas fa-people-carry"></i>
        <h3>Occupations</h3>
        <ul>
          <?php foreach ($page->occupations()->toStructure() as $occupation) : ?>
            <li><?= $occupation->name() ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>

    <div class="cell large-12 member-media ">
      <i class="fas fa-play fa-4x"></i>
      <h3>Media & Pictures</h3>
      <!-- Slider main container -->
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php foreach ($page->media()->toFiles() as $mediaPicture) : ?>
            <div class="swiper-slide"><img src="<?= $mediaPicture->url() ?>" alt=""></div>
          <?php endforeach ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>

  </div>

  <?= js([
    "assets/js/vendor/jquery.js",
    "assets/js/vendor/what-input.js",
    "assets/js/vendor/foundation.js",
    "assets/js/member.js",
  ]) ?>

</body>

</html>