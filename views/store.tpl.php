<?php
//echo "<h1 style=\"color:#FFF\">{$viewData}</h1>";
?>
<section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Come On In</span>
                <span class="section-heading-lower">We're Open</span>
              </h2>
              <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
              <?php 
              // exemple de ligne : 'Monday' => '7:00 AM to 8:00 PM'
              // $day = 'Monday'
              // $openingHours = '7:00 AM to 8:00 PM'
              foreach ($viewData as $day => $openingHours) : 
              ?>
              <li class="list-unstyled-item list-hours-item d-flex">
                  <?= $day ?>
                  <span class="ml-auto"><?= $openingHours ?></span>
                </li>
              <?php endforeach ?>
              </ul>
              <p class="address mb-5">
                <em>
                  <strong>1116 Orchard Street</strong>
                  <br>
                  Golden Valley, Minnesota
                </em>
              </p>
              <p class="mb-0">
                <small>
                  <em>Call Anytime</em>
                </small>
                <br>
                (317) 585-8468
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
