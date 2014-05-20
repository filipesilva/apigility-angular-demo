apigility-angular-demo
======================

A simple demo of rapid prototyping of APIs with Apigility and AngularJS.

This repo was made for the presentation given at
[PHP Dublin May Meetup](http://www.meetup.com/PHP-Dublin/events/183433752/), on
the  lovely [TCube Dublin](http://tcubedublin.com/). A big shout out to TCube's
Barry Alistair for accepting me as a speaker!

### How to run the presentation

You'll have to install dependencies, fire up the server, and head to the browser

```
composer install
bower install
php public/index.php development enable
php -S 0.0.0.0:8888 -t public public/index.php
```

Now opening a browser at [http://localhost:8888/demo.html](http://localhost:8888/demo.html)
should show you the presentation.

### How to follow the steps in the presentation

Since the presentation IS the repo, my advice to see it and try it out at the
same time is to clone the repo twice, leaving the server running the
presentation open on the first and trying out the steps on the second clone.

### Resources

[Composer](https://getcomposer.org/)

[Bower](http://bower.io/)

[Apigility tutorial](https://www.apigility.org/documentation)

[Angular tutorial](https://docs.angularjs.org/tutorial)

[ngResource documentation](https://docs.angularjs.org/api/ngResource/service/$resource)

[Scotch.io ngAnimate tutorial](http://scotch.io/tutorials/javascript/animating-angularjs-apps-ngview)
