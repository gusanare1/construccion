<?php
require_once('../../back/claseBase.php');
?>

<html>
<head>
    <title>Gráfico de líneas usando Chart.js con PHP - BaulPHP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

    const labels = [
            <?php
            $claseBase = new claseBase();
            $listadoPlantas = $claseBase->getPlantas();
            //print_r();
            $listadoRiegoPlanta1 = $claseBase->getHistorialRiegoByIdPlanta($listadoPlantas[0]->getClasePlanta());
            //echo "5d ". ($listadoRiegoPlanta1);
            //echo "<h1>".$listadoPlantas[0]->getNombrePlanta()."</h1>";
            foreach ($listadoRiegoPlanta1 as $riego)
            {
                //print_r($riego);
                echo "'".$riego->getFechaPlantacion()."',";
            } 
            echo "''];";
                
            
?>
    

    const data = {
        labels: labels,
        datasets: [{
        label: <?php echo "'".$listadoPlantas[0]->getNombrePlanta()."'"; ?>,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        //data: [0, 10, 5, 2, 20, 30, 45],
        data:[ 
<?php

foreach ($listadoRiegoPlanta1 as $riego)
{
    echo floatval($riego->getPorcentajeHumedad()).",";
} 

?>
0],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    </script>

</head>

<body>

<h1>Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>

</div>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>



</html>

