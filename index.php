
<!DOCTYPE html>
<html>
<head>
<title>KONFIRMASI PEMBAYARAN</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], input[type=email], input[type=number], select, textarea {
  width: 90%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 50%;
  align: center;

}
</style>
<script type="text/javascript">
 function wajibAngka(evt) {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 }
</script>
</head>
<body>
<div align="center" class="container">
    <h2 align="center">KONFIRMASI PEMBAYARAN</h2>


        <form action="proses.php" enctype="multipart/form-data" method="post">
		<table>
            <tr>
			<td><label>Nama Lengkap</label></td>
            <td>: <input type="text" name="name" placeholder="Nama Anda" required=""></td>
            </tr>
			<tr>
			<td><label>Email </label></td>
            <td>: <input type="email" name="email" placeholder="email@example.com" required=""></td>
            </tr>
			<td></td>
			<td>*Isi dengan email yang digunakan saat pembelian</td>
			</tr>
			<tr>
			<td><label>Nomor Tagihan</label></td>
            <td>: #<input onkeypress="return wajibAngka(event)" maxlength="5" type="number" style="width:100px" name="nomor" placeholder="Contoh: 5618" required=""/></td>
             </tr>
			    </tr>
			<td></td>
			<td>*Apa itu Nomor Tagihan ? <a href="https://www.fawzya.net/blog/nomor-tagihan/">Klik disini !</a></td>
			</tr>
			<tr>
			<td><label>Jumlah Transfer</label></td>
            <td>: Rp. <input onkeypress="return wajibAngka(event)"  type="text" style="width:100px" type="text" name="jumlah" placeholder="total..." required=""></td>
			 </tr>
			<tr>
			<td><label>Metode Pembayaran</label></td>
            <td>: <select name="metode" required>
			    <option value="">---</option>
				<option value="Bank BCA">Bank BCA</option>
				<option value="Bank BRI">Bank BRI</option>
				<option value="Telkomsel Pulsa">Pulsa Telkomsel</option>
				
			</select></td>
			 </tr>
			<tr>
			<td><label>Bukti Pembayaran</label></td>
			<td><input type="hidden" name="MAX_FILE_SIZE" 
    value="500000">
   : <input type="file" name="file_user" size="60" required=""> </td>
			</tr>
			<tr>
			<td></td>
			<td>*Wajib Upload bukti transfer untuk verifikasi (File Size Maks.1MB)</td>
			</tr>
			</table>
			<br>
			<p align="center">
			<i>Harap Isi Nomor Tagihan dan Email sesuai pada saat order, Pengisian Nomor tagihan yang salah akan menghambat proses Pembayaran</i><br>
			<input type="checkbox" name="" required="" value="YA, Saya Setuju">Ya, Saya Setuju<br>
		
			<BR><br>
            <input ALIGN="CENTER" type="submit" name="submit" value="KONFIRMASI">
				</p>
            <div class="clear"> </div>
        </form>
    </div>
</div>
</body>
</html>
