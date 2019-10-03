<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php
            $host ="localhost";
            $user = "root";
            $password = "";
            $dbname = "teste";
            $con = mysqli_connect ($host, $user, $password);
            $db = mysqli_select_db($con, $dbname);
            if($con){
                echo 'conectado';
            }else{
                echo 'desconectado';
            }
            
            mysqli_query($con,"SET NAMES utf8");
            mysqli_query($con,"SET CHARACTER_SET utf8");
           
            $link = 'http://www.devmedia.com.br/xml/devmedia_full.xml';
            $xml = simplexml_load_file($link) -> channel;
            echo $xml->title;
            foreach($xml->item as $item){
                $query = "insert into item (title) values ('$item->title')";
                if(mysqli_query($con,$query)){
                    echo 'sucesso';
                }else{
                    echo 'falha';
                }
            }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>