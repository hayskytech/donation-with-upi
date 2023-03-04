<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<div id="qrcode"></div>
<script type="text/javascript">

pa = '<?php echo get_option('upi_link'); ?>';
pn = '<?php echo get_option('payee_name'); ?>';
am = '<?php echo get_option('amount'); ?>';

url = 'upi://pay?pa=' + pa + '&pn=' + pn + '&cu=INR&am=' + am

new QRCode(document.getElementById("qrcode"), url);

</script>

<style type="text/css">
	#qrcode canvas{
		display: inline !important;
	}
	#qrcode img{
		display: none !important;
	}
</style>