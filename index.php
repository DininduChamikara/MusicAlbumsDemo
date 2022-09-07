<?php
include 'config.php';
include 'updateMongoDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">Most Popular Music Albums</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
                <?php
                session_start();
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php

                    unset($_SESSION['message']);
                }
                ?>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <th>Album No</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Country</th>
                        <th>Company</th>
                        <th>Price</th>
                        <th>Year</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        //load xml file
                        $file = simplexml_load_file('files/albums.xml');

                        foreach ($file->CD as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->ID; ?></td>
                                <td><?php echo $row->TITLE; ?></td>
                                <td><?php echo $row->ARTIST; ?></td>
                                <td><?php echo $row->COUNTRY; ?></td>
                                <td><?php echo $row->COMPANY; ?></td>
                                <td><?php echo $row->PRICE; ?></td>
                                <td><?php echo $row->YEAR; ?></td>
                                <td>
                                    <a href="#edit_<?php echo $row->ID; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                    <a href="#delete_<?php echo $row->ID; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                                <?php include('edit_delete_modal.php'); ?>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include('add_modal.php'); ?>
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>