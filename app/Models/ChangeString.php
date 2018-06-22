<?php 
/**
 * 
 */
class ChangeString  
{
    const ABC='abcdefghijklmnñopqrstuvwxyza';
    private function mayus()
    {
        return strtoupper(self::ABC);
    }
    private function search($toSearch, $string){
        $pos = strpos($toSearch, $string);
        if ($pos!==false) {
            return substr($toSearch, $pos+1,1);
        }
        return false;
    }
    /**
     * 
     */
    public function build($string){
        $result='';
        for($i=0;$i<strlen($string);$i++){
            if ($this->search(self::ABC, $string[$i])) {
                $result .= $this->search(self::ABC, $string[$i]);
                continue;
            }
            if ($this->search($this->mayus(), $string[$i])) {
                $result .= $this->search($this->mayus(), $string[$i]);
                continue;
            }
            $result .= $string[$i];
        }
        return $result;
    }
}