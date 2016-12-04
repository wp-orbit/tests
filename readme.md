# Testing WP-Orbit

This subpackage integrates PHPUnit with AJAX request support for WP Orbit components.

Issue: Suppose we have test PHP classes that we only want to load in the application for PHPUnit tests.
This is easy enough to hook up with the PHPUnit bootstrapper configuration, but if we make AJAX requests
which rely on these test classes, they're not loaded in a regular request context.

To get around this, WPOrbit loads the PHPUnit test class loader when either $_GET['wp_orbit_tests'] or 
$_POST['wp_orbit_tests'] variables are present in the request (or request body).

## Component Test Setup

### Step 1 - Make /tests directory

For example, assume {component} is "ajax".

Components with unit tests should each have a /tests directory.
```
/{component}/tests
```

### Step 2 - Load test specific classes

If the component has test-specific classes, create a ```bootstrap.php``` file inside
the /tests directory which includes the necessary test classes.
```
/{component}/tests/bootstrap.php
```

Include the bootstrap file in ```test-dependencies.php```.

```php
// WP Orbit - {Component}
require_once __DIR__ . '/../{component}/tests/bootstrap.php';
```

### Step 3 - Add component tests to phpunit.xml
Finally, register the component's tests directory in ```phpunit.xml```
```xml
<testsuites>
    ...
    <testsuite name="WP Orbit -- {component} Tests">
        <directory suffix="Test.php">../{component}/tests</directory>
    </testsuite>
</testsuites>
```
