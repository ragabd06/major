<?php
$page_title = 'Explore Majors';
$active = 'majors';
include 'php/header.php';

$colors = ['cs' => '#5b5bf0', 'it' => '#2f7bff', 'cy' => '#8b4be8', 'ce' => '#18a8f0'];
$majors = mm_rows('majors');
?>
<section class="page-head">
  <div class="container">
    <p class="eyebrow">Step 1 · Explore</p>
    <h1>Four majors. Four different worlds.</h1>
    <p class="muted">Pick one to see its fields, or jump straight into a mini experience.</p>
  </div>
</section>

<section class="section" id="majors">
  <div class="container grid-2">
    <?php foreach ($majors as $m):
        $fields = mm_rows('fields', ['major_id' => $m['id']]);
    ?>
    <article class="card major-card" style="--c:<?= $colors[$m['slug']] ?>">
      <div class="major-icon"><?= e($m['icon']) ?></div>
      <h3><?= e($m['name_en']) ?></h3>
      <div class="ar"><?= e($m['name_ar']) ?></div>
      <p><?= e($m['description']) ?></p>
      <div class="chips">
        <?php foreach ($fields as $f): ?><span class="chip"><?= e($f['name']) ?></span><?php endforeach; ?>
      </div>
      <div class="btn-row">
        <a class="btn btn-primary" href="major-details.php?major=<?= e($m['slug']) ?>">Explore this major</a>
        <a class="btn btn-soft" href="experience.php?major=<?= e($m['slug']) ?>">Try a mini experience</a>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
  <div class="container center" style="margin-top:30px">
    <p class="muted small">Field lists come from the project brief. Always check the official Qassim University study plan for what is really taught.</p>
  </div>
</section>
<?php include 'php/footer.php'; ?>
