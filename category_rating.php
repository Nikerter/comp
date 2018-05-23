<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Рейтинг по категориям</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <?php
        include('libs/bibl.php');
        include('libs/const.php');
    ?>
    <div class="row">
    	<div class="col-md-3 text-center">
    		<h1>Категория</h1>
    		<div class="btn-group-vertical btn-group-lg">
		    		<?php 
		    		foreach (get_categories() as $key => $value) {
		    			echo "<form action='' method='get'>";
		    			echo "<input type='text' name='categoryID' hidden='true' value='$value[categoryID]'>";
			    		echo "<button type='submit' class='btn btn-success btn' style='width: 210px'>";
		    						print_r($value[name]);
		    			echo "</button></form>";

		    		}
		    		?>
	    		
	    	</div>
    	</div>
    	<div class="col-md-9 text-center">
    		<h1>Списки лидеров по категориям</h1>
			<table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h2>#</h2>
                        </th>
                        <th>
                            <h2>Рейтинг навыка</h2>
                        </th>
                        <th>
                            <h2>Пользователь</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                    foreach (get_users() as $key => $value) {
                    	if (get_user_skills($value[userID], $_GET['categoryID']) == !null) {
                    		$userarr[] = $value[userID];
                    	};
                    };
                    
                    if (isset($_GET['categoryID'])) {
                    	if (isset($userarr)) {
                    		foreach ($userarr as $key => $val) {
                    		echo "<tr>";
                                echo "<td>";
                                    echo $key+1;
                                    switch ($key) {
                                        case '0':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/6/61/%D0%97%D0%BE%D0%BB%D0%BE%D1%82%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121116&path-prefix=ru' style='width: 20px; height: 20px;'' alt='gold'>";
                                            break;
                                        case '1':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/5/5e/%D0%A1%D0%B5%D1%80%D0%B5%D0%B1%D1%80%D1%8F%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121052&path-prefix=ru' style='width: 20px; height: 20px;'' alt='silver'>";
                                            break;
                                        case '2':
                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/b/b6/%D0%91%D1%80%D0%BE%D0%BD%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121106&path-prefix=ru' style='width: 20px; height: 20px;'' alt='bronze'>";
                                            break;
                                    };
                                echo "</td>";
                                echo "<td>";
                                	print_r(get_user_skills($val, $_GET['categoryID'])[skillRating]);
                                echo "</td>";
                                echo "<td>";
                                	print_r(get_user_data($val)[userName]);
                                echo "</td>";
                            echo "</tr>";
                    		};
                    	} else {
							echo "<h1>В этой категории пока нету записей</h1>";
                    	};
                    };
                  
                    		//echo "очко<br>";
                    	// print_r(get_user_skills($value[userID], "8ddd1cf2-90a9-4060-bdd8-aa545c5e8cbb"));
                    	// echo "<br><br>";
		               /* if (isset($_GET['categoryID'])) {
		                    foreach (get_users() as $keyg => $value) {
		                    	$arr[] = $value[userID];
			                    foreach (get_user_skills($value[userID]) as $key => $value) {
			                    	if ($value[categoryID] == $_GET['categoryID']) {
			                    		//
			                    	} else {
			                    		echo "<tr>";
		                                echo "<td>";
		                                    echo $key+1;
		                                    switch ($key) {
		                                        case '0':
		                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/6/61/%D0%97%D0%BE%D0%BB%D0%BE%D1%82%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121116&path-prefix=ru' style='width: 20px; height: 20px;'' alt='gold'>";
		                                            break;
		                                        case '1':
		                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/5/5e/%D0%A1%D0%B5%D1%80%D0%B5%D0%B1%D1%80%D1%8F%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121052&path-prefix=ru' style='width: 20px; height: 20px;'' alt='silver'>";
		                                            break;
		                                        case '2':
		                                            echo "<br><img src='https://vignette.wikia.nocookie.net/undertale/images/b/b6/%D0%91%D1%80%D0%BE%D0%BD%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F_%D0%BC%D0%B5%D0%B4%D0%B0%D0%BB%D1%8C.png/revision/latest?cb=20160704121106&path-prefix=ru' style='width: 20px; height: 20px;'' alt='bronze'>";
		                                            break;
		                                    }
		                                echo "</td>";
		                                echo "<td>";
		                                	print_r($value[skillRating]);
		                                echo "</td>";
		                                echo "<td>";
		                                	print_r(get_user_data($value[userID])[userName]);
		                                echo "</td>";	                    		
			                    	};
			                    };
		                    };
		                };
                    //print_r($arr);
                    
                   	*/?>                   
                </tbody>
            </table>
    	</div>
    </div>
</body>
</html>