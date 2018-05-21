<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Старт</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <?php
        include('libs/bibl.php');
        include('libs/const.php');
        //delapi("4d6834f1-73a6-40f8-bcea-64393f726ba9");
    ?>
    <script>function showmodal(){$(document).ready(function() {$('#exampleModal').modal('show');});}</script>
    <div class="row">
        <a href="solutions.php">Проверка</a>
        <div class="col-md-12 text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h2>Наименование решения</h2>
                        </th>
                        <th>
                            <h2>Рейтинг</h2>
                        </th>
                        <th>
                            <h2>Подробнее</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                        $field = "text";
                        foreach (get_user_solutions(USERID) as $key => $value) {
                            echo "<tr>";
                                echo "<td>";
                                    print_r($value[text]);
                                echo "</td>";
                                echo "<td>";
                                    print_r($value[solutionRating]);
                                echo "</td>";
                                echo "<td>";
                                    echo "<form action='' method='get'>
                                            <input type='text' name='solutionID' hidden='true' value='$value[solutionID]'>
                                            <button type='submit' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'>Подробнее</button>
                                            <!--<div onclick='get_solution($value[solutionID])' class='btn btn-success'>Подробнее</div>-->
                                          </form>";
                                echo "</td>";
                            echo "</tr>";
                        };

                        if (isset($_GET['solutionID'])) {
                            echo "<script>showmodal();</script>";
                        }else {
                            echo "Выберите нужное решение";
                        };?>
                                    
                </tbody>
            </table>
        </div>
    </div>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <?php get_solution($_GET['solutionID']);  ?>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <?php get_solution($_GET['solutionID']);  ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>  -->   
  </body>
</html>
<?php
/*
                            getsolution($userid);
                            $name = "uber test";
                            $des = "uber des";
                            //postapi($name, $des);
                            $delid = "2b36ab9e-2110-4e4b-95cb-175ad92add5f";
                            //delapi($delid);
*/
?>