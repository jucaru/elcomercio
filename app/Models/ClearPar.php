<?php 
/**
* 
*/
class ClearPar
{
    const PARENTESIS=['(',')'];
    const PAR='()';
    /**
     * 
     * El algoritmo debe eliminar todos los paréntesis que no tienen pareja.
     * Finalmente devolver la nueva cadena.
     */
    public function build($string){
        $newString='';
        for($i=0;$i<strlen($string);$i++){
            if (!$this->evalParenthesis($string[$i])) {
                return "string no valido";
            }
            if ($i==0) {
                continue;
            }
            $toEval = $this->getStringToEval($string[$i],$string[$i-1]);

            if ($toEval ==self::PAR) {
                $newString.=$toEval;
            }
        }
        return $newString;
    }
    private function evalParenthesis($word){
        if (in_array($word, self::PARENTESIS )) {
            return true;
        }
    }
    private function getStringToEval($string,$previousString){
        return $previousString.$string;
    }
}