<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Page Example</title>
  <style>
    @media print {
      body {
        font-size: 12pt;
        line-height: 1.6;
      }
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="no-print">
    <button onclick="printPage()">Print this page</button>
  </div>
  <div>
    <h1>Welcome to the Print Page Example</h1>
    <p>This content will be printed.</p>
    <p class="no-print">This content will not be printed.</p>
  </div>
  <script>
    function printPage() {
      window.print();
    }
  </script>
</body>
</html>
