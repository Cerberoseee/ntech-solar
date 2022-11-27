<?php
    /*Template name: Payment Confirm */
 ?>
<?= get_header() ?>
<?php $temp_uri = get_template_directory_uri(); ?>
<main class="payment-confirm">
  <section class="payment-confirm-section">
    <div class="container">
      <?= do_shortcode('[contact-form-7 id="574" title="Payment Confirmation"]')
      ?>

    </div>
  </section>
</main>
<?= get_footer() ?>
