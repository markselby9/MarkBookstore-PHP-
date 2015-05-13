<!--var_dump($user);-->
<h3> All books in the store: </h3>
<div class="book_store_div row">
    <?php
    //    print_r($this->session->all_userdata());
    //    var_dump($user);
    //    var_dump($book_list);
    foreach ($book_list as $book_item):?>
        <div class="book_item_div col-md-2">
            <div class="book_item_detail_div">
                <img src="../assets/resources/book.png" class="img-responsive .center-block img-rounded" alt="book">

                <h3><?php echo $book_item->getBookname();?><br>
                    <small><?php echo $book_item->getAuthor();?></small>
                </h3>
                <p class="text-right price">
                    <small><del>$<?php echo $book_item->getPrice()?></del></small>
                    $<?php echo $book_item->getPrice() * $book_item->getDiscount(); ?>
                </p>
            </div>
            <div class="book_item_function_div">
                <?php
                if ($book_item->getStatus()==1){
                ?>
                    <a class="btn btn-disabled" href="#">borrowed by </a>
                <?php }
                else{?>
                    <a class="btn btn-info" href="<?php echo site_url("book/borrow/" . $book_item->getId());?>">borrow</a>

                <?php }
                ?>

<!--                <a class="btn btn-info" href="--><?php //echo site_url("book/buy/" . $book_item->getId());?><!--">buy</a>-->
            </div>
        </div>
    <?php endforeach; ?>
</div>