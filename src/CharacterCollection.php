<?php
namespace Passwonsole;

class CharacterCollection
{
    private $characters = 'abcdefghijklmnopqrstuvwxyz';
    private $numbers = '1234567890';
    private $symbols ='\!@$%^&*()<>,.?/[]{}-=_+';

    /**
     * @param bool $num
     * @param bool $sym
     * @return array|
     */
    public function getCharacterCollection($num = false, $sym = false)
    {
        $collection = $this->randomUpperCaseLetter($this->makeArr($this->characters));
        if ($num) {
            $numForCollection = $this->makeArr($this->numbers);
            $collection = array_merge($collection, $numForCollection);
        }
        if ($sym) {
            $symForCollection = $this->makeArr($this->symbols);
            $collection = array_merge($collection, $symForCollection);
        }
        $collection = $this->shuffleCollection($collection);
        return $collection;
    }

    /**
     * @param $collection
     * @return mixed
     */
    private function shuffleCollection($collection)
    {
        shuffle($collection);
        return $collection;
    }

    /**
     * @param $arg
     * @return array
     */
    private function makeArr($arg)
    {
        return str_split($arg);
    }

    /**
     * @param array $letters
     * @return array
     */
    private function randomUpperCaseLetter(array $letters)
    {
        $countLetters = count($letters) - 1;
        for ($i=0; $i < $countLetters; $i++)
        {
            try {
                $num = random_int(0, $countLetters);
            } catch (\Exception $e) {
            }
            $letters[$num] = mb_strtoupper($letters[$num]);
        }
        return $letters;
    }

    /**
     * @param array $charactersCollection
     * @param $numOfCharacters
     * @return string
     */
    public function generatePassword(array $charactersCollection, $numOfCharacters)
    {
        $password = '';
        $countCollection = count($charactersCollection) - 1;
        for ($i = 0; $i < $numOfCharacters; $i++)
        {
            try {
                $password .= $charactersCollection[random_int(0, $countCollection)];
            } catch (\Exception $e) {
            }
        }
        return $password;
    }
}