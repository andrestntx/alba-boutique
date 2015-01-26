<?php

class Category extends Eloquent {

	protected $fillable = ['name', 'description', 'visible'];
	protected $table = 'categories';
    protected $autoincrements = true;
	public $timestamp = true;
	protected static $path_images = 'img/categories/'; 
    protected static $extension_images = '.jpg';

    public function getShortNameAttribute()
    {
        return substr($this->name, 0, 25);
    }

    public function getPathImageAttribute()
    {
        return self::$path_images . $this->name_url . self::$extension_images;   
    }

    public function getImageAttribute()
    {
        $this->widenImage(560, $this->path_image);
        return $this->path_image;      
    }

    public function getPathSmallImageAttribute()
    {
        return self::$path_images . $this->name_url . '-small' . self::$extension_images;
    }

    public function getSmallImageAttribute()
    {
        $this->widenImage(250, $this->path_small_image);
        return $this->path_small_image;
    }

    /* End Mutators */


    /* Functions */
    public function widenImage($width, $path)
    {
        if($this->exists && !File::exists($path))
        {
            $image = Image::make(self::$path_images . $this->id . self::$extension_images);
            $image->widen($width);
            $image->save($path);
        }
    }

    /* End Functions*/

     /* Save And Validation */
	public function isValid($data)
    {
        $rules = array(
            'name'     => 'required|max:100|unique:categories',
            'image' => 'mimes:jpeg,png,bmp|max:1500'
        );

        if ($this->exists)
        {
			$rules['name'] .= ',name,'.$this->id.',id';
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
            $this->name_url = strtolower(str_replace(' ', '-', trim($data['name'])));
            $this->save();

            if(array_key_exists('image', $data))
        	{
        		$this->uploadImage($data['image'], $this->id);
        	}
          
            return true;
        }
        
        return false;
    }

    public function uploadImage($image, $id)
    {
    	if(File::isFile($image))
    	{
            $img = Image::make($image->getRealPath());
            
            if ($img->width() > 560) 
            {
                $img->widen(560);
            }
            $img->save(self::$path_images . $id . self::$extension_images);
    	}
	}

    /* End Save And Validation */
}