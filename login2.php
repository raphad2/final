<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'comercio');

$email = $_POST['email'];
$senha = $_POST['senha'];
$senhacri = md5($senha);
$sql = "select * from cliente where email='$email' and senha='$senhacri'";

$resultado = mysqli_query($conn, $sql);
$total     = mysqli_num_rows($resultado);

if ( $total>0 ) {
	$dados = mysqli_fetch_array($resultado);
	
	        header("location: formulariocliente.php");
	     
} else {
	echo "<script>
	        alert('Cliente não encontrado');
	        location.href='logincliente.php';
	      </script>";
}
mysqli_close($conn);

?>