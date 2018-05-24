<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="../comp/css/style.css">
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
    <?php require($_SERVER[DOCUMENT_ROOT].'/comp/libs/menu.php');?>
    <div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 style="font-family: 'Rubik', sans-serif;">Топ 100 пользователей</h1>
            <div class="table-responsive" style="background-color: white; box-shadow: 7px 7px 5px rgba(0,0,0,0.1);">
            <table class="table  table-hover">
                <thead>
                    <tr>
                        <th>
                            <h2>#</h2>
                        </th>
                        <th>
                            <h2>Пользователь</h2>
                        </th>
                        <th>
                            <h2>Рейтинг</h2>
                        </th>
                        <th>
                            <h2>Страна</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                        foreach (get_users_rating() as $key => $value) {
                            echo "<tr>";
                                echo "<td>";
                                    echo $key+1;
                                    switch ($key) {
                                        case '0':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/6/61/%D0%97%D0%BE%D0%BB%D0%BE%D1%82%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121116&path-prefix=ru' style='width: 20px; height: 20px;'' alt='gold'>";
                                            break;
                                        case '1':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/5/5e/%D0%A1%D0%B5%D1%80%D0%B5%D0%B1%D1%80%D1%8F%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121052&path-prefix=ru' style='width: 20px; height: 20px;'' alt='sliver'>";
                                            break;
                                        case '2':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/b/b6/%D0%91%D1%80%D0%BE%D0%BD%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121106&path-prefix=ru' style='width: 20px; height: 20px;'' alt='bronze'>";
                                            break;
                                    }
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[avatar]);
                                    print_r($value[userName]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[userRating]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[country]);
                                echo "</td>";
                                // echo "<td>";
                                //     echo "<form action='' method='get'>
                                //             <input type='text' name='solutionID' hidden='true' value='$value[solutionID]'>
                                //             <button type='submit' class='btn btn-success'>Подробнее</button>
                                //             <!--<div onclick='get_solution($value[solutionID])' class='btn btn-success'>Подробнее</div>-->
                                //           </form>";
                                // echo "</td>";
                            echo "</tr>";
                        };
                        if (isset($_GET['solutionID'])) {
                            echo "<script>showmodal();</script>";
                        } else {
                            //
                        };?>                   
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
  </body>
  <?php require($_SERVER[DOCUMENT_ROOT].'/comp/libs/footer.php');?>
</html>