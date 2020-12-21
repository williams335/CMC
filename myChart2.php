<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <title>dynamic chart js</title>
  </head>

  <body class="bg-warning py-5">
    <?php 
      include ('connexion.php');
      include ('requests_functions.php');
    ?>
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h1>Taux de réussite</h1>
 
          <label>Mois :</label>
          <select id="month" name="month">
            <option value="1">Janvier</option>
            <option value="2">Fevrier</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Aout</option>
            <option value="9">Septembre</option>
            <option value="10">octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Decembre</option>
          </select>
          <button class="btn btn-success" onclick="updateChart()">
            Visualiser
          </button>
        </div>
        <div class="card-body">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>

    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    //var oldData=[0, 10, 5, 2, 20, 30, 45]

    var newData=[10,20,30,40,50,60,89];
    var oldData=[];
     <?php 
      //$oldData=foo();
      //$data = json_encode($oldData); 
      //$array_users_functions=getAllusers();
      //$labels=json_encode($array_users_functions);
     ?>

    var chart = new Chart(ctx, {
    // The type of chart we want to create   //[echo $oldData.trim(',')>]
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['tdelille', 'ddaniaupotter', 'sebastien', 'gachort', 'madeth', 'admin', 'mmay', 'cdejean', 'fdarriet', 'mwollenburger', 'tsoubrie', 'insauser1', 'mgodwod', 'jvasseur','mdanet', 'psalam', 'guest', 'cevanen', 'cfroger', 'adebeuckelaere', 'shernu','xjmechain','ntricoit'],//php echo $labels ?>
        datasets: [{
            label: 'Pourcentage de réussite',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [20,40,50,15,60,70,7,12,80,51,18,14,8,70,12,10,55,21,14,85,76,78,13]// echo $data ?> 
        }]
    },

    // Configuration options go here
    options: {}
});

    function updateChart(){
      const day=document.querySelector("#day");
      const month=document.querySelector("#month");
      console.log("day selected:: "+day.value+" month selected:: "+month.value);
      chart.data.datasets[0].data=newData;
      chart.update();
    }
    </script>

  <?php

    //getUsersV1();
    //getUsersV2();

    //$array_list_nbre_messages =getNombrePostMessages();
    //for($i=0;$i<sizeof($array_list_nbre_messages);$i++){
     // echo $array_list_nbre_messages[$i];
   // }
    //echo "<br>";
    /*$array_list_users =getAllUsers();
    for($i=0;$i<sizeof($array_list_users);$i++){
      echo $array_list_users[$i];
    }*/

    //include ('requests_functions.php');
    //$array_users=getUsers();
    //$array_users_json = json_encode($array_users);
    //getUsersV1();
    /*for($i=0;$i<sizeof($array_users);$i++){
      echo $array_users[$i];
    }*/
  ?>
      
    <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>