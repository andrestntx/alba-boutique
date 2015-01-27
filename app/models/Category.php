<?php

class Category extends Eloquent {

	protected $fillable = ['name', 'description', 'visible'];
	protected $table = 'categories';
    protected $autoincrements = true;
	public $timestamp = true;
	protected static $path_images = 'img/categories/'; 
    protected static $extension_images = '.jpg';

    /* Querys */
    public static function findOrFailByNameUrl($name_url)
    {
        $category = self::with('products')->whereNameUrl($name_url)->first();
        if(is_null($category))
        {
            App::abort('404');
        }
        return $category;
    }

    public static function getHomeCatalog()
    {
        return self::whereVisible('1')->get();
    }

    public function isLingerie()
    {
        if($this->id == 1)
        {
            return true;
        }
        return false;
    }

    public function isMenUnderwear()
    {
        if($this->id == 2)
        {
            return true;
        }
        return false;
    }

    public function isFemaleSportswear()
    {
        if($this->id == 3)
        {
            return true;
        }
        return false;
    }

    public function isSwimwear()
    {
        if($this->id == 4)
        {
            return true;
        }
        return false;
    }

    public function isGirdle()
    {
        if($this->id == 5)
        {
            return true;
        }
        return false;
    }

    public function isPijama()
    {
        if($this->id == 6)
        {
            return true;
        }
        return false;
    }

    /* End Querys */

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
        $this->updateImage(560, $this->path_image);
        return $this->path_image;      
    }

    public function getPathSmallImageAttribute()
    {
        return self::$path_images . $this->name_url . '-small' . self::$extension_images;
    }

    public function getSmallImageAttribute()
    {
        $this->updateImage(250, $this->path_small_image);
        return $this->path_small_image;
    }

    /* End Mutators */

    public function products()
    {
         return $this->hasMany('Product');
    }

    /* Functions */
    public function widenImage($width, $path)
    {
        if(File::exists(self::$path_images . $this->id . self::$extension_images))
        {
            $image = Image::make(self::$path_images . $this->id . self::$extension_images);
            $image->widen($width);
            $image->save($path);
        }
    }

    public function updateImage($width, $path)
    {
        if($this->exists && !File::exists($path))
        {
            $this->widenImage($width, $path);
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
            $this->widenImage(560, $this->path_image);
            $this->widenImage(250, $this->path_small_image);
    	}
	}

    /* End Save And Validation */
}