<?php 
	require 'Classes/PHPExcel/IOFactory.php';
	require 'conexion.php';
	$conexion = conexionMySQL();

	$nombre_archivo = "excel/db.xlsx";

	$objPHPExcel = PHPExcel_IOFactory::load($nombre_archivo);
	$objPHPExcel->setActiveSheetIndex(0);
	$num_rows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	echo '<table border = 1>
		<tr>
			<td>Producto</td>
			<td>Modelo</td>
			<td>Precio</td>
		</tr>';

		for ($i = 2; $i <= $num_rows; $i++) {
			$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$modelo = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$precio = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

			echo '<tr>';
			echo '<td>'.$nombre.'</td>';
			echo '<td>'.$modelo.'</td>';
			echo '<td>'.$precio.'</td>';
			echo '</tr>';

			$sql = "INSERT INTO productos (producto,modelo,precio) VALUES('$nombre','$modelo','$precio')";
			$result = $conexion->query($sql);
		}

	echo '</table>';

?>