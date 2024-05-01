<?php
/**
 * To handle different sorting algorithms dynamically, create a SortStrategy interface and implement it with different sorting classes.
 * The main context class can then use any sorting strategy dynamically.
 */

// SortStrategy Interface
interface SortStrategy
{
    public function sort(array $data): array;
}

// QuickSort Strategy
class QuickSort implements SortStrategy
{
    public function sort(array $data): array
    {
        sort($data);

        return $data;
    }
}

// BubbleSort Strategy
class BubbleSort implements SortStrategy
{
    public function sort(array $data): array
    {
        for ($i = 0; $i < count($data) - 1; $i++) {
            for ($j = 0; $j < count($data) - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    [$data[$j], $data[$j + 1]] = [$data[$j + 1], $data[$j]];
                }
            }
        }

        return $data;
    }
}

// Sorting Context
class SortingContext
{
    private SortStrategy $sortStrategy;

    public function __construct(SortStrategy $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }

    public function setSortStrategy(SortStrategy $sortStrategy): void
    {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $data): array
    {
        return $this->sortStrategy->sort($data);
    }
}

// Usage Example
$sortingContext = new SortingContext(new QuickSort());
print_r($sortingContext->sort([4, 2, 8, 5, 7]));

$sortingContext->setSortStrategy(new BubbleSort());
print_r($sortingContext->sort([4, 2, 8, 5, 7]));
