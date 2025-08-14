<!DOCTYPE html>
<html>
<head>
    <title>My Bank</title>
    <script>
        function logClick() {
            console.log(" Transfer button clicked (may be from iframe!)");
        }
        if (window !== window.top) {
    console.log(" Page is inside an iframe (possible clickjacking)");
} else {
    console.log(" Page is loaded normally (not inside iframe)");
}
    </script>
</head>
<body>
    <h2>Welcome to Shivam Bank</h2>

    <!-- Form with onsubmit event -->
    <form action="transfer.php" method="POST" onclick="logClick()">
        <input type="hidden" name="to" value="attacker" />
        <input type="hidden" name="amount" value="5000" />
        <button type="submit" style="padding: 20px; font-size: 18px;">Transfer ₹5000</button>
    </form>
</body>
</html>
