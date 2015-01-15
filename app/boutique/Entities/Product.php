<?php namespace boutique\Entities;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class Product extends \Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price', 'visible'];
	protected $autoincrements = false;

    public function getPathImageAttribute()
    {
        return 'img/products/' . $this->id . '.jpg';   
    }

	public function getImageAttribute()
	{
        return $this->path_image;
	}

	public function getShortNameAttribute()
	{
		return substr($this->name, 0, 15);
	}

	public function isValid($data)
    {
        $rules = array(
        	'id'	=>	'unique:products',
            'name'     => 'required|max:100',
            'image' => 'mimes:jpeg,png,bmp|max:1500'
        );

        if ($this->exists)
        {
			$rules['id'] .= ',id,'.$this->id.',id';
        }
        else 
        {
            $rules['image'] .= '|required';
        }
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function validAndSave($data)
    {
        if ($this->isValid($data) )
        {
            if(array_key_exists('visible', $data))
            {
                $data['visible'] = 1;
            }
            else
            {
                $data['visible'] = 0;
            }

            $this->fill($data);
            $this->save();

            if(array_key_exists('image', $data))
        	{
        		$this->uploadImage($data['image'], $data['id']);
        	}
          
            return true;
        }
        
        return false;
    }

    public function uploadImage($image, $id)
    {
    	if(File::isFile($image))
    	{
    		$image->move('img/products/', $id.'.jpg');	
    	}
	}
}