<?php
include"koneksi.php";

$id = @$_REQUEST['id'];
$gender = @$_GET['gender'];
$nis = @$_GET['nis'];
$nama = @$_GET['nama'];
$jurusan = @$_GET['jurusan'];


if(isset($_GET['edit']))
{
	$sql="update siswa set nis='$nis',nama='$nama',gender='$gender',jurusan='$jurusan' where id='$id'";
	$ubah_data=mysqli_query($koneksi,$sql);
	if($ubah_data)
	{
		?>
		<script>
			window.close();
			window.opener.location.reload();
		</script>
		<?php
	}
	else
	{
		?>
		<hr>Update Gagal</hr>
		<?php
	}
}



$sql="select * from siswa where id='$id'";
$query=mysqli_query($koneksi,$sql);
while($row=mysqli_fetch_array($query))
{
	$nis=$row['nis'];
	$nama=$row['nama'];
	$gender=$row['gender'];
	$jurusan=$row['jurusan'];
	
}

?>


<script>
function change(a){
	
	var nis = document.getElementById("nis").value;
	var nama = document.getElementById("nama").value;
	
	window.location.href="?gender="+a+"&nis="+nis+"&nama="+nama;
}
</script>

<h2>UPDATE DATA</h2>

<form action="" method="GET">
	
	<input type="hidden" name="id" value="<?=$id?>">
	
	NIS
	<br>
	<input id="nis" type="number" name="nis" required value="<?=$nis?>">
	<br><br>
	
	NAMA
	<br>
	<input id="nama" type="text" name="nama" required value="<?=$nama?>">
	<br><br>
	
	GENDER
	<br>
	<select name="gender" onchange="change(this.value)" required>
		<option value="" <?php if($gender==""){echo"selected";} ?>></option>
		<option value="L" <?php if($gender=="L"){echo"selected";} ?> >Laki-laki</option>
		<option value="P" <?php if($gender=="P"){echo"selected";} ?>>Perempuan</option>
	</select>
	<br><br>
	
	<?php
	if($gender=="L")
	{
		?>
		JURUSAN
		<br>
		<select name="jurusan" required>
			<option value="" <?php if($jurusan==""){echo"selected";} ?>></option>
			<option value="Teknik Mesin" <?php if($jurusan=="Teknik Mesin"){echo"selected";} ?>>Teknik Mesin</option>
			<option value="Teknik Komputer" <?php if($jurusan=="Teknik Komputer"){echo"selected";} ?>>Teknik Komputer</option>
		</select>
		<br><br>
		<?php
	}
	else if($gender=="P")
	{
		?>
		JURUSAN
		<br>
		<select name="jurusan" required>
			<option value="" <?php if($jurusan==""){echo"selected";} ?>></option>
			<option value="Tata Boga" <?php if($jurusan=="Tata Boga"){echo"selected";} ?>>Tata Boga</option>
			<option value="Tata Busana" <?php if($jurusan=="Tata Busana"){echo"selected";} ?>>Tata Busana</option>
		</select>
		<br><br>
		<?php
	}
	
	?>
	
	
	<button type="submit" name="edit">UPDATE</button>
	
</form>
