<!-- vista A -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Paginar resultados Vista 1</p>
        <div class="container-fluid p-2">
            <?php 
  if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conexion,"SELECT * FROM articulos_cp  ;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '3';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conexion,"SELECT * FROM articulos_cp LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros);
            
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)</h5>
            <div class="container_card">
                <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ ?>
                    <div class="blog-post ">
                        <img src="../Insertar artÃ­culo/articulos/<?php echo $resultado["img"]; ?>.jpg" alt="Man">
                        <a  target="_blank" class="category">
                        <?php echo $resultado["categoria"]; ?>
                        </a>
                        <div class="text-content">
                            <img src="../Libreria/images/logo.jpg" alt="">
                            <h2 class="post-title">
                            <?php echo $resultado["titulo"]; ?>
                            </h2>
                            <p><?php echo $resultado["descripcion"]; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <!-- paginacion //////////////////////////////////////-->
    <div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='index.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='index.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='index.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='index.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
<!-- end paginacion ///////////////////////// -->




    </div>
</div>

<!-- END vista A -->