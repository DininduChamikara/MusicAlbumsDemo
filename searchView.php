<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <script>
        function showResult(str) {

            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("livesearch").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "livesearch.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>

    <div class="container">
        <h1 class="page-header text-center">Most Popular Music Albums</h1>
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <a href="./index.php" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-backward"></span> Back</a>
            </div>

            <div class="col-sm-4 col-sm-offset-6">

                <div class="row form-group">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <label for="exampleDataList" class="form-label">Search Albums by Title</label>
                        <input type="text" class="form-control" name="#" placeholder="Type to search..." onkeyup="showResult(this.value)">
                    </div>
                </div>

            </div>


            <div class="col-sm-8 col-sm-offset-2">
                <table id="livesearch" class="table table-bordered table-striped" style="margin-top:20px;">

                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
                <img src="./src/music.jpg" alt="" width="100%">
            </div>


        </div>
    </div>
</body>

</html>