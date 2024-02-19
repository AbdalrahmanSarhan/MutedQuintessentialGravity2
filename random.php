<?php
function successfulCompanies($previousCompany, $successRate)
{
    $remaind_companies = []; // الشركات المتبقية بعد نهاية الجولة
    foreach ($previousCompany as $key => $value) {
        $previousCompany[$key] = rand(0, 100);
    }
    foreach ($previousCompany as $key => $value) {
        if ($previousCompany[$key] <= $successRate) {//فلترة الشركات 
            $remaind_companies[$key] = $value;
        }
    }
    return $remaind_companies;
}
