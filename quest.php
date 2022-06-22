<?php
 $conn = mysqli_connect("localhost", "root", "", "tourado");
 $query = "SELECT * From questionnaire ORDER BY qid DESC Limit 1";
 $query_run = mysqli_query($conn, $query);
 if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) { 
            if($row["qarea"] == 'Snowy Area')
            {
                if($row["qdays"] == 1 && $row["qbudget"] == 5000)
                    {
                    header('location:Snowy_1.html');
                    }

                   else if($row["qdays"] == 4 && $row["qbudget"] == 20000)
                    {
                    header('location:Snowy_4.html');
                    }
                    else if($row["qdays"] == 8 && $row["qbudget"] >= 42000)
                    {
                    header('location:Snowy_8.html');
                    }

                    else if($row["qdays"] == 1 && $row["qbudget"] == 20000)
                    {
                        header('location:Snowy_1-3_20-40.html');
                    }
                    else if($row["qdays"] == 4 && $row["qbudget"] == 5000)
                    {
                        header('location:Snowy_4-6_5-18.html');
                    }
                    else if ($row["qdays"] == 4 && $row["qbudget"] >= 42000)
                    {
                        header('location:Snowy_4-6_42.html'); 
                    }
                    else if ($row["qdays"] == 8 && $row["qbudget"] == 5000)
                    {
                        header('location:Snowy_8-10_5-18.html');
                    }
                    else if ($row["qdays"] == 8 && $row["qbudget"] == 20000)
                    {
                        header('location:Snowy_8-10_20-40.html'); 
                    }
                    else 
                    {
                    header('location:Snowy_1-3_42.html');
                    }
            
                   
            }
           else if($row["qarea"] == 'Historical Area')
            {
                if($row["qdays"] == 1 && $row["qbudget"] == 5000)
                    {
                    header('location:HistoricalAreas1_3.html');
                    }

                   else if($row["qdays"] == 4 && $row["qbudget"] == 20000)
                    {
                    header('location:HistoricalAreas4_6.html');
                    }
                    else if($row["qdays"] == 8 && $row["qbudget"] >= 42000)
                    {
                    header('location:HistoricalAreas8_10.html');
                    }
                    else if($row["qdays"] == 1 && $row["qbudget"] == 20000)
                    {
                        header('location:HistoricalAreas1_3(20-40k).html');
                    }
                    else if($row["qdays"] == 4 && $row["qbudget"] == 5000)
                    {
                        header('location:HistoricalAreas4_6(5-18k).html');
                    }
                    else if ($row["qdays"] == 4 && $row["qbudget"] >= 42000)
                    {
                        header('location:HistoricalAreas4_6(42k).html'); 
                    }
                    else 
                    {
                    header('location:HistoricalAreas1_3Below42.html');
                    }
            }
           else if($row["qarea"] == 'Hilly Area')
            {
                if($row["qdays"] == 1 && $row["qbudget"] == 5000)
                    {
                    header('location:HillyAreas1_3.html');
                    }

                   else if($row["qdays"] == 4 && $row["qbudget"] == 20000)
                    {
                    header('location:HillyAreas4_6.html');
                    }
                    else if($row["qdays"] == 8 && $row["qbudget"] >= 42000)
                    {
                    header('location:HillyAreas8_10.html');
                    }
                    else if($row["qdays"] == 1 && $row["qbudget"] == 20000)
                    {
                        header('location:HillyAreas1_3(20-40).html');
                    }
                    else if($row["qdays"] == 4 && $row["qbudget"] == 5000)
                    {
                        header('location:HillyAreas4_6(5-18).html');
                    }
                    else if ($row["qdays"] == 4 && $row["qbudget"] >= 42000)
                    {
                        header('location:HillyAreas4_6(42).html'); 
                    }
                    else if ($row["qdays"] == 8 && $row["qbudget"] == 5000)
                    {
                        header('location:HillyAreas8_10(5-18).html'); 
                    }
                    else if ($row["qdays"] == 8 && $row["qbudget"] == 20000)
                    {
                        header('location:HillyAreas8_10(20-40).html'); 
                    }
                    else 
                    {
                    header('location:HillyAreas1_3(42).html');
                    }
            }
            else 
            {
            header('location:pkg.html');
            }

     }

     }
