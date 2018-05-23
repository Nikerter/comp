<?php
  include('const.php');

  function get_user_solutions($userID) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => APIURL.SOLUTIONS.FILTER_USER_ID.$userID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Cache-Control: no-cache",
        "Postman-Token: abf89e0d-3fd6-4db0-a64d-a39691d5b12b"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      //echo $response;
      $response = json_decode($response, true);
      //print_r($response);
      return $response;
      /*foreach ($response as $key => $value) {
          //echo "<tr><td>";
          if ($field == "solutionID") {
            echo "<a href='",APIURL.SOLUTIONS,"$value[solutionID]'><div class='btn btn-success'>Подробнее</div></a>";
            echo "<br>";
          } else {
            print_r($value[$field]);
            echo "<br><br>";
          }
          
          //echo "</td></tr>";
          
      }*/
    }
  };

  function get_solution_comment($solutionID){

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://anmi.work/api/solutions/".$solutionID."/comments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Accept: application/json",
          "Cache-Control: no-cache",
          "Postman-Token: b1c75302-6b68-47d9-a100-a7eb24cda96c"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
          $response = json_decode($response, true);
          if (empty($response)) {
            $response[][text] = "комментариев пока нету";
            return $response;
          } else {
            return $response; 
          }
      }
    };

  function get_solution($solutionID){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => APIURL.SOLUTIONS.$solutionID,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Postman-Token: d31e8415-2acd-4301-a7b0-14e5bafc41fb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $response = json_decode($response, true);
          //print_r($response);
          return $response;
        }
      };

  function get_user_data($userID){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => APIURL.USERS.$userID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Cache-Control: no-cache",
        "Postman-Token: 6ee05131-1f78-46f6-943b-7aea3940939d"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_users_rating() {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/users?orderBy=userRating+desc",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: f29f4cf0-6dc5-418c-bb97-f755eae05695"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_category($categoryID) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/categories/".$categoryID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Cache-Control: no-cache",
        "Postman-Token: 38d05428-e1e5-4ffe-a89b-2af0b0e43c11"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_categories() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/categories",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Cache-Control: no-cache",
        "Postman-Token: bad4aade-86e3-41c1-81b2-be1e17188168"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  }

  function get_exercises($categoryID, $exerciseID) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/categories/".$categoryID."/exercises/".$exerciseID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: e790faf7-0157-4571-86b3-3977505fb060"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_category_solutions($categoryID) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/solutions?categoryID=".$categoryID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: dae87553-d823-4d52-94e3-8d959c0544f7"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_user_skills($userID, $categoryID) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/users/".$userID."/skills/".$categoryID,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: 4c12de3b-d3f7-4932-b88e-3fbd2b1d304b"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_users() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/users/",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: 69a5afea-2d71-45ff-8773-7a2691191259"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  };

  function get_user_skills_field($userID) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://anmi.work/api/users/".$userID."/skills?fields=categoryID",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Postman-Token: ea10fff5-64f7-4512-b05c-0405bca942cb"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $response = json_decode($response, true);
      return $response;
    }
  }

?>