<?php
    include 'views/partials/head.php';

?>

<div class="container">
    <h1>Forms Listing</h1>
    <ul>
        <?php
            if(!empty($forms)):
                foreach ($forms as $form):
        ?>
                    <li>
                        <a href="<?php echo getBaseUrl(); ?>/load-form/?form_id=<?php echo $form['id']; ?>"><?php echo $form['form_name']; ?></a>
                    </li>
        <?php
                endforeach;
            endif;
        ?>
    </ul>
</div>

<?php
    include 'views/partials/footer.php';
?>
