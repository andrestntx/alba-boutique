<?php

class Product extends Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price', 'visible', 'category_id'];
	protected $autoincrements = false;
    protected static $path_images = 'img/products/'; 
    protected static $extension_images = '.jpg';

    /* Query */
    public static function getVisiblePaginate()
    {
        return self::whereVisible('1')->orderBy('name')->paginate(8); 
    }

    public static function getHomeCatalog()
    {
        return self::whereVisible('1')->whereCategoryId(1)->orderBy('name')->paginate(8); 
    }

    public static function findOrFailByNameUrl($name_url, $category_name_url)
    {
        $product = self::select('products.name', 'products.description', 'products.sizes', 'products.price', 'products.name_url',
            'products.id', 'products.category_id', 'categories.name as category_name', 'categories.name_url as category_name_url')
            ->joinCategoryByNameUrl($name_url, $category_name_url)->first();
        if(is_null($product))
        {
            App::abort('404');
        }
        return $product;
    }

    public static function scopeJoinCategoryByNameUrl($query, $name_url, $category_name_url)
    {
        return $query->join('categories', function($join) use($name_url, $category_name_url) { 
            $join->on('categories.id', '=', 'products.category_id')
                ->where('products.name_url', '=', $name_url)
                ->where('categories.name_url', '=', $category_name_url);
        });
    }

    public function relatedProducts()
    {
        return self::take(4)->whereNotIn('id', [$this->id])->whereCategoryId($this->category_id)->get();
    }

    
    /* End Querys*/

    /* Mutators */

    public function getFormatedPriceAttribute()
    {
        return number_format($this->price, 0);
    }

    public function getWholesalePriceAttribute()
    {
        return round($this->price - ($this->price * 0.40), -2);  
    }

    public function getShortNameAttribute()
    {
        return substr($this->name, 0, 15);
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
        	'id'	=>	'unique:products',
            'name'     => 'required|max:100|unique:products',
            'image' => 'mimes:jpeg,png,bmp|max:1500',
            'category_id'   => 'required'
        );

        if ($this->exists)
        {
			$rules['id'] .= ',id,'.$this->id.',id';
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