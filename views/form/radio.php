<div class="form-group">
    <?php
    if(!empty($field['options'])){
        foreach ($field['options'] as $option){
            ?>
            <div class="form-check">
                <input class="form-check-input" data-id="<?php echo $field['name']; ?>" type="radio" name="<?php echo $field['name']; ?>" id="<?php echo $option; ?>" value="<?php echo $option; ?>">
                <label class="form-check-label" for="<?php echo $option; ?>">
                    <?php echo $option; ?>
                </label>
            </div>
            <?php
        }
    }
    ?>
    <span class="error-message"></span>
</div>