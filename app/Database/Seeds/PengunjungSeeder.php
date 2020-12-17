<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class PengunjungSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    for($i=0;$i<100;$i++){
      $data = [
        'nama' => $faker->name,
        'email'    => $faker->email,
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];
      $this->db->table('pengunjung')->insert($data);
    }

    // Simple Queries
    // $this->db->query(
    //   "INSERT INTO pengunjung (nama, email) VALUES(:nama:, :email:)",
    //   $data
    // );

    // Using Query Builder
    // $this->db->table('pengunjung')->insert($data);
    // $this->db->table('pengunjung')->insertBatch($data);
  }
}
