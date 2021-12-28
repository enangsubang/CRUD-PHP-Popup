<?php
include"koneksi.php";

if(isset($_GET['hapus']))
{
	$id=$_GET['id'];
	$sql="delete from siswa where id='$id'";
	$hapus_data=mysqli_query($koneksi,$sql);
	if($hapus_data)
	{
		?>
		<script>
			window.location.href="?";
		</script>
		<?php
	}
	
}

?>


<script>
 var myWindow=window.open(url, "pop", "width=600, height=600");
 if (window.focus){myWindow.focus()}
function pop_sm(a) {
	openCenteredWindow({
		url: a, 
		width: 500, 
		height: 600
	}).focus();
}
 
function pop_md(a) {
	openCenteredWindow({
		url: a, 
		width: 1000, 
		height: 800
	}).focus();
}
 
function pop_lg(a) {
	openCenteredWindow({
		url: a, 
		width: 2500, 
		height: 1600
	}).focus();
}
 
function openCenteredWindow({url, width, height}) {
    const pos = {
        x: (screen.width / 2) - (width / 2),
        y: (screen.height/2) - (height / 2)
    };
 
    const features = `width=${width} height=${height} left=${pos.x} top=${pos.y}`;
 
    return window.open(url, 'popup', features);
}
 
function hapus(id)
{
	if(confirm("Yakin Hapus data?"))
	{
		window.location.href="?hapus&id="+id;
	}
}
</script>


<a onclick="pop_md('tambah.php')"><button>TAMBAH DATA</button></a>
<br><br>

<table border='1' width="100%" style="border-collapse:collapse" cellpadding="5">
	<tr style="background-color:teal;color:white">
		<td>No</td>
		<td>NIS</td>
		<td>NAMA</td>
		<td>GENDER</td>
		<td>JURUSAN</td>
		<td>Aksi</td>
	</tr>
	<?php
	$no=1;
	$sql="select * from siswa";
	$query=mysqli_query($koneksi,$sql);
	while($row=mysqli_fetch_array($query))
	{
	?>
	<tr>
		<td><?=$no?></td>
		<td><?=$row['nis']?></td>
		<td><?=$row['nama']?></td>
		<td><?=$row['gender']?></td>
		<td><?=$row['jurusan']?></td>
		<td>
			<button onclick="pop_md('edit.php?id=<?=$row['id']?>')">Edit</button>
			<button onclick="hapus('<?=$row['id']?>')">Hapus</button>
		</td>
	</tr>
	<?php	
	$no++;
	}
	
	?>
	
</table>







