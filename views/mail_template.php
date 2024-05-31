<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Rich Dynamic Form</title>
</head>
<body>
<div class="holder">
    <h1 style="text-align: center;">Dynamic Form Creation</h1>
    <p style="text-align: center;">New lead has been found</p>
    <?php
     if(!empty($fields)){
         foreach ($fields as $field){
             ?>
             <div>
                 <span style="font-weight: bold;"><?php echo ucwords(str_replace('_', ' ', $field))?></span>
                 <span><?php echo isset($data[$field]) ? $data[$field] : "" ?></span>
             </div>
             <?php
         }
     }
    ?>
</div>
</body>
</html>
