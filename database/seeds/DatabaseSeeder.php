<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		 DB::table('journees')->insert([
		            'id' => 0,
		            'jour' => 'dimanche',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	
		     ]);

		 DB::table('journees')->insert([
		            'id' => 1,
		            'jour' => 'lundi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	

		     ]);
		 DB::table('journees')->insert([
		            'id' => 2,
		            'jour' => 'mardi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	

		     ]);
		 DB::table('journees')->insert([
		            'id' => 3,
		            'jour' => 'mercredi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	

		     ]);
		 DB::table('journees')->insert([
		            'id' => 4,
		            'jour' => 'jeudi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	

		     ]);
		 DB::table('journees')->insert([
		            'id' => 5,
		            'jour' => 'vendredi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	

		     ]);
		 DB::table('journees')->insert([
		            'id' => 6,
		            'jour' => 'samedi',
		            'disponible' => 1,
					'heuredeb'=>'05:00:00',
					'heurefin'=>'18:00:00',
					'id_medecin'=>1							            	
		     ]);



    }


}
