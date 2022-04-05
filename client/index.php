<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <title>Nody</title>
    <!--Include boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<!--Input like tweeter-->
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nody</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="input">Input</label>
                                <input type="text" class="form-control" id="input" name="input">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Table of all tweets-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tweets</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Like</th>
                                    <th>Dislike</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

<script>

    // Insert new nody
    $('form').submit(function(e) {
        e.preventDefault();
        var input = $('#input').val();
        $.ajax({
            type: "POST",
            url: "http://localhost:3000/api/nody/insert?text=" + input,
            success: function(data) {
                location.reload();
            }
        });
    });

    // Get all nody = text, like, dislike
    $.ajax({
        type: "GET",
        url: "http://localhost:3000/api/nody/list",
        success: function(data) {
            var nody = data;
            for (var i = 0; i < nody.length; i++) {
                var text = nody[i].text;
                var like = nody[i].nody_like;
                var dislike = nody[i].nody_dislike;
                var id = nody[i].id;
                var html = '<tr><td>' + id + '</td><td>' + text + '</td><td>' + like + ' <button>Like</button></td><td>' + dislike + ' <button>Dislike</button></td></tr>';
                $('table tbody').append(html);
            }
        }
    });

    //Like nody
    $('table tbody').on('click', 'tr td:nth-child(3) button', function() {
        var id = $(this).parent().parent().children().first().text();
        $.ajax({
            type: "POST",
            url: "http://localhost:3000/api/nody/like?id=" + id,
            success: function(data) {
                location.reload();
            }
        });
    });
    //Dislike nody
    $('table tbody').on('click', 'tr td:nth-child(4) button', function() {
        var id = $(this).parent().parent().children().first().text();
        $.ajax({
            type: "POST",
            url: "http://localhost:3000/api/nody/dislike?id=" + id,
            success: function(data) {
                location.reload();
            }
        });
    });
</script>