<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- -- Semantic-UI CSS & JS files included here -- -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/button.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/table.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.css">
<style type="text/css">
    div.ui.dropdown{
        min-height: 1em !important;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.js"></script>

<h1>Settings</h1>
<?php
global $wpdb;
$user_id = get_current_user_id();
if(isset($_POST["submit"])){
    $data["payee_name"] = $_POST["payee_name"];
    $data["upi_link"] = $_POST["upi_link"];
    $data["amount"] = $_POST["amount"];
    $data["upi_slug"] = $_POST["upi_slug"];
    foreach ($data as $key => $value) {
        update_option($key, $value);
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <table class="ui collapsing striped table">
        <tr>
            <td>Payee Name</td>
            <td><input type="text" name="payee_name" >
            </td>
        </tr>
        <tr>
            <td>UPI ID</td>
            <td><input type="text" name="upi_link" >
            </td>
        </tr>
        <tr>
            <td>Amount</td>
            <td><input type="text" name="amount" >
            </td>
        </tr>
        <tr>
            <td>Slug / keyword in URL</td>
            <td><input type="text" name="upi_slug">
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save" class="ui blue mini button"></td>
        </tr>
    </table>
</form>
<?php
$data["payee_name"] = get_option("payee_name");
$data["upi_link"] = get_option("upi_link");
$data["amount"] = get_option("amount");
$data["upi_slug"] = get_option("upi_slug");
if (!$data["upi_slug"]) {
    $data["upi_slug"] = 'pay';
}
?>
<script type="text/javascript">
    jQuery('input[name=payee_name]').val('<?php echo $data["payee_name"]; ?>');
    jQuery('input[name=upi_link]').val('<?php echo $data["upi_link"]; ?>');
    jQuery('input[name=amount]').val('<?php echo $data["amount"]; ?>');
    jQuery('input[name=upi_slug]').val('<?php echo $data["upi_slug"]; ?>');
</script>

<pre>[donation_qr] Use this shortcode to display QR Code in any page or post.</pre>
<h2>Send these links through mobile to users. It will directly go to Phonepe or Gpay</h2>
<pre><?php echo site_url().'?'.$data["upi_slug"]; ?></pre>
<pre><?php echo site_url().'?'.$data["upi_slug"]; ?>=200</pre>
<pre><?php echo site_url().'?'.$data["upi_slug"]; ?>=500</pre>