<footer>© Created by Rizky saria</footer>


</body>

<script src="<?= BASEURL ?>/js/script.js"></script>
<?php if (isset($data["logic"])) : ?>
    <script src="<?= BASEURL ?>/js/<?= $data["logic"] ?>.js"></script>
<?php endif; ?>

</html>