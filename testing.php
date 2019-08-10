<?php


		$list = array
		(
		"age,sex,cp,trestbps,chol,fbs,restecg,thalach,exang,oldpeak,slope,ca,thal",
		"41,0,1,130,204,0,0,172,0,1.4,2,0,2",
		);

		$file = fopen("text.csv","w");

		foreach ($list as $line)
			{
			fputcsv($file,explode(',',$line));
			}

fclose($file);
		/*$value = array(37,1,2,130,250,0,1,187,0,3.5,0,0,2);*/

    $python = `python predict.py`;
	
			if($python == 1){
					echo "You have 85%-87% chances of heart disease, please opt for a checkup";
			}
			else if($python == 0){
					echo "You have no heart disease";
			} else {
						echo "some error occured. please forgive";
				}
?>
