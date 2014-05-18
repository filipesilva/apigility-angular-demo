<?php
namespace demo\V1\Rest\Slides;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class SlidesResource extends AbstractResourceListener
{
    // mock data
    private $data = array(
        '1' => array(
            'id' => 1,
            'title' => 'Slide 1',
            'bullets' => array(
                'bullet 1',
                'bullet 2',
                'bullet 3'
            ),
            'next' => '/slides/2'
        ),
        '2' => array(
            'id' => 2,
            'title' => 'Slide 2',
            'bullets' => array(
                'bullet 1',
                'bullet 2',
                'bullet 3'
            ),
            'previous' => '/slides/1',
            'next' => '/slides/3'
        ),
        '3' => array(
            'id' => 3,
            'title' => 'Slide 3',
            'bullets' => array(
                'bullet 1',
                'bullet 2',
                'bullet 3'
            ),
            'previous' => '/slides/2'
        )
    );

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        if (array_key_exists($id, $this->data)){
            return $this->data[$id];
        }else{
            return new ApiProblem(404, 'Not Found');
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return $this->data;
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
