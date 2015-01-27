<?php

class Product extends Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price', 'visible', 'category_id'];
	protected $autoincrements = false;
    protected static $path_images = 'img/products/'; 
    protected static $extension_images = '.jpg';

    /* Relations */
    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }
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
    public function getFormatedSalePriceAttribute()
    {
        return number_format($this->sale_price, 0);
    }

    public function getSalePriceAttribute()
    {
        if ($this->category->isLingerie()) 
        {
            if($this->price <= 5000)
            {
                return $this->price * 3;
            }
            elseif($this->price > 5000 && $this->price <= 6000)
            {
                return $this->price * 2.75;
            }
            elseif($this->price > 6000 && $this->price <= 7500)
            {
                return $this->price * 2.5;
            }
            else
            {
                return $this->price * 2.16;
            }
        }
        elseif($this->category->isPijama())
        {
            if($this->price < 20000)
            {
                return $this->price * 2.5;
            }
            elseif($this->price >= 20000 && $this->price < 22000)
            {
                return $this->price * 2.4;
            }
            else
            {
                return $this->price * 2.27;
            }
        }
        elseif ($this->category->isMenUnderwear()) 
        {
            if($this->price < 8000)
            {
                return $this->price * 2.16;
            }
            elseif($this->price >= 8000 && $this->price <= 10000)
            {
                return 18000;
            }
            else
            {
                return $this->price * 2;
            }
        }
        elseif ($this->category->isFemaleSportswear()) 
        {
            if($this->price <= 30000)
            {
                return $this->price * 2.2;
            }
            elseif($this->price > 30000 && $this->price <= 40000)
            {
                return $this->price * 1.9;
            }
            elseif($this->price > 40000 && $this->price <= 50000)
            {
                return $this->price * 1.75;
            }
            else
            {
                return $this->price * 1.7;
            }
        }
        elseif ($this->category->isGirdle() || $this->category->isSwimwear()) 
        {
            return $this->price * 1.72;
        }
    }

    public function getFormatedPriceAttribute()
    {
        return number_format($this->price, 0);
    }

    public function getWholesalePriceAttribute()
    {
        return round($this->sale_price - ($this->sale_price * 0.40), -2);  
    }

    public function getShortNameAttribute()
    {
        return substr($this->name, 0, 30);
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
        $this->widenImage(320, $this->path_small_image);
        return $this->path_small_image;
    }

    /* End Mutators */


    /* Functions */
    public function widenImage($width, $path, $id = null)
    {
        if(is_null($id))
        {
            $id = $this->id;
        }

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
            $this->widenImage(560, $this->path_image, $id);
            $this->widenImage(320, $this->path_small_image, $id);
    	}
	}

    /* End Save And Validation */
}
