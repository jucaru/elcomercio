<?php 
/**
* 
*/
class CompleteRange
{
    /**
     * 
     */
    public function build($numbers=[]){

        sort($numbers);
        for($i=1;$i<count($numbers);$i++){
            $previousNumberPlusOne= $numbers[$i-1]+1;

            if ($previousNumberPlusOne!=$numbers[$i]) {
                array_push($numbers,$previousNumberPlusOne);
                sort($numbers);
            }
        }
        return $numbers;
    }
}