<?php
if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

require ('connect.php');

#pagination
$result = $mysqli->query("SELECT * FROM `users` ");
$results_per_page = 3;
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);


$this_page_first_result = ($page-1)*$results_per_page;



#/pagination



$customers = $mysqli->query("SELECT * FROM `users` LIMIT "  . $this_page_first_result . ',' .  $results_per_page);
while ($result = mysqli_fetch_array($customers, MYSQLI_ASSOC) ) {
    $users[]= $result;
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Таблица пользователей</title>
</head>
<body>
    <div class="app">
        <h1>Список пользователей</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Пол</th>
                <th scope="col">О себе</th>
                <th scope="col">Согласие</th>
                
              </tr>
            </thead>
            <tbody>
<?php foreach($users as $user) : ?>
              <tr>
                <th scope="row">
                    <?php echo $user['id']; ?>
                </th>
                <td>
                    <?php echo $user['first_name']; ?>
                    
                </td>
                <td>                    
                    <?php echo $user['email']; ?>
                </td>
                <td>
                    <?php echo $user['gender']; ?>
                    
                </td>
                <td>
                    <?php echo $user['about']; ?>
                    
                </td>
                <td>
                    <?php
                    
                    if($user['agree'] === '1'){
                        echo ('Получено');
                    }else{
                        echo('Отсутствует');
                    }
                    
                     ?>
                    
                </td>
              </tr>
<?php endforeach; ?>
            </tbody>
          </table>  


          <ul class="pagination pagination-lg">
          <?php
          for($page = 1; $page <= $number_of_pages ; $page++) {
    echo '<li class="page-item"><a class="page-link" href="users.php?page=' . $page . '">' . $page . '</a></li>';
}
        ?>
            
            
          </ul>
          
          <div class="button_box">
            <a href="/" class="btn btn-outline-primary">К форме регистрации</a>             
            <a href="auth.html" class="btn btn-outline-success">К форме авторизации</a>  
        </div>
        
    </div>
        
</body>


<!-- 
require('users.html')
?> -->
