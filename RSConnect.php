<?php

  $connectionString = "host=cv-yoo2po.redshift.segment.com port=5439 dbname=events user=readonly password=a9f196fcec3244d2982062b0846dfa2aA";

  $connection = pg_connect($connectionString);
  if (!$connection) {
    echo "An error occurred.\n";
    exit;
  }

  $query = "SELECT * FROM events.legacy_web.response WHERE email LIKE '%mercy_prema@yahoo.co.in%' AND context_page_url LIKE '%iamdivya.com%'  LIMIT 100";

  $result = pg_query($connection, $query);
  if (!$result) {
    echo "An error occurred.\n";
    exit;
  }

  $number = pg_numrows($result);

  while($number)
  {
    $row = pg_fetch_row($result,($number-1));
    {
        echo '<tr>';
        echo '<td>' . $row[3] . '</td>';

        echo '</tr>';
        echo '<br>';
    }
    $number--;
  }
?>
