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
            'title' => 'Rapid prototyping and consumption of APIs',
            'bullets' => array(
                'with Apigility and Angular'
            ),
            'next' => '/slides/2'
        ),
        '2' => array(
            'id' => 2,
            'title' => 'Who am I?',
            'bullets' => array(
                'Filipe Silva, portuguese developer',
                'really likes REST APIs and angular',
                'works at 3V Transaction Services'
            ),
            'previous' => '/slides/1',
            'next' => '/slides/3'
        ),
        '3' => array(
            'id' => 3,
            'title' => 'Why is rapid prototyping important?',
            'bullets' => array(
                'because the real world, that\'s why',
                'build SOMETHING fast, test it, show it to people',
                'only then (try) to make it into a perfect functional snowflake'
            ),
            'previous' => '/slides/2',
            'next' => '/slides/4'
        ),
        '4' => array(
            'id' => 4,
            'title' => 'What is Apigility?',
            'bullets' => array(
                'API builder based on Zend Framework 2',
                'nice features out of the box:',
                'endpoint configuration, error reporting',
                'validation, content negotiation',
                'versioning, oauth2, db connection'
            ),
            'previous' => '/slides/3',
            'next' => '/slides/5'
        ),
        '5' => array(
            'id' => 5,
            'title' => 'What is Angular?',
            'bullets' => array(
                'opinionated client-side js framework',
                'nice features out of the box:',
                'two-way data binding, directives',
                'services, routing'
            ),
            'previous' => '/slides/4',
            'next' => '/slides/6'
        ),
        '6' => array(
            'id' => 6,
            'title' => 'What do I need to have installed to do this myself?',
            'bullets' => array(
                'Git (and Git Bash on Windows)',
                'PHP 5.4.8+, to use the built in server',
                'Composer to get php dependencies',
                'Bower to get js dependencies',
                'Something to do REST calls (I use Postman)',
                'A browser'
            ),
            'previous' => '/slides/5',
            'next' => '/slides/7'
        ),
        '7' => array(
            'id' => 7,
            'title' => 'Step 0: setup',
            'bullets' => array(
                'git clone https://github.com/filipesilva/apigility-angular-demo.git',
                'cd apigility-angular-demo',
                'git checkout -f step-0',
                'after each step of the demo, do that command with the step number',
                'this will reset the directory with all the code for that step done',
                'remember, git diff is your friend'
            ),
            'previous' => '/slides/6',
            'next' => '/slides/8'
        ),
        '8' => array(
            'id' => 8,
            'title' => 'Step 1: get apigility',
            'bullets' => array(
                'get the apigility files in folder, check main site for instructions',
                'composer install',
                'php public/index.php development enable',
                'php -S 0.0.0.0:8888 -t public public/index.php',
                'open localhost:8888 on your browser'
            ),
            'previous' => '/slides/7',
            'next' => '/slides/9'
        ),
        '9' => array(
            'id' => 9,
            'title' => 'Step 2: create an api with a rest endpoint',
            'bullets' => array(
                'click admin, APIs, create new API',
                'name it demo, confirm',
                'click Rest Services, Create new Rest Service',
                'name it slides, confirm',
                'you have an API now! lets test it',
                'call GET on localhost:8888/slides'
            ),
            'previous' => '/slides/8',
            'next' => '/slides/10'
        ),
        '10' => array(
            'id' => 10,
            'title' => 'Step 3: hardcode some data',
            'bullets' => array(
                'open module\demo\src\demo\V1\Rest\Slides\SlidesResource.php',
                'add an array of arrays named data with some dummy data',
                '[[id: 1, title: \'Slide1\', bullets: [\'b1\', \'b2\'], next: \'/slides/2\', previous: \'\'], etc]',
                'edit fetchAll to return $this->data',
                'edit fetch to return $this->data[$id]',
                'you have data in your API now! go test it',
                'test GET /slides and GET /slides/1'
            ),
            'previous' => '/slides/9',
            'next' => '/slides/11'
        ),
        '11' => array(
            'id' => 11,
            'title' => 'Step 4: add bower configuration',
            'bullets' => array(
                'bower init, spam enter',
                'make a .bowerrc file with {\'directory\': \'public/bower_components\'}',
                'bower install angular --save',
                'bower install angular-resource --save',
            ),
            'previous' => '/slides/10',
            'next' => '/slides/12'
        ),
        '12' => array(
            'id' => 12,
            'title' => 'Step 5: add a basic angular app',
            'bullets' => array(
                'setup a angular app with only one controller',
                'put these two lines in it',
                'var Slides = $resource(\'/slides/:slideId\');',
                '$scope.slideCollection = Slides.get();',
                'and in html do ng-repeat over slideCollection',
                'open localhost:8888/demo.html'
            ),
            'previous' => '/slides/11',
            'next' => '/slides/13'
        ),
        '13' => array(
            'id' => 13,
            'title' => 'Step 6: add routes/templates',
            'bullets' => array(
                'bower install angular-route --save',
                'make route/template for summary and individual slide',
                'in the individual slide, we use the route parameters to GET the slide',
                'var Slides = $resource(\'/slides/:slideId\');',
                '$scope.slide = Slides.get({slideId:$routeParams.slideId});'
            ),
            'previous' => '/slides/12',
            'next' => '/slides/14'
        ),
        '14' => array(
            'id' => 14,
            'title' => 'Step 7: make it pretty',
            'bullets' => array(
                'prowl the webs for purrty css/angular directives',
                'don\'t worry too much about how bad this code is',
                'stakeholders will be amazed you were able to put something together this fast'
            ),
            'previous' => '/slides/13',
            'next' => '/slides/15'
        ),
        '15' => array(
            'id' => 15,
            'title' => 'Step 8: add some decent data',
            'bullets' => array(
                'go back to the hardcoded data, and make it less default',
                'if you change the data structure, you have to change how you present it',
                'that\'d be only on the angular templates, though',
                'maybe add a README.md to your project right about now'
            ),
            'previous' => '/slides/14',
            'next' => '/slides/16'
        ),
        '16' => array(
            'id' => 16,
            'title' => 'Done!',
            'bullets' => array(
                'now go show what you\'ve done to someone',
                'in my case, that someone is you guys'
            ),
            'previous' => '/slides/15',
            'next' => '/slides/17'
        ),
        '17' => array(
            'id' => 17,
            'title' => 'What\'s next?',
            'bullets' => array(
                'switch out hardcoded data for db connection',
                'implement remaining HTTP methods',
                'add Oauth2, choose which resource/method pairs need auth',
                'run it on a real server instead of php built-in server',
                'add new versions',
                'make it mobile via build.phonegap.com',
            ),
            'previous' => '/slides/16',
            'next' => '/slides/18'
        ),
        '18' => array(
            'id' => 18,
            'title' => 'Where I went for inspiration/code/css',
            'bullets' => array(
                'https://www.apigility.org/documentation',
                'https://docs.angularjs.org/tutorial',
                'https://docs.angularjs.org/api/ngResource/service/$resource',
                'http://scotch.io/tutorials/javascript/animating-angularjs-apps-ngview'
            ),
            'previous' => '/slides/17',
            'next' => '/slides/19'
        ),
        '19' => array(
            'id' => 19,
            'title' => 'Yay end!',
            'bullets' => array(
                'questions?'
            ),
            'previous' => '/slides/18'
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
