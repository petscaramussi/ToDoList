<?php
session_start();
include('verifica_login.php');
require 'db_conn.php';
$id_usuario = $_SESSION['ID'];
$nome_usuario = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color: 	#2c2f33;">

<div class="hello">
	<h2 style="color: #fff;
    background-color: #23272a;
    height: 60px;
    font-family: 'Montserrat', sans-serif;
    padding-left: 10%;
    padding-top: 1%;
    ">Ola, <?php echo $nome_usuario; ?> </h2>
    </div>

    <!--<p class="id_usuario">ID do usuario: <?php //echo $id_usuario; ?> </p> -->

	<button style="position: absolute;
    top: 1%;
    left: 90%;
    padding: 10px 15px;
    text-transform: uppercase;
    font-family: 'Montserrat' , sans-serif;
    font-size: 20px;
    overflow: hidden;
    border: 0;
    border-radius: 4px;
    background-color: #2c2f33;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    "><a href="logout.php" style="text-decoration: none; color: #fff;">Sair</a></button>

    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
				<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="O que você precisa fazer?" />
			  <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $todos = $conn->query("SELECT * FROM todos where idUsuario = ".$id_usuario." ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>
