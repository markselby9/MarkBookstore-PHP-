<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/29
 * Time: 下午3:53
 */
$attributes=array(
    'class'=>'registerForm','id'=>'registerForm'
);
echo form_open('users/register', $attributes);
echo form_label('username');
echo form_input('username');
echo "<br>";
echo form_label('password');
echo form_password('password');
echo "<br>";
echo form_submit(array(
    'name' => 'button',
    'value' => 'Register'
));
echo "<br>";
?>
</form>