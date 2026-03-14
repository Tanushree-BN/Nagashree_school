<?php
/**
 * Shared site header.
 *
 * Usage:
 *   <?php $activePage = 'home'; include __DIR__ . '/includes/header.php'; ?>
 */
if (!isset($activePage)) {
    $activePage = '';
}

$nav = [
    'home' => ['label' => 'Home', 'href' => 'index.php'],
    'about' => ['label' => 'About', 'href' => 'about.php'],
    'gallery' => ['label' => 'Gallery', 'href' => 'gallery.php'],
    'faculties' => ['label' => 'Faculties', 'href' => 'faculties.php'],
    'facilities' => ['label' => 'Facilities', 'href' => 'facilities.php'],
    'contact' => ['label' => 'Contact', 'href' => 'contact.php'],
];

function navItemClass(string $activePage, string $key): string
{
    return $activePage === $key ? 'nav-item active' : 'nav-item';
}
?>

<!-- Header Section -->
<div class="bg-top navbar-light">
  <div class="container">
    <div class="row no-gutters d-flex align-items-center align-items-stretch">
      <div class="col-md-4 d-flex align-items-center py-4">
        <img src="images/nag-logo.png" alt="Nagashree English School logo" class="img-fluid" style="width: 80px; ">
        <a class="navbar-brand" href="index.php" style="font-size:18px;">Nagashree English School</a>
      </div>
      <div class="col-lg-8 d-block">
        <div class="row d-flex" style="margin-left: 80px;">
          <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
            <div class="text">
              <span>Email</span>
              <span>nagashreeschoolcrp@gmail.com</span>
            </div>
          </div>
          <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
            <div class="text">
              <span>Call</span>
              <span style="width: 250px;">Office: +91-9742278222 <br> Principal: +91-9241776070<br> Admin: +91-9901181966</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container d-flex align-items-center px-4">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav mr-auto">
        <?php foreach ($nav as $key => $item): ?>
          <li class="<?php echo navItemClass($activePage, $key); ?>">
            <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>" class="nav-link<?php echo $key === 'home' ? ' pl-0' : ''; ?>">
              <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>

