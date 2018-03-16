<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManager;

use Intervention\Image\Image;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'slug', 'img', 'description'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return 'public/img/no-image.png';
        }

        return 'public/uploads/' . $this->img;
    }

    /**
     * Get the full path from the given partial path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getFullPath($img)
    {
        return public_path() . '/' .'uploads' . '/' . $img;
    }
    public function setImage($field, $img)
    {
        parent::setImage($field, $img);
        $file = $this->$field;
        if ( ! $file->exists()) return;
        $path = $file->getFullPath();

        Image::make($path)->resize(10, 10)->save();
    }
//    public function getImage()
//    {
//        if (isset($_FILES['img'])) {
//
//            if (is_uploaded_file($_FILES['img']['name'])) {
//
//                //название исходного файла без расширения
//                $fileName = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
//                //расширение
//                $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
//
//                $img = $_FILES['img']['tmp_name']; //путь к файлу из временной папки
//
//
//                //Объект Intervention\Image\ImageManager для работы с изображениями
//                $manager = new Intervention\Image\ImageManager(array('driver' => 'imagick'));
//
//                /*
//                 * Метод resize изменяет размер изображения
//                 * 1-й аргумент - ширина
//                 * 2-й аргумент - высота
//                 * 3-й аргумент (не обязательный) - доп.методы, тут - сохранить пропорции
//                 * Метод save - сохраняет изображение - передать полный путь с названием файла
//                 */
//                $img = $manager->make($img)->resize(1024, 768, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                })->save('uploads/' . $_FILES['img']['name']);
//
//                $img_mini = $manager->make($img)->resize(100, 60, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                })->save('uploads/' . $fileName . '-100x60' . '.' . $fileExtension);
//            }
//        }
//    }
//    public function getAdd() {
//
//// create an image manager instance with favored driver
//        $manager = new ImageManager(array('driver' => 'imagick'));
//
//// to finally create image instances
//        $img = $manager->make('public/uploads/' . $this->img)->resize(300, 200);
//        
//    }
//    public function postAdd(){
//        $file = \Input::get('img');
//        if(isset($file)){
//            $img = Image::make($file);
//        }
//        return $_POST;
//    }
//    public function remove()
//    {
//        $this->removeImage();
//        $this->delete();
//    }
//
//    public function removeImage()
//    {
//        if($this->image != null)
//        {
//            Storage::delete('uploads/' . $this->image);
//        }
//    }
//
//    public function uploadImage($image)
//    {
//        if($image == null) { return; }
//
//        $this->removeImage();
//        $filename = str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads', $filename);
//        $this->image = $filename;
//        $this->save();
//    }
//
//    public function getImage()
//    {
//        if($this->image == null)
//        {
//            return '/img/no-image.png';
//        }
//
//        return '/uploads/' . $this->image;
//
//    }

}
