<div class="form-group">
    <select name="<?php echo $field['name']; ?>" data-id="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" class="form-control">
        <option value="">Select one</option>
        <?php
            if(!empty($field['options'])){
                foreach ($field['options'] as $option){
                    ?>
                        <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                    <?php
                }
            }
        ?>
    </select>
    <span class="error-message"></span>
</div>