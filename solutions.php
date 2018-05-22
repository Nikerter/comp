<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <script>function showmodal(){$(document).ready(function() {$('#exampleModal').modal('show');});}</script>
    <div class="row">
        <div class="col-md-12 text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h2>#</h2>
                        </th>
                        <th>
                            <h2>Категория</h2>
                        </th>
                        <th>
                            <h2>Упражнение</h2>
                        </th>
                        <th>
                            <h2>Решение</h2>
                        </th>
                        <th>
                            <h2>Рейтинг</h2>
                        </th>
                        <th>
                            <h2>Подробности</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                        foreach (get_user_solutions(USERID) as $key => $value) {
                            echo "<tr>";
                                echo "<td>";
                                    echo $key+1;
                                echo "</td>";
                                echo "<td>";
                                  print_r(get_category($value[categoryID])[name]);
                                echo "</td>";
                                echo "<td>";
                                  print_r(get_exercises($value[categoryID], $value[exerciseID])[text]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[text]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[solutionRating]);
                                echo "</td>";
                                echo "<td>";
                                    echo "<form action='' method='get'>
                                            <input type='text' name='solutionID' hidden='true' value='$value[solutionID]'>
                                            <button type='submit' class='btn btn-success'>Подробнее</button>
                                            <!--<div onclick='get_solution($value[solutionID])' class='btn btn-success'>Подробнее</div>-->
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
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><h3>Подробности решения</h3></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <h4>Имя пользователя:</h4>
             <p><?print_r(get_user_data(USERID)[userName]);?></p>
             <h4>Решение:</h4> 
             <p><?print_r(get_solution($_GET['solutionID'])[text]);?></p> 
             <h4>Результат оценки:</h4> 
             <p><?print_r(get_solution($_GET['solutionID'])[solutionRating]);?></p> 
             <h4>Статус:</h4> 
             <p><?print_r(get_solution($_GET['solutionID'])[status]);?></p>
             <h4>Комментарии к решению:</h4>
             <ul class="list-group">             
                <?php
                        foreach (get_solution_comment($_GET['solutionID']) as $key => $value) {
                            echo "<li class='list-group-item'>";
                                print_r($value[text]);
                            echo "</li>";
                        }; 
                ?>
             </ul>
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
    <script>$('#exampleModal').on('hidden.bs.modal', function (event) {location.search = '/';});</script>    
  </body>
</html>