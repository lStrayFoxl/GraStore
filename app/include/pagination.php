<?php if ($total_pages > 1) : ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-5">
            <li class="page-item"><a class="page-link pagin-item" href="?page=1&term=<?= $term; ?>">First</a></li>

            <?php if ($page > 2) : ?>
                <li class="page-item"><a class="page-link pagin-item" href="?page=<?= $page - 2 ?>&term=<?= $term; ?>"><?= $page - 2 ?></a></li>
            <?php endif; ?>

            <?php if ($page > 1) : ?>
                <li class="page-item"><a class="page-link pagin-item" href="?page=<?= $page - 1 ?>&term=<?= $term; ?>"><?= $page - 1 ?></a></li>
            <?php endif; ?>

            <li class="page-item"><a class="page-link pagin-item" href="?page=<?= $page ?>&term=<?= $term; ?>"><?= $page ?></a></li>

            <?php if ($page < $total_pages) : ?>
                <li class="page-item"><a class="page-link 
                 pagin-item" href="?page=<?= $page +  1 ?>&term=<?= $term; ?>"><?= $page +  1 ?></a></li>
            <?php endif; ?>

            <?php if ($page < ($total_pages - 1)) : ?>
                <li class="page-item"><a class="page-link pagin-item" href="?page=<?= $page +  2 ?>&term=<?= $term; ?>"><?= $page +  2 ?></a></li>
            <?php endif; ?>

            <li class="page-item"><a class="page-link pagin-item" href="?page=<?= $total_pages; ?>&term=<?= $term; ?>">Last</a></li>
        </ul>
    </nav>
<?php endif; ?>