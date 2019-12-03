<?php
//namespace App\Repositories;
//
//use App\Models\Category;
//use App\Traits\UploadAble;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\UploadedFile;
//use App\Contracts\CategoryContract;
//use Illuminate\Database\QueryException;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Doctrine\Instantiator\Exception\InvalidArgumentException;
//
///**
// * Class CategoryRepository
// *
// * @package \App\Repositories
// */
//class CategoryRepository extends BaseRepository implements CategoryContract
//{
//    use UploadAble;
//
//    /**
//     * CategoryRepository constructor.
//     * @param  Model  $model
//     */
//    public function __construct(Model $model)
//    {
//        parent::__construct($model);
//        $this->model = $model;
//    }
//
//    /**
//     * @param  string  $order
//     * @param  string  $sort
//     * @param  array  $columns
//     * @return mixed
//     */
//    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
//        return $this->all($columns, $order, $sort);
//    }
//
//    /**
//     * @param  int  $id
//     * @return mixed
//     */
//    public function findCategoryById(int $id)
//    {
//        try {
//            return $this->findOneOrFail($id);
//
//        } catch (ModelNotFoundException $e) {
//
//            throw new ModelNotFoundException($e);
//        }
//    }
//
//}