<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('doctors_list')->insert([
            [
                'id' => 2,
                'name' => 'Valyssa Azzahra',
                'name_pref' => 'M.D.',
                'clinic_address' => 'In your heart',
                'contact' => '089530695160',
                'email' => 'valycantik@gmail.com',
                'specialty_ids' => '[6,5,4]',
                'img_path' => '1715262900_IMG_5767.JPEG-removebg-preview.jpeg',
                'created_at' => '2020-09-24 09:52:00'
            ],
            [
                'id' => 4,
                'name' => 'Siti Maritza Aqila',
                'name_pref' => 'M.D',
                'clinic_address' => 'Pakjo Heroes',
                'contact' => '081336384009',
                'email' => 'qilapakjomania@gmail.com',
                'specialty_ids' => '[3,4]',
                'img_path' => '1715262900_IMG_6666.JPG',
                'created_at' => '2023-04-17 11:44:18'
            ],
            [
                'id' => 5,
                'name' => 'Rachmaniah Kesuma Wardani',
                'name_pref' => 'M.D',
                'clinic_address' => 'Sayang sunjae',
                'contact' => '08112233445566',
                'email' => 'rachmaimoed@gmail.com',
                'specialty_ids' => '[3,6,4,1]',
                'img_path' => '1715262960_1715248980_rachmaaaaaaaa.jpg.jpg',
                'created_at' => '2024-05-09 17:03:39'
            ],
            [
                'id' => 6,
                'name' => 'Yolendri Anisyahfitri',
                'name_pref' => 'M.D.',
                'clinic_address' => 'Rumah Kita Aww',
                'contact' => '081122334455',
                'email' => 'yolenimoed@gmail.com',
                'specialty_ids' => '[6,5,7]',
                'img_path' => '1715262360_1715249580_yolen.jpegyolen.jpeg',
                'created_at' => '2024-05-09 17:13:45'
            ]
        ]);

        DB::table('datapatients')->insert([
            ['id' => 'I01', 'id_patient' => 'patient 1', 'age' => 65, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'PVCs, noise'],
            ['id' => 'I02', 'id_patient' => 'patient 1', 'age' => 65, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'ventricular trigeminy, ventricular couplets'],
            ['id' => 'I03', 'id_patient' => 'patient 2', 'age' => 59, 'sex' => 'M', 'diagnoses' => 'Acute MI', 'descOfDiagnoses' => 'ST elevation, PVCs'],
            ['id' => 'I04', 'id_patient' => 'patient 2', 'age' => 59, 'sex' => 'M', 'diagnoses' => 'Acute MI', 'descOfDiagnoses' => 'bradycardia, tachycardia, PVCs, ventricular couplets, paroxysmal VT'],
            ['id' => 'I05', 'id_patient' => 'patient 2', 'age' => 59, 'sex' => 'M', 'diagnoses' => 'Acute MI', 'descOfDiagnoses' => 'paroxysmal VT'],
            ['id' => 'I06', 'id_patient' => 'patient 3', 'age' => 80, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'ST changes, PVCs'],
            ['id' => 'I07', 'id_patient' => 'patient 3', 'age' => 80, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'PVCs, supraventricular triplets'],
            ['id' => 'I08', 'id_patient' => 'patient 4', 'age' => 51, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ventricular bigeminy, ventricular couplets'],
            ['id' => 'I09', 'id_patient' => 'patient 5', 'age' => 68, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ventricular couplets, ventricular escape beats, AV nodal block 2 degree Moebits 1'],
            ['id' => 'I10', 'id_patient' => 'patient 5', 'age' => 68, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'tachycardia, AV nodal block 2 degree Moebits 1, noise'],
            ['id' => 'I11', 'id_patient' => 'patient 5', 'age' => 68, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, AV nodal block 2 degree Moebits 1'],
            ['id' => 'I12', 'id_patient' => 'patient 6', 'age' => 39, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ST depression, ventricular couplets'],
            ['id' => 'I13', 'id_patient' => 'patient 6', 'age' => 39, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs'],
            ['id' => 'I14', 'id_patient' => 'patient 6', 'age' => 39, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, baseline wander'],
            ['id' => 'I15', 'id_patient' => 'patient 7', 'age' => 57, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'ST depression, PVCs'],
            ['id' => 'I16', 'id_patient' => 'patient 8', 'age' => 64, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'right bundle branch block, polymorphic PVCs, noise'],
            ['id' => 'I17', 'id_patient' => 'patient 8', 'age' => 64, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'bradycardia, PVCs, right bundle branch block'],
            ['id' => 'I18', 'id_patient' => 'patient 9', 'age' => 18, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, numerous fusion beats'],
            ['id' => 'I19', 'id_patient' => 'patient 9', 'age' => 18, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ventricular trigeminy, PVCs'],
            ['id' => 'I20', 'id_patient' => 'patient 10', 'age' => 59, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'ventricular couplets, fusion beats; APCs, atrial couplets, blocked APCs, paroxysmal supraventricular tachycardia'],
            ['id' => 'I21', 'id_patient' => 'patient 10', 'age' => 59, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'PVCs, APCs, atrial couplets, blocked APCs'],
            ['id' => 'I22', 'id_patient' => 'patient 10', 'age' => 59, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'paroxysmal VT, APCs, atrial couplets, blocked APCs'],
            ['id' => 'I23', 'id_patient' => 'patient 11', 'age' => 52, 'sex' => 'M', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'polymorphic PVCs, intraventricular block'],
            ['id' => 'I24', 'id_patient' => 'patient 11', 'age' => 52, 'sex' => 'M', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'PVCs, ST depression'],
            ['id' => 'I25', 'id_patient' => 'patient 12', 'age' => 66, 'sex' => 'F', 'diagnoses' => 'Sinus node dysfunction', 'descOfDiagnoses' => 'paroxysmal VT'],
            ['id' => 'I26', 'id_patient' => 'patient 12', 'age' => 66, 'sex' => 'F', 'diagnoses' => 'Sinus node dysfunction', 'descOfDiagnoses' => 'ventricular couplets, paroxysmal supraventricular tachycardia'],
            ['id' => 'I27', 'id_patient' => 'patient 13', 'age' => 60, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ventricular bigeminy, trigeminy, PVCs'],
            ['id' => 'I28', 'id_patient' => 'patient 13', 'age' => 60, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs on bradycardia'],
            ['id' => 'I29', 'id_patient' => 'patient 14', 'age' => 41, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, couplets, paroxysmal VT, noise'],
            ['id' => 'I30', 'id_patient' => 'patient 14', 'age' => 41, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'VT'],
            ['id' => 'I31', 'id_patient' => 'patient 14', 'age' => 41, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'paroxysmal VT, baseline wander'],
            ['id' => 'I32', 'id_patient' => 'patient 14', 'age' => 41, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ventricular bigeminy'],
            ['id' => 'I33', 'id_patient' => 'patient 15', 'age' => 40, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, SVEBs,  supraventricular couplets'],
            ['id' => 'I34', 'id_patient' => 'patient 15', 'age' => 40, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'SVEBs, couplets,  paroxysmal supraventricular tachycardia with aberrated QRS'],
            ['id' => 'I35', 'id_patient' => 'patient 16', 'age' => 38, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'ventricular couplets, fusion beats on tachycardia'],
            ['id' => 'I36', 'id_patient' => 'patient 16', 'age' => 38, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'PVCs, ventricular couplets as bigeminy'],
            ['id' => 'I37', 'id_patient' => 'patient 16', 'age' => 38, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'PVCs on bradycardia'],
            ['id' => 'I38', 'id_patient' => 'patient 17', 'age' => 60, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'PVCs, couplets, triplets on tachycardia'],
            ['id' => 'I39', 'id_patient' => 'patient 17', 'age' => 60, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'PVCs and couplets on bradycardia'],
            ['id' => 'I40', 'id_patient' => 'patient 18', 'age' => 66, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'PVCs, ventricular bigeminy, ST change'],
            ['id' => 'I41', 'id_patient' => 'patient 18', 'age' => 66, 'sex' => 'M', 'diagnoses' => 'Transient ischemic attack', 'descOfDiagnoses' => 'PVCs, sinus arrhythmia, noise'],
            ['id' => 'I42', 'id_patient' => 'patient 19', 'age' => 19, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, ventricular couplets, ventricular bigeminy, paroxysmal VT'],
            ['id' => 'I43', 'id_patient' => 'patient 19', 'age' => 19, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, ventricular couplets, ventricular bigeminy, paroxysmal VT, ventricular rhythm'],
            ['id' => 'I44', 'id_patient' => 'patient 20', 'age' => 53, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'PVCs, paroxysmal VT'],
            ['id' => 'I45', 'id_patient' => 'patient 20', 'age' => 53, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'ventricular couplets'],
            ['id' => 'I46', 'id_patient' => 'patient 20', 'age' => 53, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension, left ventricular hypertrophy', 'descOfDiagnoses' => 'PVCs on tachycardia, fusion beats'],
            ['id' => 'I47', 'id_patient' => 'patient 21', 'age' => 68, 'sex' => 'F', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'PVCs on sinus arrhythmia, ventricular bigeminy'],
            ['id' => 'I48', 'id_patient' => 'patient 21', 'age' => 68, 'sex' => 'F', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'PVCs, ventricular couplets'],
            ['id' => 'I49', 'id_patient' => 'patient 22', 'age' => 70, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs on bradycardia, atrial fibrillation'],
            ['id' => 'I50', 'id_patient' => 'patient 22', 'age' => 70, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, tachycardia, atrial fibrillation, ST depression'],
            ['id' => 'I51', 'id_patient' => 'patient 23', 'age' => 56, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs on tachycardia, bigeminy, trigeminy'],
            ['id' => 'I52', 'id_patient' => 'patient 23', 'age' => 56, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs on bradycardia, ventricular bigeminy'],
            ['id' => 'I53', 'id_patient' => 'patient 23', 'age' => 56, 'sex' => 'M', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, ventricular couplets and R-on-T'],
            ['id' => 'I54', 'id_patient' => 'patient 24', 'age' => 74, 'sex' => 'M', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'PVCs, ventricular couplets, paroxysmal VT, noise'],
            ['id' => 'I55', 'id_patient' => 'patient 24', 'age' => 74, 'sex' => 'M', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'paroxysmal VT'],
            ['id' => 'I56', 'id_patient' => 'patient 24', 'age' => 74, 'sex' => 'M', 'diagnoses' => 'Earlier MI', 'descOfDiagnoses' => 'PVCs , positional form and HR change'],
            ['id' => 'I57', 'id_patient' => 'patient 25', 'age' => 45, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'fusion beats, ventricular couplets on tachycardia'],
            ['id' => 'I58', 'id_patient' => 'patient 25', 'age' => 45, 'sex' => 'F', 'diagnoses' => 'Coronary artery disease, arterial hypertension', 'descOfDiagnoses' => 'PVCs on bradycardia'],
            ['id' => 'I59', 'id_patient' => 'patient 26', 'age' => 49, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'PVCs, ventricular couplets, ST elevation'],
            ['id' => 'I60', 'id_patient' => 'patient 26', 'age' => 49, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'ST elevation'],
            ['id' => 'I61', 'id_patient' => 'patient 26', 'age' => 49, 'sex' => 'F', 'diagnoses' => NULL, 'descOfDiagnoses' => 'positional changes, bradycardia'],
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
            'type' => '1'
        ]);
    }
}
