<html>
<body>
      <h1>Borrar</h1>
		  <?php
			require_once('../back/claseBase.php');
			
			$id = $_GET["id"];
			echo "<div> ID: ".$id."</div>";
			$claseBase = new claseBase();
			$claseBase->borrarPlanta($id);
			echo "Exito al borrar la planta";
			echo "<a href='listadoPlantas.php'>De vuelta al listado </a>";
		  ?>
      
</body>
</html>
