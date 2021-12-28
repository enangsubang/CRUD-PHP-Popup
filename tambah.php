<?php
include"koneksi.php";

$gender = @$_GET['gender'];
$nis = @$_GET['nis'];
$nama = @$_GET['nama'];
$jurusan = @$_GET['jurusan'];

if(isset($_GET['simpan']))
{
	// $sql="insert into siswa set nis='$nis',nama='$nama',gender='$gender',jurusan='$jurusan'";
	$sql="insert into siswa (nis,nama,gender,jurusan) values ('$nis','$nama','$gender','$jurusan') ";
	
	$simpan_data=mysqli_query($koneksi,$sql);
	if($simpan_data)
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
		<hr>Simpan Gagal</hr>
		<?php
	}
	
}

?>

<script>
function change(a){
	
	var nis = document.getElementById("nis").value;
	var nama = document.getElementById("nama").value;
	
	window.location.href="?gender="+a+"&nis="+nis+"&nama="+nama;
}
</script>

<h2>TAMBAH DATA</h2>

<form action="" method="GET">
	
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
			<option value=""></option>
			<option value="Teknik Mesin">Teknik Mesin</option>
			<option value="Teknik Komputer">Teknik Komputer</option>
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
			<option value=""></option>
			<option value="Tata Boga">Tata Boga</option>
			<option value="Tata Busana">Tata Busana</option>
		</select>
		<br><br>
		<?php
	}
	
	?>
	
	
	<button type="submit" name="simpan">SIMPAN</button>
	
</form>
