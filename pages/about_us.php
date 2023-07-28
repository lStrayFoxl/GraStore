<?php
    include("../path.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GraStore</title>
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>

    <!-- Header -->
    <?php include("../app/include/header.php"); ?>

    <section class="main">
        <div class="container">
            <div class="block_back">
                <a href="/" class="btn btn-big btn_back">На главную</a>
            </div>
            <div class="content_block">
                <h3 class="article">О нас</h3>

                <div class="text">
                    <p class="text_parag">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique quam odio, nec accumsan leo dictum vitae. 
                        Cras a tincidunt ipsum. In bibendum enim eu tellus ultricies, id iaculis turpis facilisis. Curabitur viverra accumsan magna, 
                        ac commodo enim sollicitudin et. Ut aliquam urna diam, ut euismod eros sagittis sit amet. Phasellus mattis porttitor mi, 
                        et maximus tortor luctus vel. Curabitur sagittis justo non nulla aliquet venenatis. Sed auctor mauris tortor, et sodales 
                        tortor dapibus ut.
                    </p>
                    
                    <p class="text_parag">
                        Proin sodales dui sed lacinia malesuada. Nulla a odio scelerisque, 
                        dignissim erat ac, porta arcu. Ut malesuada semper elit a iaculis. 
                        Nullam sed placerat diam. Integer rhoncus vulputate molestie. Nulla iaculis interdum odio, 
                        eu gravida magna imperdiet nec. Mauris eu enim quis elit rhoncus ultrices. In in ipsum at turpis 
                        posuere suscipit. Quisque fringilla nisi vel erat pellentesque interdum. Duis at erat mauris. Aenean enim dolor, 
                        endrerit feugiat dui vitae, porttitor vehicula felis. Proin molestie, nisl ac eleifend pretium, neque sem porttitor ante, 
                        non porttitor turpis neque at purus. Fusce commodo tortor eu aliquet gravida.
                    </p>

                    <p class="text_parag">
                        Vivamus ac dictum justo. Mauris ut dolor quis nulla molestie venenatis vitae vehicula ligula. Aliquam erat volutpat. 
                        Proin volutpat, turpis vel fringilla suscipit, mauris erat lobortis tellus, eu fringilla nisl magna nec augue. Fusce elementum 
                        quam a est finibus gravida. Cras rutrum ex a placerat viverra. Donec consectetur dictum odio, et sodales tellus. Sed dignissim 
                        mattis justo, sed tincidunt neque congue et. Mauris fringilla volutpat condimentum. Vestibulum quis bibendum dolor, euismod 
                        volutpat felis. Nunc vitae sem ac nunc consequat dictum a at elit. Proin nibh eros, blandit ut convallis at, viverra non ligula. 
                        Donec vitae egestas justo, id vulputate ipsum. Vivamus sit amet lacinia neque, non venenatis tellus.
                    </p>


                    <p class="text_parag">     
                        Cras consequat quam ligula, in tincidunt tellus eleifend at. Sed nunc nunc, rhoncus in lectus sit amet, molestie cursus nisl. 
                        Proin erat lorem, porttitor a ante eu, auctor tempus velit. Duis vehicula urna at ullamcorper volutpat. Integer vitae quam vel 
                        lorem efficitur accumsan. Vivamus mattis ipsum ex, ut maximus massa volutpat vel. Aenean posuere, lectus vitae dapibus aliquet, 
                        metus lacus congue mauris, facilisis accumsan nibh lectus vitae lacus. Fusce eget mollis dolor. Cras id maximus metus, nec accumsan 
                        augue. Phasellus at iaculis velit, quis condimentum justo.
                    </p>

                    <p class="text_parag">
                        Etiam cursus, turpis ut consequat sagittis, dui ante finibus nibh, sit amet sollicitudin 
                        velit massa volutpat justo. Nam dignissim fermentum placerat. Mauris pulvinar ultrices volutpat. 
                        Maecenas commodo porttitor semper. Fusce pulvinar quis ligula nec vehicula. Nunc blandit ligula ex, quis commodo 
                        elit semper et. Nunc accumsan, nulla vitae rutrum porta, mi tortor pulvinar nunc, et pretium ante ligula non arcu. Integer 
                        ut dui sollicitudin odio posuere ullamcorper eget sit amet libero.
                    </p>
                    
                </div>
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <?php include("../app/include/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>