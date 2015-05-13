<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>书</th>
            <th>借阅时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        function getRelationDatetime($relation_list, $book_id){
            foreach ($relation_list as $relation){
                if ($relation->book_id == $book_id){
                    return $relation->datetime;
                }
            }
        }

        $index = 1;
        foreach ($book_list as $book) {
            ?>
            <tr>
                <th scope="row"><?php echo $index?></th>
                <td><?php echo $book->getBookname()?></td>
                <td><?php echo getRelationDatetime($relation_list, $book->getId())?></td>
                <td><a class="btn btn-primary" href="<?php echo site_url('book/returnBook/'. $book->getId());?>">归还</a></td>
            </tr>
            <?php
            $index++;
        }
        ?>
        </tbody>
    </table>
</div>

