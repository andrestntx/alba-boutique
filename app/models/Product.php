<?php

class Product extends Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price', 'visible', 'category_id', 
        'wholesale_gain', 'sale_gain'
    ];
	protected $autoincrements = false;
    protected static $path_images = 'img/products/'; 
    protected static $path_images_price_sale = 'img/products/price_sale/';
    protected static $path_images_price_wholesale = 'img/products/price_wholesale/'; 
    protected static $path_images_price_sale_wholesale = 'img/products/price_sale_wholesale/'; 
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
            'products.id', 'products.category_id', 'products.sale_gain as sale_gain', 'products.wholesale_gain as wholesale_gain', 
            'categories.name as category_name', 'categories.name_url as category_name_url')
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
        return number_format(round($this->sale_price, -2), 0);
    }

    public function getFormatedWholesalePriceAttribute()
    {
        return number_format(round($this->wholesale_price, -2), 0);
    }

    public function getSalePriceAttribute()
    {
        if(is_null($this->sale_gain))
        {
            return $this->price * (1 + $this->category->sale_gain / 100);
        }

        return $this->price * (1 + $this->sale_gain / 100);
    }

    public function getWholesalePriceAttribute()
    {
        if(is_null($this->wholesale_gain))
        {
            return $this->price * (1 + $this->category->wholesale_gain / 100);
        }

        return $this->price * (1 + $this->wholesale_gain / 100);
    }

    public function getFormatedPriceAttribute()
    {
        return number_format($this->price, 0);
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
        $this->updateImage(560, $this->path_image);
        return $this->path_image;      
    }

    public function getPathSmallImageAttribute()
    {
        return self::$path_images . $this->name_url . '-small' . self::$extension_images;
    }

    public function getPathPriceSaleImageAttribute()
    {
        return self::$path_images_price_sale . $this->id . self::$extension_images;
    }

    public function getPathPriceWholeSaleImageAttribute()
    {
        return self::$path_images_price_wholesale . $this->id . self::$extension_images;
    }

    public function getPathPriceSaleWholeSaleImageAttribute()
    {
        return self::$path_images_price_sale_wholesale . $this->id . self::$extension_images;
    }

    public function getSmallImageAttribute()
    {
        $this->updateImage(320, $this->path_small_image);
        return $this->path_small_image;
    }

    /* End Mutators */


    /* Functions */
    public function widenImage($width, $path, $id)
    {
        if(File::exists(self::$path_images . $id . self::$extension_images))
        {
            $image = Image::make(self::$path_images . $id . self::$extension_images);
            $image->widen($width);
            $image->save($path);
        }  
    }

    public function widenTextImage($width, $path, $id, $text = [])
    {
        if(File::exists(self::$path_images . $id . self::$extension_images))
        {
            $image = Image::make(self::$path_images . $id . self::$extension_images);
            //$image->widen($width);

            $position_y = 10;
            foreach($text as $t) 
            {
                $image->text($t, $image->width() - 10, $image->height() - $position_y, function($font) {
                    $font->file(3);
                    $font->color('#000');
                    $font->align('right');
                    $font->valign('bottom');
                });
                $position_y += 15;
            }
            

            $image->save($path);
        }  
    }

    public function updateImage($width, $path)
    {
        if($this->exists && !File::exists($path))
        {
            $this->widenImage($width, $path, $this->id);
        }
    }

    /* End Functions*/


    /* Save And Validation */
	public function isValid($data)
    {
        $rules = array(
        	'id'           => 'unique:products',
            'name'         => 'required|max:100|unique:products',
            'image'        => 'mimes:jpeg,png,bmp|max:1500',
            'category_id'  => 'required',
            'wholesale_gain'    => 'integer',
            'sale_gain'         => 'integer'
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

            $this->fill(array_map('trim',$data));
            
            if(!$this->exists)
            {
                $this->name_url = strtolower(str_replace(' ', '-', trim($data['name'])));
            }

            if(empty($data['wholesale_gain']))
            {
                $this->wholesale_gain = null;
            }

            if(empty($data['sale_gain']))
            {
                $this->sale_gain = null;
            }

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
            $this->formateImages($id);
    	}
	}

    public function formateImages($id)
    {
        $this->widenImage(320, $this->path_small_image, $id);
        $this->widenTextImage(560, $this->path_price_sale_image, $id, ['Referencia ' . $id, 'Precio $' . $this->formated_sale_price]);
        $this->widenTextImage(560, $this->path_price_wholesale_image, $id, ['Referencia ' . $id, 'Precio Mayor $' . $this->formated_wholesale_price]);
        $this->widenTextImage(560, $this->path_price_sale_wholesale_image, $id, ['Referencia ' . $id, 'Precio Segerido $' . $this->formated_sale_price, 'Precio Mayor $' . $this->formated_wholesale_price]);
    }

    /* End Save And Validation */
}
