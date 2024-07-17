<div class=" footer-center">
    <?php
    $visit = 1;
    $fileName = "counters/" . Request::route()->getName() . ".txt";
    if (file_exists($fileName)) {
        $fp    = fopen($fileName, "r");
        $visit = fread($fp, 4);
        $visit++;
        fclose($fp);
    }
    $fp = fopen($fileName, "w");
    fwrite($fp, $visit);
    fclose($fp);
    ?>
    <div class="row align-items-center">
        <div class="col-4">
            <small>
                Contador de la pagina {{Request::route()->getName()}}: {{$visit}}
            </small>
        </div>
        <div class="col-4">
            <small>
                Fabrica de Billares ROMERO BACOTICH &copy; {{ date('d F Y') }}
            </small>
        </div>
        <div class="col-4">
            <small>
                © Grupo - SC
            </small>
        </div>
    </div>
</div>