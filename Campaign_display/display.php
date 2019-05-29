<?php
        $url = "http://localhost/compagin/api/Data/read.php";
        $data = json_decode(file_get_contents($url), true);
        $array=array();
        $array2=array(array());
        $array[$data[0]['country']]=1;
        $array2[$data[0]['country']][$data[0]['category']]=1;
        $i=0;
		//analysis part and this analysis is sort every country with his category 
        foreach ($data as $value) {
              $k=0;
            foreach($array as $key=>$value1)
             {
                
                if($value['country']!==$key)
                {
                    $k=1;
                }     
                else{$k=0;break;}
                       
             }
             if($k==1)
             {
               $array[$value['country']]=1;
               $array2[$value['country']][$value['category']]=1;
               continue;
             }
             else {
               $array[$key]++;
               if(empty($array2[$value['country']][$value['category']]))
               {
                   $array[$value['country']]=1;
                   $array2[$value['country']][$value['category']]=1;
               }
               else
               {
                   if($i==0){$i=1; continue;}        
                   $array2[$value['country']][$value['category']]++;
               }
               
           }
             
        }
       
        foreach($array as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }

        print_r($array2);

?>
/*
this is a histogram code that i was want to use 
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>

  <div id="myDiv">
    <!-- Plotly chart will be drawn inside this DIV -->
  </div>
  <script>
    x = []
    x.push("<?php echo $array[0]?>")
    x.push("apps")
y = ["5","10","3","10","5","3","10","5"]
y.push("8")

data = [
  {
    histfunc: "count",
    y: y,
    x: x,
    type: "histogram",
    name: "count"
  },
  {
    histfunc: "sum",
    y: y,
    x: x,
    type: "histogram",
    name: "sum"
  }
]

Plotly.plot("myDiv", data, {}, {showSendToCloud: true})
  </script>
</body>

</html>
*/