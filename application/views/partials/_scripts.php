<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS Bundle (dengan Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom Script (jika perlu) -->
<?php if (file_exists(FCPATH . 'js/admin.min.js')) : ?>
<script src="<?= base_url('js/admin.min.js') ?>"></script>
<?php endif; ?>
