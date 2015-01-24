<?php

class Product extends Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price', 'visible'];
	protected $autoincrements = false;

    public function getWholesalePriceAttribute()
    {
        return round($this->price - ($this->price * 0.40), -2);  
    }

    public function getPathImageAttribute()
    {
        return 'img/products/' . $this->id . '.jpg';   
    }

    public function getPathSmallImageAttribute()
    {
        return 'img/products/' . $this->id . '_small.jpg';
    }

	public function getImageAttribute()
	{
        return URL::to($this->path_image);		
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
            $img = Image::make($image->getRealPath());
            
            if ($img->width() > 560) 
            {
                $img->widen(560);
            }
            $img->save('img/products/' . $id . '.jpg');
            
            $img->widen(250);
            $img->save('img/products/' . $id . '_small.jpg');
    	}
	}
}