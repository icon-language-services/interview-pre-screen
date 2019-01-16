# Set-up #

- Clone this repository. *Please do not fork on GitHub*.
- Run `composer install`.
- You can run tests by running `vendor/bin/phpunit`. Note that the test suite will fail by default.

# Task 1: write a test #

The class found at `src/TranslationTask.php` has been written, but has no tests. The class provides helper methods for 
accessing data which has come from the HTTP API of a third-party Translation Management System tool. The data is an
array of key/value pairs.

The class needs to be able to provide the `version number` and `target language` for the task. As described in the 
documentation, the target language can be found in the `TargetLocale` property of the data array.

When there is no version number for the task, the value of this property is simply the language code for the target 
language, e.g. `fr-FR`.

However, when there is a version number, the format of this string is more complex: 
`<language_code>(<version_number>,<language_code>)`
e.g.: `fr-FR(v2,fr-FR)`.

Therefore, the `targetLanguage()` method needs to be able to extract the language code from this property in both 
scenarios and always return a string. The `version()` method needs to be able to determine if the task has a version 
number, returning `null` if not and a string if so.

## Exercise ##

Write a test which covers the existing functionality. A blank test has been provided for you to work in.
   
 

# Task 2: write an implementation #

`test/TaskFilterTest.php` contains unit tests for a class called TaskFilter. This class has two methods, `confirmed` and
`unconfirmed`. The tests describe the behaviour of each of these methods - add implementations of both methods to
`src/TaskFilter.php` and make the tests pass.


# Submission #

After you have completed the tasks, please return the complete repository as a zip file by email.
