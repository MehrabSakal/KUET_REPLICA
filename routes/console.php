<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('data:transfer-sqlite', function () {
    $this->info('Starting data transfer from SQLite to MySQL...');
    
    try {
        // Force the sqlite connection to use the correct file path, bypassing the DB_DATABASE .env variable
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        Illuminate\Support\Facades\DB::purge('sqlite');
        
        // Disable foreign key checks in MySQL
        Illuminate\Support\Facades\DB::connection('mysql')->statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Get all tables from SQLite
        $tables = Illuminate\Support\Facades\DB::connection('sqlite')
            ->select('SELECT name FROM sqlite_master WHERE type="table" AND name NOT LIKE "sqlite_%"');
            
        foreach ($tables as $table) {
            $tableName = $table->name;
            $this->info("Transferring table: {$tableName}");
            
            // Clear existing data in the MySQL table
            Illuminate\Support\Facades\DB::connection('mysql')->table($tableName)->truncate();
            
            // Fetch all data from SQLite
            $rows = Illuminate\Support\Facades\DB::connection('sqlite')->table($tableName)->get();
            
            if ($rows->count() > 0) {
                $data = json_decode(json_encode($rows), true);
                Illuminate\Support\Facades\DB::connection('mysql')->table($tableName)->insert($data);
            }
                
            $this->info("Successfully transferred table: {$tableName}");
        }
        
        // Re-enable foreign key checks in MySQL
        Illuminate\Support\Facades\DB::connection('mysql')->statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->info('Data transfer completed successfully!');
    } catch (\Exception $e) {
        $this->error('Transfer failed: ' . $e->getMessage());
        Illuminate\Support\Facades\DB::connection('mysql')->statement('SET FOREIGN_KEY_CHECKS=1;');
    }
})->purpose('Transfer data from existing SQLite database to MySQL');
