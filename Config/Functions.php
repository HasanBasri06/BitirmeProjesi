<?php 

    function inputSecurity($value){

        $stageOne       = $value;
        $stageTwo       = trim($stageOne);
        $stageThree     = htmlspecialchars($stageTwo);
        $stageFour      = addslashes($stageThree);

        $stageFinish    = $stageFour;

        return $stageFinish;
    }

