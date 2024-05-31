<?php
    include 'views/partials/head.php';
    $fields = !empty($form['fields']) ? unserialize($form['fields']) : "";
?>
<div class="container">
    <div class="form-holder">
        <form id="dynamic-form">
            <h1><?php echo $form['form_name'] ?? "Unknown Form" ?></h1>
            <?php
                if(!empty($fields)){
                    foreach ($fields as $field){
                        if(file_exists("views/form/".$field['type'].".php")){
                            include "views/form/".$field['type'].".php";
                        }
                    }
                }
            ?>
            <div class="form-group">
                <label for="captcha">What is 4 + 3?</label>
                <input type="text" class="form-control" data-id="captcha" name="captcha">
                <span class="error-message"></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="form_id" id="form_id" value="<?php echo $form['id']; ?>">
                <a href="#" class="btn btn-primary" id="submit-dynamic-form">Submit</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var validationRules = '<?php echo !empty($form['validation_rules']) ? json_encode(unserialize($form['validation_rules'])) : ""; ?>'
</script>
<?php
    include 'views/partials/footer.php';
?>
