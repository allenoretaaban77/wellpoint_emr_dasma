<?php

	// date_default_timezone_set('Asia/Manila');

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	// $database = 'wpemrdlivedb';
	// $user = 'root';
	// $pass = '';
	// $host = 'localhost';
	// $backupFile = '\\\\192.168.0.177\\homes\\wpdnasadmin\\backup\\emr_dasma_'.date('ymd_Gis').'.sql';

	// echo "<h4>Backing up database to `<code>{$backupFile}</code>`</h4><br/>";

	// exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} > {$backupFile}", $output, $return);

	// echo "Result: ".$return."<br>";


    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
	set_time_limit(0);
    
    $database = 'wpemrdlivedb';
    $user = 'root';
    $pass = '';
    $host = 'localhost';

    // Local temporary backup file
    $localFile = 'C:/temp/emr_dasma_' . date('ymd_Gis') . '.sql';

    // NAS destination
    $nasFile = '\\\\192.168.0.177\\homes\\wpdnasadmin\\backup\\' . basename($localFile);

    echo "<h4>Backing up database locally to `<code>{$localFile}</code>`</h4><br/>";

    // Dump to local file
    exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} > {$localFile}", $output, $return);

    echo "Dump result: ".$return."<br><br>";

    if ($return === 0) {
        echo "Copying backup to NAS...<br><br>";

        // Copy file to NAS
        if (copy($localFile, $nasFile)) {
            echo "Backup successfully copied to NAS: {$nasFile}<br><br>";

			$tempFolder = 'C:/temp';
			foreach (glob($tempFolder . '/*') as $file) { 
				if (is_file($file)) { 
					unlink($file); 
					echo "Deleted: {$file}<br><br>"; 
				} 
			}
        } else {
            echo "Failed to copy backup to NAS.<br><br>";
        }
    } else {
        echo "Failed to backup.<br><br>";
    }
?>
