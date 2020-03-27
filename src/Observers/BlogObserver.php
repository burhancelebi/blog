<?php

namespace Celebi\Commands\Observers;

use Celebi\Commands\Models\Blog;
use App\Services\Image\Image;

class BlogObserver
{
    private $image , $request;
    
    public function __construct()
    {
        $this->image = new Image();
        
        $this->request = request();
    }
    
    public function creating( Blog $blog )
    {
        if ( $this->request->hasFile("image") ) {
        
            $this->image->make("image",$this->request , "614x460");
            $this->image->destination( "/images/blogs/");

            $blog->image = $this->image->save();
        }
    }

    public function updating( Blog $blog )
    {
        if ( $this->request->hasFile("image") ) {
        
            $this->image->destroy( $blog->getOriginal("image") );

            $this->image->make("image",$this->request , "614x460");
            $this->image->destination( "/images/blogs/");

            $blog->image = $this->image->save();
        }
    }

    public function deleted( Blog $blog )
    {
        $this->image->destroy( $blog->getOriginal("image") );
    }
}