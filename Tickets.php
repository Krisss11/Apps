<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Практически Изпит - PHP</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; } 
        .container { background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 400px; } 
        h2 { color: #333; text-align: center; margin-bottom: 1.5rem; border-bottom: 2px solid #007bff; padding-bottom: 10px; } 
        label { display: block; margin: 12px 0 5px; font-weight: bold; color: #555; font-size: 0.9rem; } 
        .option-group { background: #f8f9fa; padding: 10px; border-radius: 6px; border: 1px solid #eee; margin: 10px 0; } 
        .option-group label { display: inline-flex; align-items: center; font-weight: normal; cursor: pointer; margin: 5px 15px 5px 0; } 
        .option-group input { width: auto; margin-right: 8px; } 
        input[type="number"], input[type="text"], input[type="password"], select { width: 100%; padding: 12px; margin: 8px 0; border: 1.5px solid #ddd; border-radius: 6px; box-sizing: border-box; transition: border-color 0.3s; } 
        input:focus, select:focus { border-color: #007bff; outline: none; box-shadow: 0 0 5px rgba(0, 123, 255, 0.2); } 
        button { width: 100%; padding: 14px; margin-top: 20px; border: none; border-radius: 6px; background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; font-size: 16px; font-weight: bold; cursor: pointer; transition: opacity 0.3s; } 
        button:hover { opacity: 0.9; } 
        .result { margin-top: 20px; padding: 15px; border-radius: 6px; background: #d4edda; color: #155724; border-left: 5px solid #28a745; font-weight: 500; } 
        .error { background: #f8d7da; color: #721c24; border-left: 5px solid #dc3545; padding: 15px; border-radius: 6px; margin-top: 20px;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Примерна Универсална Форма</h2>
        <form method="POST">
            <!-- Radio бутони (избор на една опция) -->
            <label>Изберете опция:</label>
            <div class="option-group">
                <label><input type="radio" name="radio_option" value=10> 2D</label>
                <label><input type="radio" name="radio_option" value=14> 3D</label>
                <label><input type="radio" name="radio_option" value=18> 4DX</label>
            </div>

            <!-- Checkbox (избор на няколко опции) -->
            <label>Изберете допълнителни опции:</label>
            <div class="option-group">
                <label><input type="checkbox" name="checkbox_options[]" value=5> Пуканки</label>
                <label><input type="checkbox" name="checkbox_options[]" value=3> Напитка</label>
                <label><input type="checkbox" name="checkbox_options[]" value=2> 3D очила</label>
            </div>
            <button type="submit">Изпрати</button>
        </form>
    </div>
    <?php 
 $totalPrice = 0;

            
            $totalPrice += (int)$_POST['radio_option'];
  
        $arr=$_POST['checkbox_options[]'];
        foreach($arr as $value){
            var_dump($value);
            $totalPrice += (int)$value;
        }
            
        
      
      
    
       echo "<div class='result'>Общата цена е: " . $totalPrice . " лв.</div>";   
    ?>
</body>
</html>