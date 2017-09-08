<?php
include "chead.php";
include "controll2.php";
function checkTab($tab, $name) {
include "chead.php";
    $rowCount = 0;
    $query = "SELECT count(*) FROM $tab WHERE name = '$name'";
    $query1 = $connect->prepare($query);
    $query1->execute();
    $rowCount = $query1->fetchColumn(0);
    return $rowCount;
  }

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'header') {
    if($_GET['mode'] == 'delete') {
        $id = $_GET['id'];
        $query = "DELETE FROM  header  WHERE id='$id'";
        $select = $connect->exec($query);
        if(!$select) {
            echo "Что то пошло не так";
        } else {
            echo "Удалено!";
        }
    } else {
    if($_POST['name'] == '' || $_POST['code'] == '') {
        echo "Заполните поля";
    } else {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $id = $_GET['id'];
        if($_GET['mode'] == 'new')
            $query = "INSERT INTO header (name, code) value ('$name', '$code')";
        elseif ($_GET['mode'] == 'edit')
            $query = "UPDATE header SET name = '$name', code ='$code' WHERE id=$id";
            if($_GET['mode'] == 'new')
                $select = $connect->exec($query);
            elseif($_GET['mode'] == 'edit') {
                $select = $connect->prepare($query);
                $select->execute();
            }
            if(!$select) {
                echo "Что то пошло не так";
            } else {
                echo "Все отправленно!";
            }
        }
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'foot') {
    if($_GET['mode'] == 'delete') {
        $id = $_GET['id'];
        $query = "DELETE FROM  footer  WHERE id='$id'";
        $select = $connect->exec($query);
        if(!$select) {
            echo "Что то пошло не так";
        } else {
            echo "Удалено!";
        }
    } else {
    if($_POST['name'] == '' || $_POST['code'] == '') {
        echo "Заполните поля";
    } else {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $id = $_GET['id'];
        if($_GET['mode'] == 'new')
            $query = "INSERT INTO footer (name, code) value ('$name', '$code')";
        elseif ($_GET['mode'] == 'edit')
            $query = "UPDATE footer SET name = '$name', code ='$code' WHERE id=$id";
            if($_GET['mode'] == 'new')
                $select = $connect->exec($query);
            elseif($_GET['mode'] == 'edit') {
                $select = $connect->prepare($query);
                $select->execute();
            }

        }
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['type'] == 'cont') {
    if($_GET['mode'] == 'delete') {
        $id = $_GET['id'];
        $query = "DELETE FROM  content  WHERE id='$id'";
        $select = $connect->exec($query);
        if(!$select) {
            echo "Что то пошло не так";
        } else {
            echo "Удалено!";
        }
    }
    else {
    if($_POST['name'] == '' || $_POST['code'] == '') {
        echo "Заполните поля";
    }
    else {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $id_header = $_POST['header_select'];
        $id_foot = $_POST['footer_select'];
        $id = $_GET['id'];
        // if($_POST['name'] == 'name')
        //     echo "введите еще раз!";
        // elseif($_POST['name'] == '') {
        $select = false;
        if($_GET['mode'] == 'new' && checkTab('content', $name) == 0)
        {
            $query = "INSERT INTO content (name, code, header, footer) value ('$name', '".$connect->quote($code)."', '$id_header','$id_foot')";

            $select = $connect->prepare($query);
             $select->execute();

              if(!$select) {
                echo "Что то пошло не так";
            } else {
                echo "Все отправленно!";
            }
        }
        else if ($_GET['mode'] == 'edit')
        {
            $query = "UPDATE content SET name = '$name', code ='$code' WHERE id=$id";
            // vstavka
            // if($_GET['mode'] == 'new')
            //     $select = $connect->exec($query);
            // else if($_GET['mode'] == 'edit') {
            //     $select = $connect->prepare($query);
            //     $select->execute();
            // vstavka

              $select = $connect->prepare($query);
                  $select->execute();
                   if(!$select) {
                 echo "Что то пошло не так";
             } else {
                 echo "Все отправленно!";
             }
         }
         else {
             echo "Имя контента уже сушествует";
         }
     }
     }
 }

?>

    <div class="controll">
        <?php
        $domain = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['SCRIPT_NAME'];
        $queryString = $_SERVER['QUERY_STRING'];
        $url = "http://" . $domain . $path . "?" . $queryString;
            if($_GET['type'] == '')
            {
                echo '<div class="content_form"><a style="padding: 10px 20px; background-color:#ec3535; opacity:0.8; color:#fff; margin-right:50px;" href="'.$url."type=header".'">Зaголовок</a><a style="padding: 10px 20px; background-color:#ec3535; opacity:0.8; color:#fff; margin-right:50px;" href="'.$url."type=foot".'">Подвал</a><a style="padding: 10px 20px; background-color:#ec3535; opacity:0.8; color:#fff; margin-right:50px;" href="'.$url."type=cont".'">Контент</a></div>';
            }
            elseif($_GET['type'] == 'header' && ($_GET['mode'] == 'edit' || $_GET['mode'] == 'new')) {
                if($_GET['mode'] == 'edit') {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM header WHERE id=$id";
                    $rs = $connect->query($sql);
                    while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                        $name = $row['name'];
                        $code = $row['code'];
                    }
                }
        ?>
            <!-- ввод данных в header -->
            <h1>Controll panel header input!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
            <p style="color:green;">проверка верх</p>
            <form class="controll__form form__input-fix" action="#" method="POST">
                <label for="name">Name</label>
                <?php if($_GET['mode'] == 'new') { ?>
                    <input class="form__name" id="name" type="text" name="name" placeholder="Введите name"><br>
                    <br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД"></textarea><br>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                    <?php } else { ?>
                    <input class="form__name" id="name" type="text" name="name" value="<?php echo $name; ?>"><br><br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД"><?php echo $code; ?></textarea><br>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                    <?php } ?>
            </form>
        <?php
            }
            elseif($_GET['type'] == 'foot' && ($_GET['mode'] == 'edit' || $_GET['mode'] == 'new')) {
                if($_GET['mode'] == 'edit') {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM footer WHERE id=$id";
                    $rs = $connect->query($sql);
                    while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                        $name = $row['name'];
                        $code = $row['code'];
                    }
                }
        ?>
            <!-- ввод данных в footer -->
            <h1>Controll panel footer input!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
            <form class="controll__form" action="#" method="POST">
                <label for="name">Name</label>
                <?php
                if($_GET['mode'] == 'new') { ?>
                    <input class="form__name" id="name" type="text" name="name" placeholder="Введите name"><br>
                    <br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД new"></textarea><br>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                <?php
                }
                else { ?>
                    <input class="form__name" id="name" type="text" name="name" value="<?php echo $name; ?>"><br><br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД edit"><?php echo $code; ?></textarea><br>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                    <?php } ?>
            </form>
        <?php
            }
            elseif($_GET['type'] == 'cont' && ($_GET['mode'] == 'edit' || $_GET['mode'] == 'new')) {
                if($_GET['mode'] == 'edit') {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM content WHERE id=$id";
                    $rs = $connect->query($sql);
                    while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                        $name = $row['name'];
                        $code = $row['code'];
                        $header = $row['header'];
                        $footer = $row['footer'];
                    }
                }

        ?>
            <!-- ввод данных в content -->
            <h1>Controll panel content input!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
            <form class="controll__form" action="#" method="POST">
                <label for="name">Name</label>
                <?php
                if($_GET['mode'] == 'new')
                    { ?>
                    <input class="form__name" id="name" type="text" name="name" placeholder="Введите name"><br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД контента new"></textarea><br>
                    <select class="form__name" name="header_select" id="header_select" style='width:350px'>
                    <?php
                    $result = $connect->query("SELECT * FROM header");
                    controll2::createOptions($result,'id','name','');
                    ?>
                    </select>
                    <br>
                    <select class="form__name" name="footer_select" id="footer_select" style='width:350px'>
                    <?php
                    $result = $connect->query("SELECT * FROM footer");
                    controll2::createOptions($result,'id','name','');
                    ?>
                    </select>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                    <?php
                }
                else { ?>
                    <input class="form__name" id="name" type="text" name="name" value="<?php echo $name; ?>"><br>
                    <textarea class="form__code" name="code" id="code" cols="60" rows="8" placeholder="Введите свой КОД"><?php echo $code; ?></textarea><br>
                    <!-- вставка двух селектов -->
                    <select class="form__name" name="header_select" id="header_select">
                        <?php
                        $result = $connect->query("SELECT * FROM header");
                        controll2::createOptions($result, 'id', 'name', $header);
                        ?>
                    </select>
                    <select class="form__name" name="footer_select" id="footer_select">
                        <?php
                        $result = $connect->query("SELECT * FROM footer");
                        controll2::createOptions($result, 'id', 'name', $footer);
                        ?>
                    </select>
                    <input class="form__btn" type="submit" value="Сохранить!!">
                    <?php
                    } ?>
            </form>
        <?php
            }
        ######## Список таблицы ###########
        ######## Сохранить, изменить! ###########
            elseif($_GET['type'] == 'header' && $_GET['mode'] == '') {
                $urln = $url.'&mode=new';
        ?>
            <!-- header главная страница -->
            <h1>Controll panel header main!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
            <p style="color:green;">проверка верх</p>
            <a href="<?php echo $urln; ?>"><input type="button" value="Создать новый"></a><br><br>
        <?php
            $sql = "SELECT * FROM header";
            $rs = $connect->query($sql);
                while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                    $urln = $url.'&mode=edit&id='.$row['id'];
                    $urly = $url.'&mode=delete&id='.$row['id'];
                        echo "<div><form action='$urly' method='POST'>{$row['id']} - {$row['name']} - <a href='$urln' >
                        <input type='button' value='Изменить!!'></a>
                        <input type='submit' value='удалить!!'>
                        </div></form>
                        <br>";
                }
            }
            elseif($_GET['type'] == 'foot' && $_GET['mode'] == '') {
                $urln = $url.'&mode=new';
        ?>
            <!-- для замены данных -->
            <h1>Controll panel footer!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
             <a href="<?php echo $urln; ?>"><input type="button" value="Создать новый"></a><br><br>
        <?php
            $sql = "SELECT * FROM footer";
            $rs = $connect->query($sql);
                while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                    $urln = $url.'&mode=edit&id='.$row['id'];
                    $urly = $url.'&mode=delete&id='.$row['id'];
                        echo "<div><form action='$urly' method='POST'>{$row['id']} - {$row['name']} - <a href='$urln' >
                        <input type='button' value='Изменить!!'></a>
                        <input type='submit' value='удалить!!'>
                        </div></form>
                        <br>";
                }
            }
            elseif($_GET['type'] == 'cont' && $_GET['mode'] == '') {
                $urln = $url.'&mode=new';
                // var_dump($_GET['mode']);
        ?>
            <!-- для замены данных -->
            <h1>Controll panel contentasd!</h1>
            <p>Внесите изменения в форму! Для отправки на главную страничку.</p>
            <a href="<?php echo $urln; ?>"><input type="button" value="Создать новый"></a><br><br>
       <?php
           $sql = "SELECT * FROM content";
           $rs = $connect->query($sql);
               while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                   $urln = $url.'&mode=edit&id='.$row['id'];
                   $urly = $url.'&mode=delete&id='.$row['id'];
                       echo "<div><form action='$urly' method='POST'>{$row['id']} - {$row['name']} - <a href='$urln' >
                       <input type='button' value='Изменить!!'></a>
                       <input type='submit' value='удалить!!'>
                       </div></form>
                       <br>";
               }
            }
        ?>
        <!-- <input type="text" placeholder="контент"> -->
    </div>
<?php
    require_once "foot.php";
 ?>
