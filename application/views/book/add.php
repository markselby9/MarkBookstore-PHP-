<?php echo validation_errors();
echo form_open('book/add', 'class="addBookForm"');?>
<label>book name:</label>
<input type="text" name="bookname" /><br>
<label>author:</label>
<input type="text" name="author" /><br>
<label>price:</label>
<input type="number" step="0.01" min="0" name="price" /><br>
<label>discount:(0 to 1)</label>
<input type="number" step="0.1" min="0" max="1" name="discount" /><br>
<input type="submit" name="submit" value="Add book" />
</form>