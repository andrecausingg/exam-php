<?php
    // 1. 54 number in total, write algorithm 54 number to random sequence 
    function randShuffle() {
        $array = range(0, 53); 
        shuffle($array); 
        $array = array_slice($array, 0, 54); 

        echo implode(', ', $array);
    }
    randShuffle();

    echo "<br>";
    echo "<br>";
    
    // 2. Sum the value of array, Average the value of array
    function sumArray() {
        $array = array(1,2); 
        $sum = array_sum($array);
        $count = count($array);
        $average = $sum / $count;
        echo $average;
    }
    sumArray();
    
    echo "<br>";
    echo "<br>";

    // 3. Reverse array
    function reverseArray(){
        $array = array(1,2,3,4);

        for($i = count($array) - 1; $i >= 0; $i--){
            echo $array[$i];
        }
    }
    reverseArray();

    echo "<br>";
    echo "<br>";

    // 4. {A, 30(weight)}, {B, 40(weight)},{C,20(weight)},{D,10(weight)}, random a number(20), output A, random a number(80), output C 
    function items(){
        $items = array(
            array('name' => 'A', 'weight' => 30),
            array('name' => 'B', 'weight' => 40),
            array('name' => 'C', 'weight' => 20),
            array('name' => 'D', 'weight' => 10)
        );
        
        // Define a function to select a random item based on its weight
        function selectItem($items, $totalWeight) {
            $rand = rand(1, $totalWeight);
            $sum = 0;
            foreach ($items as $item) {
                $sum += $item['weight'];
                if ($rand <= $sum) {
                    return $item['name'];
                }
            }
        }
        
        // Test the function by selecting a random item twice
        $item1 = selectItem($items, 20);
        echo "Random number is 20, output item: $item1\n";
        
        $item2 = selectItem($items, 80);
        echo "Random number is 80, output item: $item2\n";
    }
    items();

    echo "<br>";
    echo "<br>";

    // 5. Binary search using recursion
    $arr = array(2, 4, 6, 8, 10);
    $left = 0;
    $right = count($arr) - 1;
    $x = 6;
    $result = binarySearchRecursive($x, $arr, $left, $right);
    
    if ($result == -1) {
        echo "Element is not present in array";
    } else {
        echo "Element is present at index " . $result;
    }
    function binarySearchRecursive($x, $arr, $left, $right) {
        if ($left > $right) {
            return -1;
        }
        
        $mid = (int) (($left + $right) / 2);
        
        if ($arr[$mid] == $x) {
            return $mid;
        } elseif ($x < $arr[$mid]) {
            return binarySearchRecursive($x, $arr, $left, $mid - 1);
        } else {
            return binarySearchRecursive($x, $arr, $mid + 1, $right);
        }
    }

    echo "<br>";
    echo "<br>";
    
    // 6.Given two binary strings a and b , return their sum as a binary string.
    $a = "1010";
    $b = "1011";
    echo binaryAddition($a, $b);
    function binaryAddition($a, $b) {
        $a_dec = bindec($a);
        $b_dec = bindec($b);
    
        $result_dec = $a_dec + $b_dec;
    
        $result_bin = decbin($result_dec);
    
        return $result_bin;
    }

    echo "<br>";
    echo "<br>";

    // 7. Use function recursion to find the factorial of 100
    $n = 100;
    echo factorial($n);
    function factorial($n) {
        if ($n == 0) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    echo "<br>";
    echo "<br>";

    // 8. Merge two sorted arrays    nums1   nums2
    $nums1 = array(1, 3, 5, 7, 9);
    $nums2 = array(2, 4, 6, 8, 10);
    echo implode(", ", mergeSortedArrays($nums1, $nums2));
    function mergeSortedArrays($nums1, $nums2) {
        $result = array();
        $i = 0;
        $j = 0;
        
        while ($i < count($nums1) && $j < count($nums2)) {
            if ($nums1[$i] < $nums2[$j]) {
                $result[] = $nums1[$i];
                $i++;
            } else {
                $result[] = $nums2[$j];
                $j++;
            }
        }
        
        while ($i < count($nums1)) {
            $result[] = $nums1[$i];
            $i++;
        }
        
        while ($j < count($nums2)) {
            $result[] = $nums2[$j];
            $j++;
        }
        
        return $result;
    }
?>
