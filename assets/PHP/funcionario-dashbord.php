<?php
    session_start();
    if(empty($_SESSION)) {
        print "<script>location.href='../../index.html';</script>";
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style4.css">
    </head>
    <body>
        <section>
            <div>
                <?php
                    print "<a href='../../index.html' class='mt-5 mb-3 principal_alinhamento__sair btn btn-danger'>Sair</a>";
                ?>
            </div>
        </section>
    </body>
    </html>