<?php
 use Rubix\ML\Extractors\CSV;
// use Rubix\ML\Classifiers\KNearestNeighbors;
// use Rubix\ML\Transformers\NumericStringConverter;
//use Rubix\ML\Datasets\Labeled;


foreach (new CSV('TOURADO.csv') as $row) 
{
    print_r($row);
}

// $dataset = Labeled::fromIterator(new CSV('TOURADO.csv', true))
//     ->apply(new NumericStringConverter());

// [$training, $testing] = $dataset->stratifiedSplit(0.8);

// $estimator = new KNearestNeighbors(3);

// $estimator->train($training);

// $predictions = $estimator->predict($testing);
// echo $predictions;
?>


