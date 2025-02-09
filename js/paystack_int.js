const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_8481a8116a3a2fbd71c415cf95b7cce72f53adf8', // Replace with your public key
    email: document.getElementById('email-address').value,
    first_name: document.getElementById('first-name').value,
    last_name: document.getElementById('last-name').value,
    // amount: document.getElementById("amount").value * 100,
    amount: 80000 * 100,
    ref: 'TranscriptFee' + Math.floor(Math.random() * 1000000000 + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function () {
      window.location =
        'https://localhost/food-order/index.php?error=TransactionCanceled';
      alert('Transaction Cancelled');
    },
    callback: function (response) {
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location =
        'https://localhost/food-order/verify_transaction.php?reference=' +
        response.reference;
    },
  });
  handler.openIframe();
}
