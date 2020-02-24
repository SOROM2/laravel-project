<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('players')->insert([

            ['name'=>'Kane Williamson','age'=>'29','role'=>'Top-order batsman','batting'=>'Right-hand bat','bowling'=>'Right-arm offbreak','image'=>'williamson.jpg','odiRuns'=>'6132','country_id'=>'1'],
            ['name'=>'Trent Boult','age'=>'29','role'=>'Bowler','batting'=>'Right-hand bat','bowling'=>'Left-arm fast-medium','image'=>'boult.jpg','odiRuns'=>'154','country_id'=>'1'],
            ['name'=>'Tom Blundell','age'=>'28','role'=>'Wicketkeeper batsman','batting'=>'Right-hand bat','bowling'=>'Right-arm offbreak','image'=>'blundell.jpg','odiRuns'=>'0','country_id'=>'1'],
            ['name'=>'Colin de Grandhomme','age'=>'32','role'=>'Allrounder','batting'=>'Right-hand bat','bowling'=>'Right-arm fast-medium','image'=>'grandhomme.jpg','odiRuns'=>'633','country_id'=>'1'],
            ['name'=>'Lockie Ferguson','age'=>'27','role'=>'Bowler','batting'=>'Right-hand bat','bowling'=>'Right-arm fast','image'=>'ferguson.jpg','odiRuns'=>'62','country_id'=>'1'],
            ['name'=>'Martin Guptill','age'=>'32','role'=>'Opening batsman','batting'=>'Right-hand bat','bowling'=>'Right-arm offbreak','image'=>'guptil.jpg','odiRuns'=>'6626','country_id'=>'1'],
            ['name'=>'Matt Henry','age'=>'27','role'=>'Bowler','batting'=>'Right-hand bat','bowling'=>'Right-arm fast-medium','image'=>'henry.jpg','odiRuns'=>'211','country_id'=>'1'],
            ['name'=>'Tom Latham','age'=>'27','role'=>'Wicketkeeper batsman','batting'=>'Left-hand bat','bowling'=>'Right-arm medium','image'=>'latham.jpg','odiRuns'=>'2550','country_id'=>'1'],
            ['name'=>'Colin Munro','age'=>'32','role'=>'Middle-order batsman','batting'=>'Left-hand bat','bowling'=>'Right-arm medium-fast','image'=>'munro.jpg','odiRuns'=>'1271','country_id'=>'1'],
            ['name'=>'James Neesham','age'=>'28','role'=>'Batting allrounder','batting'=>'Left-hand bat','bowling'=>'Right-arm medium','image'=>'neesham.jpg','odiRuns'=>'1247','country_id'=>'1'],
            ['name'=>'Henry Nicholls','age'=>'27','role'=>'Top-order batsman','batting'=>'Left-hand bat','bowling'=>'Right-arm offbreak','image'=>'nicholls.jpg','odiRuns'=>'1120','country_id'=>'1'],
            ['name'=>'Mitchell Santner','age'=>'27','role'=>'Bowling allrounder','batting'=>'Left-hand bat','bowling'=>'Slow left-arm orthodox','image'=>'santer.jpg','odiRuns'=>'898','country_id'=>'1'],
            ['name'=>'Ish Sodhi','age'=>'26','role'=>'Bowler','batting'=>'Right-hand bat','bowling'=>'Legbreak','image'=>'sodhi.jpg','odiRuns'=>'67','country_id'=>'1'],
            ['name'=>'Tim Southee','age'=>'30','role'=>'Bowler','batting'=>'Right-hand bat','bowling'=>'Right-arm medium-fast','image'=>'southee.jpg','odiRuns'=>'676','country_id'=>'1'],
            ['name'=>'Ross Taylor','age'=>'35','role'=>'Middle-order batsman','batting'=>'Right-hand bat','bowling'=>'Right-arm offbreak','image'=>'taylor.jpg','odiRuns'=>'8376','country_id'=>'1']
        ]);
    }
}
