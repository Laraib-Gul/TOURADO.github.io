<?php
 $conn = mysqli_connect("localhost", "root", "", "tourado");
 $query = "SELECT * From questionnaire ORDER BY qid DESC Limit 1";
 $query_run = mysqli_query($conn, $query);
 if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) { 
if($row["qdays"] < 6)
{
    if($row["qarea"] == 'Snowy Area')
    {
        if($row["qdays"] < 2.5 && $row["qbudget"] >= 5000)
        {
            header('location:Snowy_1.html');
        }
        else if($row["qdays"] >= 2.5 && $row["qbudget"] <= 20000)
        {
            header('location:Snowy_1.html');
        }
        else
        {
            header('location:pkg.html');
        }
    }

    else if($row["qarea"] == 'Historical Area')
    {
        if($row["qdays"] < 2.5 && $row["qbudget"] >= 17333)
        {
            header('location:HistoricalAreas1_3.html');
        }
        else if($row["qdays"] >= 2.5 && $row["qbudget"] <= 20000)
        {
            header('location:HistoricalAreas1_3.html');
        }
        else
        {
            header('location:pkg.html');
        }
    }

    else if($row["qarea"] == 'Hilly Area')
    {
        if($row["qdays"] < 2.5 && $row["qbudget"] >= 5000 && $row["qbudget"] < 20000)
        {
            header('location:HillyAreas1_3.html');
        }
        else
        {
            header('location:pkg.html');
        }
       
    }
    else
    {
        header('location:pkg.html');
    }
}
else if($row["qdays"] >= 6)
{
    if($row["qarea"] == 'Snowy Area')
    {
        if($row["qbudget"] >= 33200)
        {
            header('location:Snowy_4.html');
        }
        else
    {
        header('location:pkg.html');
    }
    }

    else if($row["qarea"] == 'Historical Area')
    {
        if($row["qbudget"] >= 31000)
        {
            header('location:HistoricalAreas4_6.html');
        }
        else
        {
            header('location:pkg.html');
        }
    }

    else if($row["qarea"] == 'Hilly Area')
    {
        if($row["qdays"] >= 4 && $row["qbudget"] >= 24400)
        {
            header('location:HillyAreas8_10.html');
        }
        else
        {
            header('location:pkg.html');
        }
    }
    else
{
    header('location:pkg.html');
}
}
else
{
    header('location:pkg.html');
}
}
}
