<html>
<head></head>
<body>
    <?php
        //include 'login.php';
        $hostname = "localhost";
        $dbname = "gopi";
        $pass = "";
        $user = "root";

        $conn = new mysqli($hostname, $user, $pass, $dbname);

        //echo $name;
		if(isset($_POST['buy']))
		{

        $phno = $_POST["Phonenumber"];

        $sqlr = "SELECT * from pizza";
        $resultr = mysqli_query($conn, $sqlr);

        if($resultr == TRUE)
        {
           // echo "<script>alert('Table register fetched !');</script>";
        }
            if(mysqli_num_rows($resultr)>0)
            {
                while($row=mysqli_fetch_assoc($resultr))
                {   
                    if($row['Phone_No'] == $phno)
                    {
                        $r = TRUE;
                        // echo "<script>alert('Registered Phonenumber')</script>";
                        break;
                    }
                    else
                    {
                        $r = FALSE;
                    }
                }   
                if($r == FALSE)
                {
                    echo "<script>
                        <!--alert('Have not registered ?');-->
                        window.location.href = 'user.html';
                        </script>";
                }
            }
        

        

        $qm = $_POST["quantitym"];
        //$ro = $_POST["rateo"];
        $qf = $_POST["quantityf"];
        //$ra = $_POST["ratea"];
        $qg = $_POST["quantityg"];
        //$rk = $_POST["ratek"];
        $qpp = $_POST["quantitypp"];
        //$rpa = $_POST["ratepa"];
        $qc = $_POST["quantityc"];
        //$rp = $_POST["ratep"];
        $qv = $_POST["quantityv"];
        //$rl = $_POST["ratel"];
        date_default_timezone_set('Asia/Kolkata');
        $d = date('Y-m-d H:i:s');

            $sql1 = "SELECT * FROM purchase";
            $result1 = mysqli_query($conn, $sql1);

            if($result1 == TRUE)
            {
               // echo "<script>alert('Table purchase fetched !');</script>";
            }

            if(mysqli_num_rows($result1)>0)
            {
                while($row=mysqli_fetch_assoc($result1))
                {
                    if($row['PizzaName']=="Margharita")
                    {
                        if($row['Quantity']<$qm)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Not enough Stock in Margharita'); 
        </script>";
                            break;
                        }
                        $m = $row['Rate']*$qm;
                        $quan_m = $row['Quantity']-$qm;
                    }

                    if($row['PizzaName']=="FarmHouse")
                    {
                        if($row['Quantity']<$qf)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Not enough Stock in FarmHouse'); 
        </script>";
                            break;
                        }
                        $f = $row['Rate']*$qf;
                        $quan_f = $row['Quantity']-$qf;
                    }

                    if($row['PizzaName']=="GreenWave")
                    {
                        if($row['Quantity']<$qg)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Not enough Stock in GreenWave'); 
        </script>";
                            break;
                        }
                        $g = $row['Rate']*$qg;
                        $quan_g = $row['Quantity']-$qg;
                    }

                    if($row['PizzaName']=="PeppyPaneer")
                    {
                        if($row['Quantity']<$qpp)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Not enough Stock in PeppyPaneer); 
        </script>";
                            break;
                        }
                        $pp = $row['Rate']*$qpp;
                        $quan_pp = $row['Quantity']-$qpp;
                    }

                    if($row['PizzaName']=="CheeseCorn")
                    {
                        
                        if($row['Quantity']<$qc)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Not enough Stock in CheeseCorn'); 
        </script>";
                            break;
                        }

                        $c = $row['Rate']*$qc;
                        //echo "<script>alert (".$p.")</script>";
                        $quan_c = $row['Quantity']-$qc;
                    }

                    if($row['PizzaName']=="VeggieParadise")
                    {
                        if($row['Quantity']<$qv)
                        {
                            echo "<script>
        window.location.href='pizza.html';
        alert('Quantity of VeggieParadise available : ".$row['Quantity']."); 
        </script>";
                            break;
                        }
                        $v = $row['Rate']*$qv;
                        $quan_v = $row['Quantity']-$qv;
                    }
                }
            }

            $sql = "INSERT into purchasepizza(Phonenumber,Datetimestamp,Margharita,FarmHouse,GreenWave,PeppyPaneer,CheeseCorn,VeggieParadise) values('$phno','$d','$qm','$qf','$qg','$qpp','$qc','$qv')";
            $result = mysqli_query($conn, $sql);

            $total=$m+$f+$g+$pp+$c+$v;

            $sql2 = "UPDATE purchasepizza SET Mrate='$m',Frate='$f',Grate='$g',Pprate='$pp',Crate='$c',Vrate='$v',Total='$total' where Phonenumber=('$phno')";
            $result2 = mysqli_query($conn, $sql2);
            

            $sql3 = "UPDATE purchase SET Quantity='$quan_m' where FruitName='Margharita'";
            $result3 = mysqli_query($conn, $sql3);

            $sql4 = "UPDATE purchase SET Quantity='$quan_f' where FruitName='FarmHouse'";
            $result4 = mysqli_query($conn, $sql4);

            $sql5 = "UPDATE purchase SET Quantity='$quan_g' where FruitName='GreenWave'";
            $result5 = mysqli_query($conn, $sql5);

            $sql6 = "UPDATE purchase SET Quantity='$quan_pp' where FruitName='PeppyPaneer'";
            $result6 = mysqli_query($conn, $sql6);

            $sql7 = "UPDATE purchase SET Quantity='$quan_c' where FruitName='CheeseCorn'";
            $result7 = mysqli_query($conn, $sql7);

            $sql8 = "UPDATE purchase SET Quantity='$quan_v' where FruitName='VeggieParadise'";
            $result8 = mysqli_query($conn, $sql8);

            if($result == TRUE && $result2 == TRUE)
            {
                /*echo "<script>
                alert('Table pizzapurchase updated !'); 
                </script>";*/
            }

            if($result3 == TRUE && $result4 == TRUE && $result5 == TRUE && $result6 == TRUE && $result7 == TRUE && $result8 == TRUE)
            {
                session_start();

                $_SESSION['datetimestamppass'] = $d;

                echo "<script>
                <!-- alert('Table purchase updated !'); -->
                window.location.href = 'bill.php';
                </script>";
            }

        }
	?>
</body>
</html>