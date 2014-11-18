<?php

namespace Ferdirn\Provinces;

/**
 * ProvinceList
 *
 */
class Provinces extends \Eloquent {

	/**
	 * @var string
	 * Provinces data.
	 */
	protected $provinces;

	/**
	 * @var string
	 * The table for the provinces in the database, is "provinces" by default.
	 */
	protected $table;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
       $this->table = \Config::get('laravel-id-provinces::table_name');
    }

    /**
     * Get the provinces from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getProvinces()
    {
        //Get the provinces from the JSON file
        if (sizeof($this->provinces) == 0){
            $this->provinces = json_decode(file_get_contents(__DIR__ . '/Models/provinces.json'), true);
        }

        //Return the provinces
        return $this->provinces;
    }

	/**
	 * Returns one province
	 *
	 * @param string $id The province id
     *
	 * @return array
	 */
	public function getOne($id)
	{
        $provinces = $this->getProvinces();
		return $provinces[$id];
	}

	/**
	 * Returns a list of provinces
	 *
	 * @param string sort
	 *
	 * @return array
	 */
	public function getList($sort = null)
	{
	    //Get the provinces list
	    $provinces = $this->getProvinces();

	    //Sorting
	    $validSorts = array(
	    	'country_id',
	        'name',
	        'capital',
	        'area_km2'
        );

	    if (!is_null($sort) && in_array($sort, $validSorts)){
	        uasort($provinces, function($a, $b) use ($sort) {
	            if (!isset($a[$sort]) && !isset($b[$sort])){
	                return 0;
	            } elseif (!isset($a[$sort])){
	                return -1;
	            } elseif (!isset($b[$sort])){
	                return 1;
	            } else {
	                return strcasecmp($a[$sort], $b[$sort]);
	            }
	        });
	    }

	    //Return the provinces
		return $provinces;
	}
}
