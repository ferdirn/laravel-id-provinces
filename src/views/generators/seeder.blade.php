use Illuminate\Database\Eloquent\Model as Eloquent;

class ProvincesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the provinces table
        DB::table(\Config::get('laravel-id-provinces::table_name'))->delete();

        //Get all of the provinces
        $provinces = Provinces::getList();
        foreach ($provinces as $provinceId => $province){
            DB::table(\Config::get('laravel-id-provinces::table_name'))->insert(array(
                'id' => $provinceId,
                'country_id' => $province['country_id'],
                'name' => $province['name'],
                'capital' => isset($province['capital']) ? $province['capital'] : null,
                'area_km2' => isset($province['area_km2']) ? $province['area_km2'] : null
            ));
        }
    }
}
