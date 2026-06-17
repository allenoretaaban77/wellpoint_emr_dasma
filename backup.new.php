<?php
date_default_timezone_set('Asia/Manila');
error_reporting(E_ALL);

// Database connection details
$database = 'wpemrdlivedb';
$user     = 'root';
$pass     = ''; // leave empty if no password
$host     = 'localhost';

// Local backup folder
$localDir  = 'C:/temp';
if (!is_dir($localDir)) {
    mkdir($localDir, 0777, true);
}

// File names
$timestamp  = date('ymd_His');
$localFile  = $localDir . "/emr_dasma_{$timestamp}.sql";
// $zipFile    = $localDir . "/emr_dasma_{$timestamp}.sql.zip";

// Synology NAS destination (UNC path)
$nasDir     = '\\\\192.168.0.177\\homes\\wpdnasadmin\\backup';

// Build mysqldump command
$command = "mysqldump --user={$user} --host={$host} {$database} > \"$localFile\"";
if (!empty($pass)) {
    $command = "mysqldump --user={$user} --password={$pass} --host={$host} {$database} > \"$localFile\"";
}

system($command, $return); // or passthru()

if ($return === 0) {
    // Save dump to local file
    // file_put_contents($localFile, implode("\n", $output));
    // echo "Database backup created: {$localFile}<br/>";

    // // Zip the dump
    // $zip = new ZipArchive();
    // if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
    //     $zip->addFile($localFile, basename($localFile));
    //     $zip->close();
    //     echo "Zip created: {$zipFile}<br/>";
    // } else {
    //     echo "Zip creation failed<br/>";
    // }

    // Transfer to Synology using Robocopy
    echo "robocopy \"$localDir\" \"$nasDir\" emr_dasma_{$timestamp}.sql /MIR";
    $robocopyCmd = "robocopy \"$localDir\" \"$nasDir\" emr_dasma_{$timestamp}.sql /MIR";
    exec($robocopyCmd . " 2>&1", $roboOutput, $roboReturn);

    echo "Robocopy result code: {$roboReturn}<br/>";
    echo "<pre>" . implode("\n", $roboOutput) . "</pre>";

    // Robocopy exit codes < 8 are considered success
    if ($roboReturn < 8) {
        echo "Backup successfully transferred to Synology NAS<br/>";
    } else {
        echo "Robocopy failed<br/>";
    }

} else {
    echo "Backup failed<br/>";
    echo "<pre>" . implode("\n", $output) . "</pre>";
}
?>
