<?php session_start();
include_once('./config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled serijskih brojeva</title>


    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <!--CSS-->
    <link href="./styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./spinner.css">

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>

    <!--DataTable-->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="logo" src="http://hs-info/hsapp/template/hsit2021/img/HS-logo3.png">
    </nav>

    <div class="container table-box">
        <!-- create search box and selector -->
        <div class="container">
            <form action="" id="searchForm" class="form-box">
                <div class="row">
                    <div class="col-4">
                        <input type="text" class="form-control" id="searchBox" name="searchBox" placeholder="Search...">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary btn-md" name="search-button" id="search-button" type="button">Pretrazi</button>
                    </div>
                    <div class="col-2">
                        <button id="reset" class="btn btn-outline-warning btn-md">Ocisti</button>
                    </div>
                </div>
            </form>


            <div class="container-fluid mt-5 table-show" id="dataTable-load">
                Unesi Šifru
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // Add click event listener to search button
        $("#search-button").click(function() {
            // Show spinner while loading data
            $('#dataTable-load').html('<div class="loader" role="status"><span class="visually-hidden">Loading...</span></div>');

            // Make an AJAX request to filter.php and send search form data
            $.ajax({
                type: "POST",
                url: "filter.php",
                data: $("#searchForm").serializeArray(),
                success: function(response) {
                    // Hide spinner and show data table
                    $('#dataTable-load').html(response);
                },
                error: function(xhr, status, error) {
                    // Hide spinner and show error message
                    $('#dataTable-load').html('<div class="alert alert-danger" role="alert">An error occurred while loading data.</div>');
                }
            });
        });
    });

    // Add click event listener to reset button
    $("#reset").click(function() {
        // Reset search form and show all data
        $("#searchBox").val("");
    });
</script>