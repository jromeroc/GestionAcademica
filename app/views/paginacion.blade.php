<?php
//creamos un nuevo objeto para crear la paginación
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
//si existe paginación la montamos
if ($paginator->getLastPage() > 1){ ?>
<div class="pagination">
    {{ HTML::style('css/paginacion.css') }}
    <ul>
        <?php
        //Cantidad de enlaces antes y después en la paginación
        //si son 3 quedará  123 4 567 tres antes y tres después
        $beforeAndAfter = 3;
 
        //Página actual
        $currentPage = $paginator->getCurrentPage();
 
        //Última página
        $lastPage = $paginator->getLastPage();
 
        //Comprobamos si las páginas anteriores y siguientes de la actual existen
        $start = $currentPage - $beforeAndAfter;
 
        //Comprueba si la primera página en la paginación está por debajo de 1
        //para saber como colocar los enlaces
        if($start < 1)
        {
            $pos = $start - 1;
            $start = $currentPage - ($beforeAndAfter + $pos);
        }
 
        //Último enlace a mostrar
        $end = $currentPage + $beforeAndAfter;
 
        if($end > $lastPage)
        {
            $pos = $end - $lastPage;
            $end = $end - $pos;
        }
 
        //Si es la primera página mostramos el enlace desactivado
        if ($currentPage <= 1)
        {
            echo '<li class="disabled"><span>Primera</span></li>';
        }
        //en otro caso obtenemos la url y mostramos en forma de link
        else
        {
            $url = $paginator->getUrl(1);
 
            echo '<li><a href="'.$url.'">&lt;&lt; Primera</a></li>';
        }
 
        //Para ir a la anterior
        echo $presenter->getPrevious('&lt; Anterior');
 
        //Rango de enlaces desde el principio al final, 3 delante y 3 detrás
        echo $presenter->getPageRange($start, $end);
 
        //Para ir a la siguiente
        echo $presenter->getNext('Siguiente &gt;');
 
        ////Si es la última página mostramos desactivado
        if ($currentPage >= $lastPage)
        {
            echo '<li class="disabled"><span>Última</span></li>';
        }
        //en otro caso obtenemos la url y mostramos en forma de link
        else
        {
            $url = $paginator->getUrl($lastPage);
 
            echo '<li><a href="'.$url.'">Última &gt;&gt;</a></li>';
        }
        ?>
        <?php
    }        
    ?>
</ul>
</div>