<?php

include 'random.php';

$company = [//الشركات المؤهلة 
  "Edraak" => 0, "Meta" => 0, "w3school" => 0, "Netflex" => 0, "Alphabet " => 0, "Apple" => 0, "Microsoft" => 0,
    "Amazon " => 0, "Tencent " => 0, "Alibaba" => 0, "TSMC" => 0, "Nvidia " => 0, "Yahoo" => 0, "Samsung  " => 0, "Huawei" => 0,
    "Asus" => 0, "Apollo Global" => 0, "Hp" => 0, "Msi" => 0, "dell"  => 0
];
$successRate = 50;
$winCompany = "";//الشركة الناجحة قبل البدء بالماسبقة


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competition</title>

    <!--  البوتستراب التصميم  -->
  <!--ttps://getbootstrap.com-->
  
<!--    css لكي نستدعي تنسيقات 
  css   الجاهزة في البوتستراب يجب نسخ لينك مكتبة  -->
 <!-- https://getbootstrap.com/docs/5.1/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!-- الديف الرئيسية -->
    <div class="container" style="padding-top: 50px;">
        <!-- ديف لتقسيم الصفحة -->
        <div class="row">
            <!-- ديف لحجز كامل الصفحة -->
            <div class="col-md-12">
                <!-- ديف ستايل كرت -->
                <div class="card">
                    <!-- ديف ترويسة كرت -->
                    <div class="card-header row" style="margin-left: 0px;margin-right: 0px;">
                        <h3 style="display: inline;"> Competition</h3>
                    </div>
                    <hr>
                    <!-- ديف لجسم الكرت -->
                    <div class="card-body">
                        <!-- الجدول --><!-- https://getbootstrap.com/docs/5.1/content/tables/? -->
                        <table class="table table-striped table-hover">
                            <!-- ترويسية الجدول -->
                            <thead>
                                <!-- سطر ضمن الترويسة -->
                                <tr>
                                    <!-- خلية ضمن السطر -->
                                    <td>company name</td>
                                    <td>rate</td>
                                </tr>
                            </thead>
                            <!-- جسم الجدول -->
                            <tbody>
                                <tr style="background-color: orange;font-size: larger;">
                                    <!-- أول خلية -->
                                    <td>Success Rate:</td>
                                    <!-- ثاني خلية -->
                                    <td> <?php echo $successRate;  ?> %</td>
                                </tr>
                                <?php //html in php loop -> https://www.ntchosting.com/encyclopedia/scripting-and-programming/php/php-in/
                                while (count($company) > 1) {
                                    // شركات الدورة السابقة مع تقييماتها
                                    $previousCompany = $company;
                                    // --------------------------------
                                    // شركات الدورة الحالية
                                    $company =  successfulCompanies($previousCompany, $successRate);
                                    foreach ($company as $key => $value) { ?>

                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td><?php echo $value ?></td>
                                </tr>
                                <?php
                                        // البداية
                                        $winCompany =  $key;
                                    }
                                    if (count($company) == 0) {
                                        // تعيد مصفوفة تحوي مفاتيح اصحاب اصغر قيم
                                        $company_min = array_keys($previousCompany, min($previousCompany));
                                    ?>
                                <tr>
                                    <td><?php echo $company_min[0] ?></td>
                                    <td><?php echo $previousCompany[$company_min[0]] ?></td>
                                </tr>
                                <?php
                                        // في الحالة الخاصة
                                        $winCompany = $company_min[0];
                                    }
                                    $successRate = $successRate / 2;

                                    // إذا كان هناك دورة اخرى اطبع معدل الاجتياز
                                    // أي اذا كان هناك أكثر من شركة باقية في المسابقة
                                    if (count($company) > 1) { ?>
                                <tr style="background-color: orange;font-size: larger;">
                                    <td>Success Rate:</td>
                                    <td> <?php echo $successRate;  ?> %</td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td style="background-color: orange;font-size: larger;"></td>
                                    <td style="background-color: orange;font-size: larger;"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: x-large;font-weight: bolder;">congratulations for winning:
                                    </td>
                                    <td style="font-size: x-large;color: red;">
                                        <!-- تعريض اسم الشركة الناجحة -->
                                        <strong><?php echo  $winCompany  ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>