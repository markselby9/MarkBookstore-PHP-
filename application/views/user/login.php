<?php echo validation_errors();
    echo form_open('users/login');?>
<label>username:</label>
<input type="text" name="username" /><br>
<label>password:</label>
<input type="password" name="password" /><br>
<input type="submit" name="submit" value="login" />

</form>