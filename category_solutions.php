<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Старт</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <?php
        include('libs/bibl.php');
        include('libs/const.php');
    ?>
    <div class="row text-center">
        <div class="col-md-12">
            <h1>Топ 100 пользователей</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h2>№</h2>
                        </th>
                        <th>
                            <h2>Категория</h2>
                        </th>
                        <th>
                            <h2>Описание</h2>
                        </th>
                        <th>
                            <h2>Перейти</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                        foreach (get_categories() as $key => $value) {
                            echo "<tr>";
                                echo "<td>";
                                    echo $key+1;
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[name]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[description]);
                                echo "</td>";
                                echo "<td>";
                                    echo "<form action='solutions.php' method='post'>
                                            <input type='text' name='solutionID' hidden='true' value='$value[solutionID]'>
                                            <button type='submit' class='btn btn-success'>Подробнее</button>
                                          </form>";
                                echo "</td>";
                            echo "</tr>";
                        };
                        if (isset($_GET['solutionID'])) {
                            echo "<script>showmodal();</script>";
                        } else {
                            //
                        };?>                   
                </tbody>
        </div>
    </div>
  </body>
</html>