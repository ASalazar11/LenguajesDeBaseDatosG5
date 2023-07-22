<div class="card" style="min-width: 300px;">
    <div class="card-body">
        <h3 style="text-align: left;">Categorias</h3>
        <br>
        <div class='card' style="background-color: #42465A;min-width: 260px;align-items: center;">
            <div class="card-body" style="background-color: #42465A;min-width: 260px;">

                <article class='card-group-item' style='background-color: #42465A;'>

                    <div class='filter-content' style='background-color: #42465A;'>
                        <div class='list-group list-group-flush' style='background-color: #42465A;'>

                            <?php
                            require_once 'DAL/categories.php';
                            $categories = getAllCategories();
                            if (count($categories) > 0) {
                                foreach ($categories as $row) {
                                    echo "<a id='categories_links'
                                        style='background-color: #42465A' href='http://localhost/whycux/products.php?category_id={$row['CATEGORY_ID']}' class='list-group-item'
                                        data-category-id='{$row['CATEGORY_ID']}'
                                        >{$row['NAME']} </a>";
                                }
                                echo "<a id='categories_links'
                                    style='background-color: #42465A' href='http://localhost/whycux/products.php' class='list-group-item'
                                    data-category-id='0'
                                    >Todas las categorias </a>";
                            } else {
                                echo "<h3>No hay categorias</h3>";
                            }
                            

                            ?>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<script type="module" src="components/categories/categories.js"></script>