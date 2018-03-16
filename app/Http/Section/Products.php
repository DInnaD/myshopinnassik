<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 12.03.2018
 * Time: 15:46
 */

namespace App\Http\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Navigation\Badge;
use SleepingOwl\Admin\Section;
use Illuminate\Http\UploadedFile;
/**
 * Class Pages
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */

class Products extends Section implements Initializable
{

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = 'Brands';
    /**
     * @var string
     */
    protected $slug;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe');
    }

    /**
     * @return DisplayInterface
     *
     *
     */
    public function onDisplay()
    {


        return AdminDisplay::table()->setColumns([
            AdminColumn::link('title', 'Title'),
            AdminColumn::text('slug', 'Slug'),
            AdminColumn::image('img', 'Img'),
            AdminColumn::text('description', 'Description'),

        ])->paginate(3);

    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id, $file)
    {

        return AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('slug', 'Slug')->required(),
            AdminFormElement::image('img', "Img")->required()->setSaveCallback(function ($file, $path, $filename, $settings) use ($id) {
                //Здесь ваша логика на сохранение картинки
                $field->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
                });
                //$field->maxSize(1000 $size);
               // $field->minSize(700 $size);
                $field->setUploadSettings([
                    'orientate' => [],
                    'resize' => [1024, null, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    }]
                ]);
                $result = $field;

                return ['path' => $result['url'], 'value' => $result['path|url']];
            }),

            AdminFormElement::text('content', 'Content')->required(),
            AdminFormElement::number('price', 'Price')->required(),
            AdminFormElement::number('old_price', 'Old_price')->required(),
            AdminFormElement::number('status', 'Status')->required(),
            AdminFormElement::number('hit', 'Hit')->required(),
//            AdminFormElement::hidden('category_id'),
//            AdminFormElement::hidden('brand_id'),
            AdminFormElement::dependentselect('category_id', 'Category')
                ->setModelForOptions(\App\Model\Category::class, 'title')
                ->setDataDepends(['category_id'])
                ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('category_id', $item->getDependValue('category_id'));
                }),
            AdminFormElement::dependentselect('brand_id', 'Brand')
                ->setModelForOptions(\App\Model\Brand::class, 'title')
                ->setDataDepends(['brand_id'])
                ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('brand_id', $item->getDependValue('brand_id'));
                }),

        ]);

    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}