<?php
function showTree($lvl=5) {
    $flag = @opendir(".");
    if (!$flag) return;
    while (($element=readdir($flag)) !== false) {
        if ($element=='.' || $element=='..') continue;
        if (!@is_dir($element))
        {
            for ($i=0; $i<$lvl; $i++)
                echo "  ";
            echo "$element\n";
            continue;
        }
        for ($i=0; $i<$lvl; $i++) echo "  ";
        echo "$element\n";
        if (!chdir($element)) continue;
        showTree($lvl+1);
        chdir("..");
        flush();
    }
    closedir($flag);
}
echo "\n";
showTree();