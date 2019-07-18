<?php
	//Upload Files
	

  $file_user = $_FILES["file_user"]["tmp_name"];
  $namafile = $_FILES["file_user"]["name"];
  $pwd = bin2hex(openssl_random_pseudo_bytes(4));
  $tujuan = "img/$pwd.png";
  $nomor = $_POST['nomor'];


  if ($file_user != "none") {
    copy($file_user, $tujuan);
    echo "<h2>Silahkan ditunggu.</h2>";
	echo "<p style='  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;'>Saat ini Pembayaran Tagihan No #$nomor Sedang dalam Pemeriksaan. <br> Waktu Proses pesanan paling cepat 1 jam dan paling lambat 24 jam, tergantung antrian <br>Jika Dalam 24 Jam belum ada balasan ke email anda, silahkan hubungi WhatsApp 085799054816 !</p>";
//	echo "File User: $file_user<br />";
//	echo "Tujuan: $tujuan <br>";
 	chmod($tujuan, 0755);
// echo "<img src='http://fawzya.net/form/$tujuan'>";
  } else {
    echo "<h3>Upload Error!</h3>";
    echo "Anda belum memilih file yang akan di-upload.";
  }
 
date_default_timezone_set('Asia/Jakarta');
$waktu = date('d-m-Y H:i:s'); // Hasil: 20-01-2017 05:32:15
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
	

	
    // Get the submitted form data
 
    $name = $_POST['name'];
    $email = $_POST['email'];
	$nomor = $_POST['nomor'];
	$jumlah = $_POST['jumlah'];
	   $metode = $_POST['metode'];


 
    // Cek apakah ada data yang belum diisi
    if(!empty($email) && !empty($name)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClassk = 'errordiv';
        }else{
            // Pengaturan penerima email dan subjek email
            $toEmail = 'ozikhacker@gmail.com'; // Ganti dengan alamat email yang Anda inginkan
            $emailSubject = 'Konfirmasi Transfer '.$nomor;
            $htmlContent = '<h2> Hallo, <b>'.$name.'</b> Telah melakukan Pembayaran dengan Informasi Sebagai berikut </h2>
			    <br><br>
               <table>
					<tr>
					<td>Total</td>
					<td>: Rp.'.$jumlah.'</td>
					</tr>
					<tr>
					<td>Nomor Tagihan</td>
					<td>: '.$nomor.'</td>
					</tr>
					<tr>
					<td>Metode Pembayaran</td>
					<td>: '.$metode.'</td>
					</tr>
					<tr>
					<td>Alamat Email</td>
					<td>: '.$email.'</td>
					</tr>
					<tr>
					<td>Waktu Konfirmasi</td>
					<td>: '.$waktu.'</td>
					</tr>							
			   </table>
				<br>
				Segera proses order sekarang >> https://client.fawzya.net/admin/invoices.php?action=edit&id='.$nomor.'#tab=2 <br>
                <p><img src="http://fawzya.net/konfirmasi/'.$tujuan.'"/></p>';
          
            // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Header tambahan
            $headers .= 'From: '.$name.'<billing@fawzya.net>'. "\r\n";

    
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Terimakasih anda telah melakukan konfirmasi Pembayaran pada '.$waktu.'';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Harap mengisi semua field data';
        $msgClass = 'errordiv';
    }
}

?>
<html>
        <?php if(!empty($statusMsg)){ ?>
            <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
</html>
