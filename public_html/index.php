<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JUDOL GASAK MIRING</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background: #f5f5f5;
    }

    nav {
      background-color: #2c3e50;
      display: flex;
    }

    nav a {
      flex: 1;
      padding: 14px;
      color: white;
      text-align: center;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    nav a:hover {
      background-color: #34495e;
    }

    iframe {
      width: 100%;
      height: calc(100vh - 48px);
      border: none;
    }
  </style>
  <script>
    function switchIframe(url) {
      document.getElementById('main-frame').src = url;
    }
  </script>
</head>
<body>

  <nav>
    <a href="#" onclick="switchIframe('https://ejurnal.unila.ac.id/index2.php')">CLUSTER ANGLING-DHARMA</a>
    <a href="#" onclick="switchIframe('https://iccteie.eng.unila.ac.id/GACHOR/')">CLUSTER EMPU-GANDRING</a>
    <a href="#" onclick="switchIframe('https://lppm.unila.ac.id/RISETGACOR/')">PETA IP ADDRESS JUDOL GACHOR</a>
  </nav>

  <iframe id="main-frame" src="https://ejurnal.unila.ac.id/index2.php"></iframe>
//kontrol
</body>
</html>

