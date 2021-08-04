<h1>Page 1 [Home]</h1>

<h3>Digital Wallet</h3>

<p>
    1. <a href="/final/interactive-digital-wallet/views/digital-wallet-1.php">Home</a>
    &nbsp;
    2. <a href="/final/interactive-digital-wallet/views/digital-wallet-2.php">Transaction History</a>
</p>

<h3>Fund Transfer:</h3>

<form method="post">

    <label for="from">From:</label>
    <input type="text" id="from" name="from" required><br><br>

    <label for="to">To:</label>
    <input type="text" id="to" name="to" required><br><br>

    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required><br><br>


    <input type="submit" value="Submit">

    <p id="errormsg">

    </p>
</form>

<script>
document.querySelector('#form').addEventListener('submit', function(e) {
    e.preventDefault();
    console.log("Entered fetch function");
    var xhttp = new XMLHttpRequest();
    var from, to, amount;


    xhttp.onreadystatechange = function() {
        console.log("Inside xhttp onreadystatechange func");
        if (this.readyState == 4 && this.status == 200) {
            from = document.getElementById("from").innerHTML;
            to = document.getElementById("to").innerHTML;
            amount = document.getElementById("amount").innerHTML;

            if (from == null || from == "") {
                document.getElementById("errormsg").innerHTML = "Emty from address";
            } else if (to == null || to == "") {
                document.getElementById("errormsg").innerHTML = "Empty to address";
            } else if (amount == null || amount=="0" || amount == "") {
                document.getElementById("errormsg").innerHTML = "Invalid amount";
            }  else {
                window.location.replace("digital-wallet-2.php");
            }
        }
    };

    xhttp.open("POST", "../operations/digital_wallet_page1_client.php", true);
    xhttp.send();



});
</script>