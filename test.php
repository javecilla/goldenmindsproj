
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    require_once __DIR__ . '/assets/api/class/view/admission.view.class.php';
    $view = new AdmissionView();
    $view->showData();
  ?>

  <form action="test.php" method="POST">
    <input type="text" id="input1">
    <input type="text" id="input2">
    <button type="button" id="submit" >click</button>
  </form>
  
  <script>
    function isEmpty(field) {
      return field === '';
    }

    document.getElementById('submit').addEventListener('click',
      function(e) {
        e.preventDefault();
        var input2 = document.getElementById('input2').value;
        if(isEmpty(input2)) {
          alert("Emppty!");
        }
      }
    );
 
  </script>
</body>
</html>