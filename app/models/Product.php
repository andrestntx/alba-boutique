<?php

class Product extends Eloquent {

	protected $fillable = ['id', 'name', 'description', 'sizes', 'price'];
	protected $autoincrements = false;

	public function getImageAttribute()
	{
        return URL::to('img/products/' . $this->id . '.jpg');		
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
      
            $this->fill($data);
            $this->save();

            if(array_key_exists('image', $data))
        	{
        		$this->uploadImage($data['image']);
        	}
          
            return true;
        }
        
        return false;
    }

    public function uploadImage($image)
    {
    	if(File::isFile($image))
    	{
    		$image->move('img/products/', $this->id.'.jpg');	
    	}
	}
}