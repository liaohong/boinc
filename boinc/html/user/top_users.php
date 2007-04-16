<?php {
    require_once("../inc/db.inc");
    require_once("../inc/util.inc");
    require_once("../inc/user.inc");

    $authenticator = init_session();
    db_init();
    $numusers = 100;
    page_head("Top $numusers users");
    $sort_by = $_GET["sort_by"];
    if ($sort_by == "total_credit") {
        $sort_by = "total_credit desc, total_credit desc";
    } else {
        $sort_by = "expavg_credit desc, total_credit desc";
    }
    $result = mysql_query("select * from user order by $sort_by limit $numusers");
    row1("Users", 6);
    user_table_start();
    $i = 0;
    while ($user = mysql_fetch_object($result)) {
        show_user_row($user, ++$i);
    }
    echo "</table>\n";
    page_tail();
} ?>
