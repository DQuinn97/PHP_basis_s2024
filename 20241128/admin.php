<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('funcs.inc.php');
require('db.inc.php');
requiredLoggedIn();

// print '<pre>';
// print_r(getArticles());
// print '</pre>';


$articles = getArticles();


require('head.inc.php'); ?>



<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Admin page</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Articles</h4>

                            </div>

                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table lms_table_active3 dataTable no-footer dtr-inline" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info" style="width: 746px;">
                                        <thead>
                                            <tr role="row">
                                                <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 64px;" aria-sort="ascending" aria-label="id: activate to sort column descending">ID</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 102px;" aria-label="Title: activate to sort column ascending">Title</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 94px;" aria-label="Publication date: activate to sort column ascending">Publication date</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 57px;" aria-label="User: activate to sort column ascending">User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($articles as $index => $article): ?>
                                                <tr role="row" class="<?= $index % 2 == 0 ? 'even' : 'odd'; ?>">
                                                    <th scope="row" tabindex="0" class="sorting_1"><?= $article['id'] ?></th>
                                                    <td><?= substr($article['title'], 0, 100) . (strlen($article['title']) > 100 ? '...' : ''); ?></td>
                                                    <td><?= $article['status'] ? 'Published' : 'Unpublished'; ?></td>
                                                    <td><?= date_format(date_create($article['publication_date']), "d M Y"); ?></td>
                                                    <td><?= $article['name']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php require('footer.inc.php'); ?>