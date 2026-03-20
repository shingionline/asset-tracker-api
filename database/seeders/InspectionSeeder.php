<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Inspection;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inspectors = [
            'John Smith',
            'Sarah Johnson',
            'Mike Davis',
            'Emily Brown',
            'David Wilson',
            'Lisa Garcia',
            'Robert Miller',
            'Jennifer Martinez'
        ];

        $passedNotes = [
            'All components functioning properly',
            'Excellent condition, no issues found',
            'Minor wear but fully operational',
            'Good working order',
            'Passed all safety checks',
            'Minor cosmetic wear only',
            'All tests successful'
        ];

        $failedNotes = [
            'Battery needs replacement',
            'Screen has dead pixels',
            'Keyboard keys sticking',
            'Power button not responsive',
            'Software update required',
            'Cable damage detected',
            'Performance issues noted',
            'Hardware malfunction detected'
        ];

        $assets = Asset::all();

        foreach ($assets as $asset) {
            
            $inspectionCount = rand(5, 10);
            
            for ($i = 0; $i < $inspectionCount; $i++) {
                $passed = rand(1, 100) <= 80; // 80% pass rate
                $inspector = $inspectors[array_rand($inspectors)];
                $notes = $passed 
                    ? $passedNotes[array_rand($passedNotes)]
                    : $failedNotes[array_rand($failedNotes)];

                // Create inspections spanning the last 6 months
                $inspectionDate = Carbon::now()->subDays(rand(1, 180));

                Inspection::create([
                    'asset_id' => $asset->id,
                    'inspector_name' => $inspector,
                    'passed' => $passed,
                    'notes' => $notes,
                    'created_at' => $inspectionDate,
                    'updated_at' => $inspectionDate,
                ]);
            }
        }
    }
}
