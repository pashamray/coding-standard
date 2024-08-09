<?php

declare(strict_types=1);

namespace Pashamray\Sniffs\Functions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class DisallowManyArgumentsSniff implements Sniff
{
    public int $maxCountArguments = 3;

    /**
     * @return array
     */
    public function register(): array
    {
        return [T_FUNCTION];
    }

    /**
     * @param File $phpcsFile
     * @param $stackPtr
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $function = $tokens[$stackPtr];

        $start = $function['parenthesis_opener'];
        $end = $function['parenthesis_closer'];
        $count = 0;

        while (true) {
            $start = $phpcsFile->findNext(T_VARIABLE, $start + 1, $end);
            if (!$start) {
                break;
            }
            $count++;
        }

        if ($count <= $this->maxCountArguments) {
            return;
        }

        $phpcsFile->addError(
            sprintf('The function must have no more than %d arguments', $this->maxCountArguments),
            $stackPtr,
            'Many arguments'
        );
    }
}
