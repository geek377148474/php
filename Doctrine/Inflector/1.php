<?php


use Doctrine\Common\Inflector\Inflector;

// Tableize
dump(Inflector::tableize('ModelName')); // model_name

// Classify
dump(Inflector::classify('model_name')); // ModelName

// Camelize
dump(Inflector::camelize('model_name')); // modelName

// ucwords
$string = 'top-o-the-morning to all_of_you!';
dump(Inflector::ucwords($string)); // Top-O-The-Morning To All_of_you!
dump(Inflector::ucwords($string, '-_ ')); // Top-O-The-Morning To All_Of_You!

// pluralize
dump(Inflector::pluralize('browser')); // browsers
// singularize
dump(Inflector::singularize('browsers')); // browser

// rules
dump(Inflector::pluralize('inflector')); // inflectors
Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
dump(Inflector::pluralize('inflector')); // inflectors
Inflector::rules('plural', [
    'rules' => ['/^(inflect)ors$/i' => '\1ables'],
    'uninflected' => ['dontinflectme'],
    'irregular' => ['red' => 'redlings']
]);
dump(Inflector::pluralize('inflector')); // inflectables

// reset
Inflector::reset();

// slugify
function slugify(string $text) : string
{
    return str_replace('_', '-', Inflector::tableize($text));
}
dump(slugify('ModelName'));
