<?php

$data = array('COMPUTER ARCHITECTURE,COMPUTER PROGRAMMING,DATA STRUCTURE & ALGORITHM,DATABASE SYSTEM,INTRO TO INFORMATION TECH,OBJECT-ORIENTED PROGRAM,SYSTEM ANALYSIS & DESIGN,WEB  PROGRAMMING,COMPUTER GRAPHICS,Class',
                    '-1,1,-1,0,1,-1,-1,-1,-1,1',
                    '0,1.5,0,1,1.5,0,0,1,0,2',
                    '1,2,1,1.5,2,1,1,1.5,1,3',
                    '1.5,2.5,1.5,2,2.5,1.5,1.5,2,1.5,3',
                    '2,3,2,2.5,3,2,2,2.5,2,2',
                    '2.5,3.5,2.5,3,3.5,2.5,2.5,3,2.5,1',
                    '3,4,3,3.5,4,3,3,3.5,3,3',
                    '3.5,2.5,3.5,4,2.5,3.5,3.5,4,3.5,2',
                    '4,1,4,2.5,1.5,4,4,-1,4,1',
                    '2.5,1,3,1,2.5,1,3,1.5,1,?');

$fp = fopen('unseen_maker.csv', 'w');
foreach ($data as $line) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);


$convert_cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader unseen_maker.csv > unseen_data.arff -N "1-last"';
exec($convert_cmd, $output);



$cmd = 'java -classpath "weka.jar" weka.classifiers.lazy.KStar -T "unseen_data.arff" -l "Model_KStar.model" -p 10';
exec($cmd , $output1);

for ($i = 0; $i < sizeof($output1); $i++)    
    {
        trim($output1[$i]);
        echo $output1[$i] . "<br>";
    }
